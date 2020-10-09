<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Model\Category;
use App\Model\Brand;
use App\Model\Color;
use App\Model\Size;
use App\Model\Product;
use App\Model\ProductSize;
use App\Model\ProductColor;
use App\Model\ProductSubImage;

class ProductController extends Controller
{
    public function view(){
        $data['allData'] = Product::all();
        //dd($allData);
        return view('backend.product.view-product', $data);
    }

    public function add(){
        return view('backend.product.add-product');
    }

    public function store(Request $req){

        $this->validate($req, [
            'name' => 'required|unique:colors,name'
        ]);
        $data = new Color();
        $data->name = $req->name;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('colors.view')->with('success','data Inserted Successfully');
    }

    public function edit($id){
        $editData = Color::find($id);
        return view('backend.color.add-color', compact('editData'));
    }

    public function update($id, ColorRequest $req){
        $data = Color::find($id);
        $data->name = $req->name;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('colors.view')->with('success', 'Data Updated successfully');
    }

    public function delete($id){
        $color = Color::findOrFail($id);
        $color->delete();
        return redirect()->route('colors.view')->with('success', 'Record deleted Successfully');
    }
}
