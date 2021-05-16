<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RequestProduct;
use App\Http\Requests\AdminRequestBrand;
use App\brand;
use App\product;
use App\type_product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AdminProductController extends Controller
{
    public function index(Request $request){
//        lấy dữ liệu để tìm kiếm
        $products = Product::with('relation_store:id,br_name');
        if(isset($request->search_name)) $products->where('pr_name','like','%'.$request->search_name.'%');
        
        $products = $products->orderByDesc('id')->paginate(15);

            $brands = $this->getBrand();
            $type_product = $this->getTypeProduct();
            $viewdata = [
                'products' => $products,
                'brands' => $brands,
                'type_products' => $type_product
            ];
        return view('admin.product.index',$viewdata);
    }

    public function create(){
        $brands = $this->getBrand();
        $type_product = $this->getTypeProduct();
        $viewdata = [
            'brands' => $brands,
            'type_products' => $type_product

        ];
        return view('admin.product.create',$viewdata);
    }

    public function store(RequestProduct $requestProduct){

        $product = new Product();
        $product->pr_name = $requestProduct->pr_name;
        $product->pr_slug = str_slug($requestProduct->pr_name);
        $product->br_id = $requestProduct->br_id;
        $product->pr_price = $requestProduct->pr_price;
        $product->pr_quality = $requestProduct->pr_quality;
        $product->pr_sale = $requestProduct->pr_sale;
        $product->pr_desc = $requestProduct->pr_desc;
        $product->pr_ingredent = $requestProduct->pr_ingredent;
        $product->pr_uses = $requestProduct->pr_uses;
        $product->pr_instruction_for_use = $requestProduct->pr_instruction_for_use;
        $product->pr_quality = $requestProduct->pr_quality;
        $product->tp_id = $requestProduct->tp_id;



        if($requestProduct->hasFile('pr_img')){
            $file = upload_image('pr_img');
            if(isset($file['name'])){
                $product->pr_img = $file['name'];
            }
        }
        if($requestProduct->hasFile('pr_img1')){
            $file = upload_image('pr_img1');
            if(isset($file['name'])){
                $product->pr_img1 = $file['name'];
            }
        }
        if($requestProduct->hasFile('pr_img2')){
            $file = upload_image('pr_img2');
            if(isset($file['name'])){
                $product->pr_img2 = $file['name'];
            }
        }

        $product->save();
        return redirect()->route('admin.index.product');
    }
    public function edit($id){
        $brands = $this->getBrand();
        $type_product = $this->getTypeProduct();
        $product = Product::find($id);
        $viewdata = [
            'brands' => $brands,
            'type_products' => $type_product,
            'product'=> $product
        ];
        return view('admin.product.update',$viewdata);
    }
    public function update(RequestProduct $requestProduct,$id){

        $product = Product::find($id);
        $product->pr_name = $requestProduct->pr_name;
        $product->pr_slug = str_slug($requestProduct->pr_name);
        $product->br_id = $requestProduct->br_id;
        $product->pr_price = $requestProduct->pr_price;
        $product->pr_quality = $requestProduct->pr_quality;
        $product->pr_sale = $requestProduct->pr_sale;
         if($requestProduct->hasFile('pr_img')) {
            $file = upload_image('pr_img');
            $path_url = pare_url_file($product->pr_img);

            if(file_exists(public_path() . $path_url)){
                unlink( public_path(). $path_url);
            }
            if (isset($file['name'])) {
                $product->pr_img = $file['name'];


            }
        }


        $product->save();
        return redirect()->route('admin.index.product');
    }

    public function delete($action,$id){
        if($action){
            $product = Product::find($id);
                $path_url = pare_url_file($product->pr_img);
                if(File::exists(Public_path(). $path_url)){ File::delete(Public_path() . $path_url);}
                $product->delete();
        }
        return Redirect()->Route('admin.index.product');
    }




    public function getBrand(){
        return brand::all();
    }

   public function getTypeProduct(){
       return type_product::all();
   }
}
