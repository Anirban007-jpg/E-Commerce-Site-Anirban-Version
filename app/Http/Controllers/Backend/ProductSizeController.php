<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SizeRequest;

use Illuminate\Http\Request;
use App\Model\Size;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductSizeController extends Controller
{
    public function view(){
        $data['allData'] = Size::all();
        //dd($allData);
        return view('backend.size.view-product-size', $data);
    }

    public function add(){
        return view('backend.size.add-product-size');
    }

    public function store(Request $req){

        $this->validate($req, [
            'name' => 'required|unique:sizes,name'
        ]);
        $data = new Size();
        $data->name = $req->name;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('sizes.view')->with('success','data Inserted Successfully');
    }

    public function edit($id){
        $editData = Size::find($id);
        return view('backend.size.add-product-size', compact('editData'));
    }

    public function update($id, SizeRequest $req){
        $data = Size::find($id);
        $data->name = $req->name;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('sizes.view')->with('success', 'Data Updated successfully');
    }

    public function delete($id){
        $size = Size::findOrFail($id);
        $size->delete();
        return redirect()->route('sizes.view')->with('success', 'Record deleted Successfully');
    }
}
