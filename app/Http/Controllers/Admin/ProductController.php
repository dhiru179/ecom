<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $result['data'] = Product::all();

        return view('admin.product', $result);
    }

    //for add and edit product here 
    public function addProduct(Request $request, $id = "") //$id get from prameter
    {
        if ($id > 0) {
            $model = new Product();
            $arr =  $model->where(['id' => $id])->get();
            $data['categories_id'] = $arr[0]->categories_id;
            $data['slug'] = $arr[0]->slug;
            $data['name'] = $arr[0]->name;
            $data['image'] = $arr[0]->image;
            $data['brand'] = $arr[0]->brand;
            $data['model'] = $arr[0]->model;
            $data['short_desc'] = $arr[0]->short_desc;
            $data['keywords'] = $arr[0]->keywords;
            $data['tech_specification'] = $arr[0]->tech_specification;
            $data['uses'] = $arr[0]->uses;
            $data['warranty'] = $arr[0]->warranty;
            $data['id'] = $arr[0]->id;
            /* ************ product atrributes when edit */
            $data['product_attributes'] = DB::table('product_attr')->where(['product_id' => $id])->get();
            $data['product_images'] = DB::table('product_image')->where(['product_id' => $id])->get();
        } else {
            $data['categories_id'] = "";
            $data['slug'] = "";
            $data['name'] = "";
            $data['image'] = "";
            $data['brand'] = "";
            $data['model'] = "";
            $data['short_desc'] = "";
            $data['keywords'] = "";
            $data['tech_specification'] = "";
            $data['uses'] = "";
            $data['warranty'] = "";
            $data['id'] = "";

            /* ************ product atrributes when add */
            $data['product_attributes'][0]['id'] = "";
            $data['product_attributes'][0]['sku'] = "";
            $data['product_attributes'][0]['mrp'] = "";
            $data['product_attributes'][0]['price'] = "";
            $data['product_attributes'][0]['qty'] = "";
            $data['product_attributes'][0]['size'] = "";
            $data['product_attributes'][0]['color'] = "";
            $data['product_attributes'][0]['image'] = "";

            /*product image */
            $data['product_images'][0]['id']="";
            $data['product_images'][0]['product_id']="";
            $data['product_images'][0]['images']="";
            
        }
        $data['categories'] = DB::table('categories')->where(['status' => 1])->get(); //here model concept not used
        return view('admin.addProduct', $data);
    }


    //when submit then work here
    public function manageProduct(Request $request)
    {
          try {
       
        $model = new Product();
        $id = $request->post('id'); //get id from hidden input
        $slug = $request->post('slug');

        if ($id > 0) {
            $image_validation = "mimes:jpeg,jpg,png"; //here image already present so not required
            $msg = 'Product updated SucessFully';
            $slug_validation='required|unique:products,slug,'.$request->post('id');
     
            // $m = $model->where(['slug' => $slug])->get();
            // if ($m->count()) {
            //     // echo "exist";
            //     $message = "The slug has already been taken....";
            //     $slug_validation="required";
                
            // } else {
               
            //     $slug_validation="required";
            //     // echo "not exist you can edit";
            // }
        } else {
            $image_validation = "required|mimes:jpeg,jpg,png";
            $slug_validation="required|unique:products,slug,";
            $msg = 'Product inserted SucessFully';
        }
        
     

        $request->validate([
            'name' => 'required',
            'image' => $image_validation,
            'slug'=>$slug_validation, 
            // 'category_slug' => 'required|unique:Products,category_slug'.$id,
        ]);

        if ($request->hasfile('image')) {
           $image_file = $request->file('image');
          // $imageName = $image_file->getClientOriginalName();
            // $image = $_FILES['image']['name'];
            $ext =  $image_file->extension();
            $image_name = time() . '.' . $ext;
            $image_file->storeAs('/public/media', $image_name);
           
            $model->image = $image_name;
        }
        else
        {
            $model->image = $request->post('currentimage');
            // return $model->where(['id'=>$id])->get('image')[0]['image'];
        }
      

        // store in form array
        $pdattrid = $request->post('pdattrid');
        $sku = $request->post('sku');
        $mrp = $request->post('mrp');
        $price = $request->post('price');
        $qty = $request->post('qty');
        $size = $request->post('size');
        $color = $request->post('color');
        $image_attr = $request->post('image_attr');




        $model->categories_id = $request->post('categories_id');
        $model->slug = $request->post('slug');
        $model->name = $request->post('name');
        // $model->image = 'default_name.jpeg'; //$request->post('image');
        $model->brand = $request->post('brand');
        $model->model = $request->post('model');
        $model->short_desc = $request->post('short_desc');
        $model->keywords = $request->post('keywords');
        $model->tech_specification = $request->post('tech_specification');
        $model->uses = $request->post('uses');
        $model->warranty = $request->post('warranty');

        $model->status = 1;

        $model->save();
        $request->session()->flash('message', $msg);
        foreach ($sku as $key => $value) {
            $productAttr = [];
            $productAttr['product_id'] = $model->id;
            $productAttr['sku'] = $sku[$key];
            $productAttr['image'] = "image";
            $productAttr['mrp'] = $mrp[$key];
            $productAttr['price'] = $price[$key];
            $productAttr['qty'] = $qty[$key];
            if ($size[$key] == "") {
                $productAttr['size'] = "";
            } else {
                $productAttr['size'] = $size[$key];
            }
            if ($color[$key] == "") {
                $productAttr['color'] = "";
            } else {
                $productAttr['color'] = $color[$key];
            }
            if ($pdattrid[$key] = !"") {
                DB::table('product_attr')->where(['id' => $pdattrid[$key]])->update($productAttr);
            } else {
                DB::table('product_attr')->insert($productAttr);
            }
        }
        return redirect('admin/product');
        

          } catch (\Throwable $th) {
            //   echo '<pre>';
              echo $th->getMessage();
          }

    }

    public function deleteProduct(Request $request, $id)
    {
        $result = Product::find($id);
        $result->delete();
        $request->session()->flash('message', 'Product Deleted SucessFully');
        return redirect('admin/product');
    }
    public function delete_product_attributes(Request $request, $pdid, $pdattrid)
    {
        $result = DB::table('product_attr')->where(['id' => $pdattrid]);
        $result->delete();
        $request->session()->flash('message', 'ProductAttributes Deleted SucessFully');
        return redirect('admin/product/addproduct/' . $pdid);
    }
    public function status(Request $request, $status, $id)
    {
        $result = Product::find($id);
        if ($status) {
            $msg = 'Activate';
        } else {
            $msg = 'Deactivate';
        }
        $result->status = $status;
        $result->save();
        $request->session()->flash('message', 'Product ' . $msg . ' SucessFully');
        return redirect('admin/product');
    }
}
