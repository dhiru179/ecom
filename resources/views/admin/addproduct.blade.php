@extends('admin.templates')
@section('title','AddProduct')
@section('dashboard_section')
@if($id>0)
@php
$img_required="";
@endphp
@else
@php
$img_required="required";
@endphp
@endif

@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    <span class="badge badge-pill badge-success">{{session('message')}}</span>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif
<div class="overview-wrap mt-3">
    <h2 class="title-1 ml-2">Add Product</h2>
    <a href="{{url('admin/product')}}"><button class="au-btn au-btn-icon au-btn--blue mr-3">
            <i class="fa fa-chevron-left"></i>Back</button></a>
</div>

<div class="row m-t-20">
    <div class="col-md-12 ">
        <form action="{{route('admin.product.manageproduct')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div id="add_attributes">
                <div class="card">
                    <div class="card-body">
                        <div class="col">
                            <div class="row ">
                                <div class="form-group col-3">
                                    <label for="select" class="control-label mb-1">Categories</label>
                                    <select name="categories_id" id="select" class="form-control">
                                    <option value="1">Please select</option>
                                        @foreach($categories as $data)
                                        @if($categories_id==$data->id)
                                        <option selected value="{{$data->id}}">{{$data->category_name}}</option>
                                        @else
                                        <option value="{{$data->id}}">{{$data->category_name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-3 ">
                                    <label for="pd-name" class="control-label mb-1">Product Name</label>
                                    <input id="pd-name" name="name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" value="{{$name}}">
                                    @error('name')
                                <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-3">
                                    <label for="pd-slug" class="control-label mb-1">Slug</label>
                                    <input id="pd-slug" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$slug}}">
                                    @error('slug')
                                <span class="text-danger">{{$message}}</span>
                                    @enderror 
                                </div>
                                <div class="form-group col-3">
                                    <label for="pd-brand" class="control-label mb-1">Brand</label>
                                    <input id="pd-brand" name="brand" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" value="{{$brand}}">
                                    @error('brand')
                                <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-3">
                                    <label for="pd-model" class="control-label mb-1">Model</label>
                                    <input id="pd-model" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$model}}">
                                    @error('model')
                                <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-3 has-success">
                                    <label for="pd-warranty" class="control-label mb-1">Warranty</label>
                                    <input id="pd-warranty" name="warranty" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"  value="{{$warranty}}">
                                    @error('warranty')
                                <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-4 has-success">
                                    <label for="pd-image" class="control-label mb-1">Image</label>
                                    <input id="pd-image" name="image" type="file" class="form-control cc-name valid" value="{{$image}}" {{$img_required}}>
                                    @error('image')
                                <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-12">
                                    <label for="pd-desc" class="control-label mb-1">Description</label>
                                    <textarea id="pd-desc" name="short_desc" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"   value="{{$short_desc}}">{{$short_desc}}</textarea>
                                    @error('short_desc')
                                <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label for="pd-keyword" class="control-label mb-1">Keywords</label>
                                    <textarea id="pd-keyword" name="keywords" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"  value="{{$keywords}}">{{$keywords}}</textarea>
                                    @error('keywords')
                                <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>    
                                 <div class="form-group col-12 ">
                                    <label for="pd-specification" class="control-label mb-1">Tech Specification</label>
                                    <textarea id="pd-specification" name="tech_specification" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"  value="{{$tech_specification}}">{{$tech_specification}}</textarea>
                                    @error('tech_specification')
                                <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label for="pd-uses" class="control-label mb-1">Uses</label>
                                    <textarea id="pd-uses" name="uses" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"  value="{{$uses}}">{{$uses}}</textarea>
                                    @error('uses')
                                <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                         
                        </div>
                    </div>
                </div>
                <h3>Products Attributes</h3>
                <div id="product_atrributes">
                    <div class="card">
                        <div class="card-body">
                            <div class="row ">
                                <div class="form-group col-2">
                                    <label for="cc-payment" class="control-label mb-1">SKU</label>
                                    <input id="cc-pament" name="sku" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$sku}}">
                                </div>
                                <div class="form-group col-2 ">
                                    <label for="cc-name" class="control-label mb-1">MRP</label>
                                    <input id="cc-name" name="mrp" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" value="{{$mrp}}">
                                </div>
                                <div class="form-group col-2">
                                    <label for="cc-payment" class="control-label mb-1">Price</label>
                                    <input id="cc-pament" name="price" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$price}}">
                                </div>
                                <div class="form-group col-2 ">
                                    <label for="cc-name" class="control-label mb-1">Qty</label>
                                    <input id="cc-name" name="qty" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" value="{{$qty}}">
                                </div>
                                <div class="form-group col-2">
                                    <label for="cc-name" class="control-label mb-1">Size</label>
                                    <input id="cc-name" name="size" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" value="{{$size}}">
                                </div>
                                <div class="form-group col-2">
                                    <label for="cc-payment" class="control-label mb-1">Color</label>
                                    <input id="cc-pament" name="color" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$color}}">
                                </div>

                                <div class="form-group col-4">
                                    <label for="cc-image" class="control-label mb-1">Image</label>
                                    <input id="ccimage" name="attr-image" type="file" class="form-control" aria-required="true" aria-invalid="false" value="{{$image}}">
                                </div>
                                <div class="col-2">
                                    <label for="btn" class="control-label mb-1">&nbsp; &nbsp;&nbsp; </label>
                                    <button id="btn" onclick="add_box()" name="" type="button" class="au-btn au-btn-icon au-btn--green"><i class="fa fa-plus">&nbsp; &nbsp;</i>Add</button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="id" value="{{$id}}">
            <button id="" type="submit" class="btn btn-lg btn-info btn-block">Submit</button>
        </form>

    </div>
