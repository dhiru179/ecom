<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            $data['sku'] = "";
            $data['mrp'] = "";
            $data['price'] = "";
            $data['qty'] = "";
            $data['size'] = "";
            $data['color'] = "";
            $data['image'] = "";
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
            $data['sku'] = "";
            $data['mrp'] = "";
            $data['price'] = "";
            $data['qty'] = "";
            $data['size'] = "";
            $data['color'] = "";
            $data['image'] = "";
            
        }
        $data['categories'] = DB::table('categories')->where(['status' => 1])->get();//here model concept not used
        return view('admin.addProduct', $data);
    }
    //when submit then work here
    public function manageProduct(Request $request)
    {
    //   try {
         // return $request->post();   
        $model = new Product();
        $id = $request->post('id'); //get id from hidden input
        if($id>0){
            $image_validation="mimes:jpeg,jpg,png";//here image already present so not required
        }else{
            $image_validation="required|mimes:jpeg,jpg,png";
        }
        $request->validate([
            'name' => 'required',
            'image'=>$image_validation,
            'slug' => 'required|unique:Products,slug,' . $id,
            // 'category_slug' => 'required|unique:Products,category_slug'.$id,

        ]);

        if ($id > 0) {
            $model->where(['id' => $id])->get();
            // return Product::find($id);
            $msg = 'Product updated SucessFully';
        } else {

            $msg = 'Product inserted SucessFully';
        }
   
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $ext = $image->extension();
            $image_name = time() . '.' . $ext;
            $image->storeAs('/public/media', $image_name);
            $model->image = $image_name;
            
        }

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
        return redirect('admin/product');
        // return view('admin.product');

    //   } catch (\Throwable $th) {
    //     //   echo '<pre>';
    //       echo $th->getMessage();
    //   }
        
    }

    public function deleteProduct(Request $request, $id)
    {
        $result = Product::find($id);
        $result->delete();
        $request->session()->flash('message', 'Product Deleted SucessFully');
        return redirect('admin/product');
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
