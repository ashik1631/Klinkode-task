<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

use function PHPUnit\Framework\fileExists;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = product::with('cate')->paginate(20);
        return view('backend.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::whereStatus('1')->get();
        return view('backend.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cate_id' => 'required',
            'name' => 'required',
            'slug' => 'nullable',
            'price' => 'required|integer',
            'discount' => 'nullable|integer',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'thumbnail' => 'required|mimes:png,jpg,jpeg',
            'multiple_image.*' => 'required|mimes:png,jpg,jpeg|max:2000',
        ]);
        try {
            $data = $request->all();

            //image upload...
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $photoName = time() . strtolower(Str::random(10)) . '.' . $extension;
            $file->move(public_path('uploads/product/'), $photoName);
            $data['thumbnail'] = 'uploads/product/' . $photoName;
            //image upload end

            //Multi-image upload...
            $images = [];
            foreach ($request['multiple_image'] as $image) {
                $mul_img_ext = $image->getClientOriginalExtension();
                $mul_img_name = time() . strtolower(Str::random(10)) . '.' . $mul_img_ext;
                $image->move(public_path('uploads/product/'), $mul_img_name);
                $images[] = 'uploads/product/' . $mul_img_name;
            }
            //Multi image upload end
            $data['multiple_image'] = json_encode($images);
            $data['slug'] = Str::slug($data['name']);
            Product::create($data);
            //Message....

            Session::flash('type', 'success');
            Session::flash('message', 'success');

            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        $category = Category::whereStatus('1')->get();
        return view('backend.product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        $request->validate([
            'cate_id' => 'nullable',
            'name' => 'required',
            'slug' => 'nullable',
            'price' => 'required|integer',
            'discount' => 'nullable|integer',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'thumbnail' => 'nullable|mimes:png,jpg,jpeg',
            'multiple_image.*' => 'nullable|mimes:png,jpg,jpeg|max:2000',
        ]);

        $product->name = $request->name;
        $product->status = $request->status;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;
        $file = $request->file('thumbnail');

        if (!empty($file)) {
            unlink(public_path($product->thumbnail));
            $extension = $file->getClientOriginalExtension();
            $photoName = time() . '.' . $extension;
            $file->move(public_path('uploads/product/'), $photoName);
            $product->thumbnail = 'uploads/product/' . $photoName;
        }
        if (!empty($file)) {
            $images = [];
            foreach ($request['multiple_image'] as $image) {
                $mul_img_ext = $image->getClientOriginalExtension();
                $mul_img_name = time() . strtolower(Str::random(10)) . '.' . $mul_img_ext;
                $multiple_image = json_decode($product->multiple_image);
                foreach ($multiple_image as $img) {
                    unlink(public_path($img));
                }
                $image->move(public_path('uploads/product/'), $mul_img_name);
                $images[] = 'uploads/product/' . $mul_img_name;
            }
            $product->multiple_image = json_encode($images);
        }
        $product->slug = Str::slug($product['name']);
        $product->update();
        Session::flash('type', 'success');
        Session::flash('message', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {

        if (file_exists(public_path($product->thumbnail))) {
            unlink(public_path($product->thumbnail));
        }
        $multiple_image = json_decode($product->multiple_image);
        foreach ($multiple_image as $img) {
            if (file_exists(public_path($img))) {
                unlink(public_path($img));
            }
        }
        $product->delete();
        Session::flash('message', 'data delete success');
        return redirect()->back();
    }
}
