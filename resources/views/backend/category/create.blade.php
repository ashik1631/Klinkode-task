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
                            <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}" class="breadcrumb-link"><span class="p-1 text-sm text-light bg-success rounded-circle"><i class="fas fa-home"></i></span> home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Category</li>
                            <a href="{{ route('admin.category.index') }}" class="btn btn-primary ml-auto">Back</a>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="basic_form my-4">
                <div class="content_section">
                    <h5>Create category Form</h5>
                    <hr>

                    @include('layouts.message')

                    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Category name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter your Category name">
                        </div>
                            <div class="form-group">
                                <label for="status">status</label>
                               <select name="status" class="form-control">
                                <option {{ old('status')==1 ? 'selected': ''}} value="1">publish</option>
                                <option {{ old('status')==0 ? 'selected': ''}} value="0">unpublish</option>
                               </select>
                            </div>
                            <div class="form-group">
                                <label for="icon">Icon</label>
                                <input type="file" name="icon" class="form-control" placeholder="select your icon">
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
