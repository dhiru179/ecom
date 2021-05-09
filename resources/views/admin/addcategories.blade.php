@extends('admin.templates')
@section('title','AddCategories')
@section('dashboard_section')

@php
  if($id>0)
  {
    $img_required="";
  }  
  else {
    $img_required="required";
  }
@endphp

@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    <span class="badge badge-pill badge-success">{{session('message')}}</span>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif
<div class="overview-wrap mt-3">
    <h2 class="title-1 ml-2">Add Categories</h2>
    <a href="{{url('admin/categories')}}"><button class="au-btn au-btn-icon au-btn--blue mr-3">
            <i class="fa fa-chevron-left"></i>Back</button></a>
</div>

<div class="row m-t-20 ml-4">
    <div class="col-md-8 ">
        <div class="card">
            <div class="card-body">
               
                <form action="{{route('admin.categories.manageCategories')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Category Name</label>
                        <input id="cc-pament" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$category_name}}">
                        @error('category_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">Category Slug</label>
                        <input id="cc-name" name="category_slug" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" value="{{$category_slug}}">
                        @error('category_slug')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">Image</label>
                        <input id="cc-name" name="image" type="file" class="form-control cc-name valid" value="{{$image}}" {{$img_required}}>
                        @error('image')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <input type="hidden" name="id" value="{{$id}}">
                    <button id="" type="submit" class="btn btn-lg btn-info btn-block">submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection