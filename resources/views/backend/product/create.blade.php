@extends('layouts.backend')

@section('content')
<div class="container-fluname">
    <!-- breadcame start -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}" class="breadcrumb-link"><span class="p-1 text-sm text-light bg-success rounded-circle"><i class="fas fa-home"></i></span> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create product</li>
                            <a href="{{ route('admin.product.index') }}" class="btn btn-primary ml-auto">Back</a>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="basic_form my-4">
                <div class="content_section">
                    <h5>Create product Form</h5>
                    <hr>

                    @include('layouts.message')

                    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="Category">Select Category</label>
                           <select name="cate_id" class="form-control">
                            <option hidden>Select Category</option>
                            @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="name">product name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter your product name">
                        </div>
                        <div class="form-group">
                            <label for="price">product price</label>
                            <input type="number" name="price" value="{{ old('price') }}" class="form-control" placeholder="Enter your product price">
                        </div>
                        <div class="form-group">
                            <label for="discount">product Discount [optional]</label>
                            <input type="number" name="discount" value="{{ old('discount') }}" class="form-control" placeholder="Enter your product discount">
                        </div>
                        <div class="form-group">
                            <label for="short_desc">product Short Description}</label>
                           <textarea name="short_desc" cols="30" rows="4" class="from-control">{{ old('short_desc') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="long_desc">product Long Description}</label>
                           <textarea name="long_desc" cols="30" rows="7" class="from-control">{{ old('long_desc') }}</textarea>
                        </div>
                            <div class="form-group">
                                <label for="status">status</label>
                               <select name="status" class="form-control">
                                <option {{ old('status')==1 ? 'selected': ''}} value="1">publish</option>
                                <option {{ old('status')==0 ? 'selected': ''}} value="0">unpublish</option>
                               </select>
                            </div>
                            <div class="form-group">
                                <label for="thumbnail">thumbnail</label>
                                <input type="file" name="thumbnail" class="form-control" placeholder="select your thumbnail">
                            </div>
                            <div class="form-group">
                                <label for="multiple-image">multiple-image</label>
                                <input type="file" name="multiple_image[]" multiple class="form-control" placeholder="select your multiple-image">
                            </div>
                            <div class="form-group">
                                <label for="new product">new product</label>
                                <select name="new_product" class="from-control">
                                    <option value="1">Publish</option>
                                    <option value="0">Unpublish</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="feature_product">feature_product</label>
                                <select name="feature_product" class="from-control">
                                    <option value="1">Publish</option>
                                    <option value="0">Unpublish</option>
                                </select>
                            </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
