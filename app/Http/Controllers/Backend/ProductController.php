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
        $data['categories']=Category::all();
        $data['brands']=Brand::all();
        $data['color']=Color::all();
        $data['sizes']=Size::all();
        return view('backend.product.add-product', $data);
    }

    public function store(Request $req){
        DB::transaction(function () use($req){
            $this->validate($req, [
                'name' => 'required|unique:products,name',
                'color_id'=>'required',
                'size_id'=>'required',
           ]);
            $product = new Product();
            $product->category_id= $req->category_id;
            $product->brand_id= $req->brand_id;
            $product->name= $req->name;
            $product->short_desc= $req->short_desc;
            $product->long_desc= $req->long_desc;
            $product->price= $req->price;
            $img = $req->file('image');
            if ($img) {
                $imgName = date('YmdHi').$img->getClientOriginalName();
                $img->move('public/upload/product_images/', $imgName);
                $product['image']=$imgName;
            }
            if ($product->save()){
                $files = $req->sub_image;
                if (!empty($files)){
                    foreach ($files as $file) {
                        $imgname = date('YmdHi').$img->getClientOriginalName();
                        $img->move('public/upload/product_sub_images/', $imgname);
                        $product['sub_image']=$imgname;

                        $subimage = new ProductSubImage();
                        $subimage->product_id = $product->id;
                        $subimage->sub_image = $imgname;
                        $subimage->save();
                    }
                }

                $colors = $req->color_id;
                    if (!empty($colors)){
                        foreach ($colors as $color) {
                            $mycolor = new ProductColor();
                            $mycolor->product_id = $product->id;
                            $mycolor->color_id = $color;
                            $mycolor->save();
                        }
                    }

                    $sizes = $req->size_id;
                     if (!empty($sizes)){
                        foreach ($sizes as $size) {
                            $mysize = new ProductSize();
                            $mysize->product_id = $product->id;
                            $mysize->size_id = $size;
                            $mysize->save();
                        }
                    }
            }else{
                return redirect()->back()->with('error','Sorry Data not saved');
            }
        });
//
//

        return redirect()->route('products.view')->with('success','data Inserted Successfully');
    }

    public function edit($id){
        $editData = Product::find($id);
        $data['categories']=Category::all();
        $data['brands']=Brand::all();
        $data['color']=Color::all();
        $data['sizes']=Size::all();
        return view('backend.product.add-product', compact('editData'));
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
