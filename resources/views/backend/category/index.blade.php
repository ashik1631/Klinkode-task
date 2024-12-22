@extends('layouts.backend')

@section('content')
    <div class="container-fluid">
        <!-- breadcame start -->
        @include('layouts.message')
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}"
                                        class="breadcrumb-link"><span
                                            class="p-1 text-sm text-light bg-success rounded-circle"><i
                                                class="fas fa-home"></i></span> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Category</li>
                                <a href="{{ route('admin.category.create') }}" class="btn btn-primary ml-auto">Create
                                    category</a>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- data table start -->
    <div class="data_table my-4">
        <div class="content_section">
            <table id="example" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl.Num</th>
                        <th>icon</th>
                        <th>category name</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset($item->icon) }}" width="40" alt="icon">
                            </td>
                            <td>{{ $item->name}}</td>
                            <td>
                                @if ($item->status==1)
                                    <span class="badge badge-success">Publish</span>
                                @else
                                    <span class="badge badge-danger">Unpublish</span>
                                @endif
                            </td>

                            <td class="d-flex">
                                <a href="{{ route('admin.category.edit', $item->id) }}" class=" btn btn-primary">Edit</a>
                                <form action="{{ route('admin.category.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- end -->
@endsection
