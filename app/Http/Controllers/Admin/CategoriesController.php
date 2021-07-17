<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    public function index()
    {
        $result['data'] = Categories::all();

        return view('admin.categories', $result);
    }
    public function addcategories($id = "")
    {
        //when edit then if part run
        if ($id > 0) {
            $result = new Categories();
            $arr =  $result->where(['id' => $id])->get();
            $data['id'] = $arr[0]->id;
            $data['category_name'] = $arr[0]->category_name;
            $data['category_slug'] = $arr[0]->category_slug;
            $data['image'] = $arr[0]->image;
        }
        //when click add then this part run
        else {
            $data['category_name'] = "";
            $data['category_slug'] = "";
            $data['id'] = "";
            $data['image'] = "";
        }
        return view('admin.addcategories', $data);
    }
    //when submit data
    public function manageCategories(Request $request)
    {
        // return $request;
        $model = new Categories();
        $id = $request->post('id');
       
        if ($id > 0) {
            $image_validation = "mimes:jpeg,jpg,png"; //here image already present so not required
        } else {
            $image_validation = "required|mimes:jpeg,jpg,png";
        }
        $request->validate([
            'category_name' => 'required',
             'image'=> $image_validation,
            'category_slug' => 'required|unique:categories',
            //where 'id'=$id
        ]);

        if ($id > 0) {
            $model->where(['id' => $id])->get();
            // return Categories::find($id);
            $msg = 'Categories updated SucessFully';
        } else {

            $msg = 'Categories inserted SucessFully';
        }
   

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $ext = $image->extension();
            $image_name = time() . '.' . $ext;
            $image->storeAs('public/media/categories', $image_name);
            $model->image = $image_name;
        }
        // else
        // {
        //     $msg = 'select image';
            
        // }
        $model->category_name = $request->post('category_name');
        $model->category_slug = $request->post('category_slug');
        $model->status = 1;
        $model->save();
        $request->session()->flash('message', $msg);
        return redirect('admin/categories');

        // return redirect()
    }

    public function deleteCategories(Request $request, $id)
    {
        $result = Categories::find($id);
        $result->delete();
        $request->session()->flash('message', 'Categories Deleted SucessFully');
        return redirect('admin/categories');
    }
    public function status(Request $request, $status, $id)
    {
        $result = Categories::find($id);
        if ($status) {
            $msg = 'Activate';
        } else {
            $msg = 'Deactivate';
        }
        $result->status = $status;
        $result->save();
        $request->session()->flash('message', 'Categories ' . $msg . ' SucessFully');
        return redirect('admin/categories');
    }
}
