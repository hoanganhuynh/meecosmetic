<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminRequestBrand;
use App\brand;
use App\type_product;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Switch_;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class AdminBrandController extends Controller
{
    public function __construct(){
        $typeProducts = type_product::all();
        View::share('typeProducts',$typeProducts);
    }
    public function index(){
        $viewdata['brands'] = brand::all();
        return view('admin.brand.index', $viewdata);
    }

    public function create(){
        return view('admin.brand.create');
    }

    public function store(AdminRequestBrand $requestBrand){
        $brand = new brand();
        $brand->br_name = $requestBrand->name;
        $brand->br_slug = str_slug($requestBrand->name);
        $brand->br_origin = $requestBrand->origin;
        $brand->br_desc = $requestBrand->br_desc;

        $brand->save();

        return Redirect()->Route('admin.index.brand');
    }

    public function update(AdminRequestBrand $requestBrand, $id){
        $brand = brand::find($id);
        $brand->br_name = $requestBrand->name;
        $brand->br_slug = str_slug($requestBrand->name);
        $brand->br_origin = $requestBrand->br_origin;
        $brand->br_desc = $requestBrand->br_desc ? $requestBrand->br_origin : $requestBrand->name;
        $brand->save();

        return Redirect()->Route('admin.index.brand');
    }

    public function delete($action,$id){
        if($action){
            $brand = brand::find($id);
                    $brand->delete();
        }
        return Redirect()->Route('admin.index.brand');
    }

    public function edit($id){
        $brand = brand::find($id);
        return view('admin.brand.update',compact('brand'));
    }
}