</div>

<script>
    // $(document).ready(function() {
    //     // $('#add_more').click(function() {
    //     //     console.log($('#product_atrributes').html())
    //     //     $('#insert_attributes').append($('#product_atrributes').html());

    //     // })

    // })
    var a = 1;
    function add_box() {
        console.log('ok'); 
        a++;
        var html = '<div id="remove_attributes'+a+'"><div class="card"> <div class="card-body"><div class="row ">';
        html += '<div class="form-group col-2"><label for="cc-payment" class="control-label mb-1">SKU</label> <input id="cc-pament" name="sku" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$sku}}"></div>';
        html += '<div class="form-group col-2 "> <label for="cc-name" class="control-label mb-1">MRP</label><input id="cc-name" name="mrp" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" value="{{$mrp}}"></div>';
        html += '<div class="form-group col-2"><label for="cc-payment" class="control-label mb-1">Price</label><input id="cc-pament" name="price" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$price}}"> </div>';
        html += '<div class="form-group col-2 "><label for="cc-name" class="control-label mb-1">Qty</label><input id="cc-name" name="qty" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" value="{{$qty}}"></div>';
        html += '<div class="form-group col-2"> <label for="cc-name" class="control-label mb-1">Size</label><input id="cc-name" name="size" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" value="{{$size}}"></div>';
        html += '<div class="form-group col-2"> <label for="cc-payment" class="control-label mb-1">Color</label> <input id="cc-pament" name="color" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$color}}"></div>';
        html += '<div class="form-group col-4"> <label for="cc-image" class="control-label mb-1">image</label> <input id="ccimage" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" value="{{$image}}">  </div>';
        html += '<div class="col-3 m-t-30"><label for="btn" class="control-label mb-1 x1">&nbsp; &nbsp;&nbsp; </label> <button id="btn" onclick="remove_box('+a+')" name="" type="button" class="au-btn au-btn-icon au-btn--red"><i class="fa fa-minus">&nbsp;</i>Remove</button></div>';
        html += '</div></div></div></div>';
       
        $('#add_attributes').append(html);
       
    }
    function remove_box(a)
    {
        console.log('<b>'+a+'</b>');
        $('#remove_attributes'+a).remove();
    }

   CKEDITOR.replace('pd-keyword');
   CKEDITOR.replace('pd-desc');
   CKEDITOR.replace('pd-specification');
   CKEDITOR.replace('pd-uses');
    
</script>
@endsection