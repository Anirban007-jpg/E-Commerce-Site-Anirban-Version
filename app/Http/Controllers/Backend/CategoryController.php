<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function view(){
        $data['allData'] = Category::all();
        //dd($allData);
        return view('backend.category.view-category', $data);
    }

    public function add(){
        return view('backend.category.add-category');
    }

    public function store(Request $req){

        $this->validate($req, [
            'name' => 'required|unique:categories,name'
        ]);
        $data = new Category();
        $data->name = $req->name;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('categories.view')->with('success','data Inserted Successfully');
    }

    public function edit($id){
        $editData = Category::find($id);
        return view('backend.category.add-category', compact('editData'));
    }

    public function update($id, CategoryRequest $req){
        $data = Category::find($id);
        $data->name = $req->name;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('categories.view')->with('success', 'Data Updated successfully');
    }

    public function delete($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.view')->with('success', 'Record deleted Successfully');
    }
}
