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
                                    <input id="pd-warranty" name="warranty" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" value="{{$warranty}}">
                                    @error('warranty')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                                          
                                <div class="form-group col-12 has-success">
                                    <label for="pd-image" class="control-label mb-1">Image</label>
                                    <input type="file" id="pd-image" name="image" class="form-control cc-name valid" aria-required="true" aria-invalid="false" {{$img_required}}/>
                                    <input type="hidden" id="pd-image" name="currentimage" value="{{$image}}"/>
                                    @if($image!="")
                                    <img src="{{url("storage/media")}}/{{$image}}" alt="..." style="height: 200px;width:150px">
                                    @endif
                                    @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-12">
                                    <label for="pd-desc" class="control-label mb-1">Description</label>
                                    <textarea id="pd-desc" name="short_desc" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" value="{{$short_desc}}">{{$short_desc}}</textarea>
                                    @error('short_desc')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label for="pd-keyword" class="control-label mb-1">Keywords</label>
                                    <textarea id="pd-keyword" name="keywords" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" value="{{$keywords}}">{{$keywords}}</textarea>
                                    @error('keywords')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-12 ">
                                    <label for="pd-specification" class="control-label mb-1">Tech Specification</label>
                                    <textarea id="pd-specification" name="tech_specification" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" value="{{$tech_specification}}">{{$tech_specification}}</textarea>
                                    @error('tech_specification')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label for="pd-uses" class="control-label mb-1">Uses</label>
                                    <textarea id="pd-uses" name="uses" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" value="{{$uses}}">{{$uses}}</textarea>
                                    @error('uses')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <h3>Product Images</h3>
                @foreach ($product_images as $key=>$list)
                @php
                  $pd_image= (array)$list;
                @endphp
                
                    <div class="card">
                        <div class="card-body" id="product_image">
                            <div class="row"id="add_product_image{{$key}}">
                                <input id="" name="pdid[]" type="hidden" class="form-control" aria-required="true" aria-invalid="false" value="{{$pd_image['id']}}">
                                <div class="form-group col-4">
                                    <label for="cc-image" class="control-label mb-1">Image</label>
                                    <input id="ccimage" name="pdimag[]" type="file" class="form-control" aria-required="true" aria-invalid="false" value="">
                                    @if($pd_image['images']!='')
                                    <a href="{{asset('storage/media/'.$pd_image['images'])}}" target="_blank"><img width="100px" src="{{asset('storage/media/'.$pd_image['images'])}}" alt="image not found"/></a>
                                 @endif
                                </div>
                                @if ($key==0)
                                <div class="col-2">
                                    <label for="btn" class="control-label mb-1">&nbsp; &nbsp;&nbsp; </label>
                                    <button id="btn" onclick="add_box_image({{$pd_image['images']}})" name="" type="button" class="au-btn au-btn-icon au-btn--green"><i class="fa fa-plus">&nbsp; &nbsp;</i>Add</button>
                                </div>
                              
                                @else
                                <div class="col-3 m-t-30">
                                    <label for="btn" class="control-label mb-1 x1">&nbsp; &nbsp;&nbsp; </label> 
                                   <a href="{{url('admin/product/deleteproductattr')}}/{{$id}}/{{$pd_attr['id']}}"><button id="btn" onclick="remove_box({{$key}})" name="" type="button" class="au-btn au-btn-icon au-btn--red"><i class="fa fa-minus">&nbsp;</i>Remove</button></a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                
                @endforeach

                <h3>Products Attributes</h3>

                @foreach ($product_attributes as $key=>$list)
                @php
                  $pd_attr= (array)$list;
                @endphp
                <div id="product_atrributes{{$key}}">
                    <div class="card">
                        <div class="card-body">
                            <div class="row ">
                                <input id="" name="pdattrid[]" type="hidden" class="form-control" aria-required="true" aria-invalid="false" value="{{$pd_attr['id']}}">
                                <div class="form-group col-2">
                                    <label for="cc-payment" class="control-label mb-1">SKU</label>
                                    <input id="cc-pament" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$pd_attr['sku']}}">
                                </div>
                                <div class="form-group col-2 ">
                                    <label for="cc-name" class="control-label mb-1">MRP</label>
                                    <input id="cc-name" name="mrp[]" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" value="{{$pd_attr['mrp']}}">
                                </div>
                                <div class="form-group col-2">
                                    <label for="cc-payment" class="control-label mb-1">Price</label>
                                    <input id="cc-pament" name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$pd_attr['price']}}">
                                </div>
                                <div class="form-group col-2 ">
                                    <label for="cc-name" class="control-label mb-1">Qty</label>
                                    <input id="cc-name" name="qty[]" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" value="{{$pd_attr['qty']}}">
                                </div>
                                <div class="form-group col-2">
                                    <label for="cc-name" class="control-label mb-1">Size</label>
                                    <input id="cc-name" name="size[]" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" value="{{$pd_attr['size']}}">
                                </div>
                                <div class="form-group col-2">
                                    <label for="cc-payment" class="control-label mb-1">Color</label>
                                    <input id="cc-pament" name="color[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$pd_attr['color']}}">
                                </div>

                                <div class="form-group col-4">
                                    <label for="cc-image" class="control-label mb-1">Image</label>
                                    <input id="ccimage" name="image_attr[]" type="file" class="form-control" aria-required="true" aria-invalid="false" value="{{$pd_attr['image']}}">
                                    @if($pd_attr['image']!="")
                                    <img src="{{url("storage/media/")}}{{$pd_attr['image']}}" alt="product image not found">
                                    @endif
                                </div>
                                @if ($key==0)
                                <div class="col-2">
                                    <label for="btn" class="control-label mb-1">&nbsp; &nbsp;&nbsp; </label>
                                    <button id="btn" onclick="add_box()" name="" type="button" class="au-btn au-btn-icon au-btn--green"><i class="fa fa-plus">&nbsp; &nbsp;</i>Add</button>
                                </div>
                              
                                @else
                                <div class="col-3 m-t-30">
                                    <label for="btn" class="control-label mb-1 x1">&nbsp; &nbsp;&nbsp; </label> 
                                   <a href="{{url('admin/product/deleteproductattr')}}/{{$id}}/{{$pd_attr['id']}}"><button id="btn" onclick="remove_box({{$key}})" name="" type="button" class="au-btn au-btn-icon au-btn--red"><i class="fa fa-minus">&nbsp;</i>Remove</button></a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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
    var a = 0;

    function add_box() {
        console.log('ok');
        a++;
        var html = '<div id="product_atrributes' + a + '"><div class="card"> <div class="card-body"><div class="row ">';
        html += '<div class="form-group col-2"><label for="cc-payment" class="control-label mb-1">SKU</label> <input id="cc-pament" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value=""></div>';
        html += '<div class="form-group col-2 "> <label for="cc-name" class="control-label mb-1">MRP</label><input id="cc-name" name="mrp[]" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" value=""></div>';
        html += '<div class="form-group col-2"><label for="cc-payment" class="control-label mb-1">Price</label><input id="cc-pament" name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value=""> </div>';
        html += '<div class="form-group col-2 "><label for="cc-name" class="control-label mb-1">Qty</label><input id="cc-name" name="qty[]" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" value=""></div>';
        html += '<div class="form-group col-2"> <label for="cc-name" class="control-label mb-1">Size</label><input id="cc-name" name="size[]" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" value=""></div>';
        html += '<div class="form-group col-2"> <label for="cc-payment" class="control-label mb-1">Color</label> <input id="cc-pament" name="color[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value=""></div>';
        html += '<div class="form-group col-4"> <label for="cc-image" class="control-label mb-1">image</label> <input id="ccimage" name="image_attr[]" type="file" class="form-control" aria-required="true" aria-invalid="false" value=""> <img src="{{url("storage/media/")}}{{$pd_attr['image']}}" alt="product image not found">  </div>';
        html += '<div class="col-3 m-t-30"><label for="btn" class="control-label mb-1 x1">&nbsp; &nbsp;&nbsp; </label> <button id="btn" onclick="remove_box(' + a + ')" name="" type="button" class="au-btn au-btn-icon au-btn--red"><i class="fa fa-minus">&nbsp;</i>Remove</button></div>';
        html += '</div></div></div></div>';
            console.log( $('#add_attributes').append(html));
        $('#add_attributes').append(html);

    }
 

    function remove_box(a) {
        console.log('<b>' + a + '</b>');
        $('#product_atrributes' + a).remove();
    }
    function add_box_image(image)
    {
        a++;
    //   console.log(1);
            var html = '<div class="row" id="add_product_image'+a+'">';
        html+=' <input id="" name="pdid[]" type="hidden" class="form-control" aria-required="true" aria-invalid="false" value="{{$pd_image['id']}}">';
        html+='<div class="form-group col-4"><label for="cc-image" class="control-label mb-1">Image</label><input id="ccimage" name="pdimag[]" type="file" class="form-control" aria-required="true" aria-invalid="false" value=""><img src="" alt="product image not found"></div>';
        html+=' <div class="col-2"><label for="btn" class="control-label mb-1">&nbsp; &nbsp;&nbsp;</label><button id="btn" onclick="remove_box_image('+a+')" name="" type="button" class="au-btn au-btn-icon au-btn--red"><i class="fa fa-minus">&nbsp;</i>Remove</button></div>';
        html+='</div>';
        console.log($('product_image').append(html));
        $('#product_image').append(html);
        
      

        // $('#product_image').append(html);
    }
    function remove_box_image(a) {
        console.log('<b>' + a + '</b>');
        $('#add_product_image' + a).remove();
    }
    CKEDITOR.replace('pd-keyword');
    CKEDITOR.replace('pd-desc');
    CKEDITOR.replace('pd-specification');
    CKEDITOR.replace('pd-uses');
</script>
@endsection