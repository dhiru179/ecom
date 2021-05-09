@extends('admin.templates')
@section('title','product')
@section('dash_pro','active')
@section('dashboard_section')
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    <span class="badge badge-pill badge-success">{{session('message')}}</span>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif

<div class="overview-wrap mt-3">
    <h2 class="title-1 ml-3">Products</h2>
    <a href="{{url('admin/product/addproduct')}}"><button class="au-btn au-btn-icon au-btn--blue mr-3">
            <i class="zmdi zmdi-plus"></i>add Product</button></a>
</div>

<div class="row m-t-10">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Categories ID</th>
                        <th>Slug</th>
                        <th>Image</th>
                        <th>status</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->categories_id}}</td>
                        <td>{{$list->slug}}</td>
                        <td>
                            @if($list->image!='')
                                <img width="100px" src="{{asset('storage/media/'.$list->image)}}" alt="..."/>
                            @endif
                            </td>
                        <td>
                            <a href="{{url('admin/product/addproduct')}}/{{$list->id}}"><button class="btn btn-primary btn-sm">&nbsp Edit &nbsp</button></a>
                            @if($list->status==1)
                            <a href="{{url('admin/product/status/0')}}/{{$list->id}}"><button class="btn btn-success btn-sm">&nbsp&nbspActive&nbsp &nbsp</button></a>
                            @elseif($list->status==0)
                            <a href="{{url('admin/product/status/1')}}/{{$list->id}}"><button class="btn btn-warning btn-sm">Deactive</button></a>
                            @endif
                            <a href="{{url('admin/product/deleteproduct')}}/{{$list->id}}"><button class="btn btn-danger btn-sm">Delete</button></a>
                        </td>
                        
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection