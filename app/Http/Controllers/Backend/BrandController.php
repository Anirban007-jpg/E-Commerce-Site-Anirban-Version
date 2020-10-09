<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Model\Brand;

class BrandController extends Controller
{
    public function view(){
        $data['allData'] = Brand::all();
        //dd($allData);
        return view('backend.brand.view-brand', $data);
    }

    public function add(){
        return view('backend.brand.add-brand');
    }

    public function store(Request $req){

        $this->validate($req, [
            'name' => 'required|unique:brands,name'
        ]);
        $data = new Brand();
        $data->name = $req->name;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('brands.view')->with('success','data Inserted Successfully');
    }

    public function edit($id){
        $editData = Brand::find($id);
        return view('backend.brand.add-brand', compact('editData'));
    }

    public function update($id, BrandRequest $req){
        $data = Brand::find($id);
        $data->name = $req->name;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('brands.view')->with('success', 'Data Updated successfully');
    }

    public function delete($id){
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('brands.view')->with('success', 'Record deleted Successfully');
    }
}
