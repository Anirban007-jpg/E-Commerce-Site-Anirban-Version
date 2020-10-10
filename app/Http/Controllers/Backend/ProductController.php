<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
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
            $product->slug = str_slug($req->name);
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
                        $imgname = date('YmdHi').$file->getClientOriginalName();
                        $file->move('public/upload/product_images/product_sub_images/', $imgname);
                        $subimage['sub_image']=$imgname;

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
        $data['editData'] = Product::find($id);
        $data['categories']=Category::all();
        $data['brands']=Brand::all();
        $data['color']=Color::all();
        $data['sizes']=Size::all();
        $data['colorarr'] = ProductColor::select('color_id')->where('product_id', $data['editData']->id)->orderBy('id','asc')->get()->toArray();
        $data['sizearr'] = ProductSize::select('size_id')->where('product_id', $data['editData']->id)->orderBy('id','asc')->get()->toArray();

        return view('backend.product.add-product', $data);
    }

    public function update($id, ProductRequest $req){
        DB::transaction(function () use($req,$id){
            $this->validate($req, [
                'color_id'=>'required',
                'size_id'=>'required',
            ]);
            $product = Product::find($id);
            $product->category_id= $req->category_id;
            $product->brand_id= $req->brand_id;
            $product->name= $req->name;
            $product->slug = str_slug($req->name);
            $product->short_desc= $req->short_desc;
            $product->long_desc= $req->long_desc;
            $product->price= $req->price;
            $img = $req->file('image');
            if ($img) {
                $imgName = date('YmdHi').$img->getClientOriginalName();
                $img->move('public/upload/product_images/', $imgName);
                if (file_exists('public/upload/product_images/'.$product->image) AND ! empty($product->image)){
                    unlink('public/upload/product_images/'.$product->image);
                }
                $product['image']=$imgName;
            }
            if ($product->save()){

                $files = $req->sub_image;

                if (!empty($files)){
                    $subImage = ProductSubImage::where('product_id', $id)->get()->toArray();
                    foreach ($subImage as $value){
                        if(!empty($value)){
                            unlink('public/upload/product_images/product_sub_images/'. $value['sub_image']);
                        }
                    }
                }
                if (!empty($files)){
                    foreach ($files as $file) {
                        $imgname = date('YmdHi').$file->getClientOriginalName();
                        $file->move('public/upload/product_images/product_sub_images/', $imgname);
                        $subimage['sub_image']=$imgname;

                        $subimage = new ProductSubImage();
                        $subimage->product_id = $product->id;
                        $subimage->sub_image = $imgname;
                        $subimage->save();
                    }
                }

                $colors = $req->color_id;

                if(!empty($colors)){
                    ProductColor::where('product_id', $id)->delete();
                }

                if (!empty($colors)){
                    foreach ($colors as $color) {
                        $mycolor = new ProductColor();
                        $mycolor->product_id = $product->id;
                        $mycolor->color_id = $color;
                        $mycolor->save();
                    }
                }

                $sizes = $req->size_id;


                if(!empty($sizes)){
                    ProductSize::where('product_id', $id)->delete();
                }

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
         return redirect()->route('products.view')->with('success', 'Data Updated successfully');
    }

    public function delete($id){
        $product = Product::findOrFail($id);
        if (file_exists('public/upload/product_images/'.$product->image) AND ! empty($product->image)){
            unlink('public/upload/product_images/'.$product->image);
        }
        $subImage = ProductSubImage::where('product_id', $id)->get()->toArray();
        if (!empty($subImage)){
            foreach ($subImage as $value){
                if (!empty($value)){
                    unlink('public/upload/product_images/product_sub_images/'.$value['sub_image']);
                }
            }
        }
        ProductSubImage::where('product_id', $id)->delete();
        ProductColor::where('product_id', $id)->delete();
        ProductSize::where('product_id', $id)->delete();
        $product->delete();
        return redirect()->route('products.view')->with('success', 'Record deleted Successfully');
    }

    public function details($id){
        $details = Product::find($id);
        return view('backend.product.product-details', compact('details'));
    }
}
