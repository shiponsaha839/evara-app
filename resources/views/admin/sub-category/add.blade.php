@extends('admin.master')

@section('title', 'Add Sub Category')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Sub Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Sub Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Sub Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Sub Category Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('sub-category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="category_id" required>
                                    <option value="" disabled selected> -- Select Category -- </option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}"> {{$category->name}} </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('category_id') ? $errors->first('category_id') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Sub Category Name</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('name')}}" id="firstName" name="name" placeholder="Sub Category Name" type="text"/>
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Sub Category Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="lastName" name="description" placeholder="Sub Category Description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Sub Category Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="imgInp" name="image" type="file"/>
                                <img src="" id="categoryImage" alt=""/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-3">
                                <label> <input type="radio" value="1" checked name="status"><span> Published</span> </label>
                                <label> <input type="radio" value="0" name="status"><span> Unpublished</span> </label>
                            </div>
                        </div>
                        <button class="btn btn-primary rounded-0 float-end" type="submit">Create New Sub Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
