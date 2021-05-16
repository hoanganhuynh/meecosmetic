<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RequestTypeProduct;
use App\type_product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTypeProductController extends Controller
{
    public function index(){
        $typeProducts = type_product::select('id','tp_name','tp_desc')->get();
        $viewdata = [
            'typeProducts' => $typeProducts
        ];
        return view('admin.typeProduct.index',$viewdata);
    }
    public function create(){
        return view('admin.typeProduct.create');
    }
    public function store(RequestTypeProduct $requestTypeProduct){
        $typeProduct = new type_product();
        $typeProduct->tp_name = $requestTypeProduct->tp_name;
        $typeProduct->tp_slug = str_slug($requestTypeProduct->tp_name);
        $typeProduct->tp_desc = $requestTypeProduct->tp_desc;
        $typeProduct->save();

        return redirect()->route('admin.index.typeProduct');
    }

    public function edit($id){
        $typeProduct = type_product::find($id);
        return view('admin.typeProduct.update',compact('typeProduct'));
    }
    public function update(RequestTypeProduct $requestTypeProduct,$id){
        $typeProduct = type_product::find($id);
        $typeProduct->tp_name = $requestTypeProduct->tp_name;
        $typeProduct->tp_slug = str_slug($requestTypeProduct->tp_name);
        $typeProduct->tp_desc = $requestTypeProduct->tp_desc;

        $typeProduct->save();

        return redirect()->route('admin.index.typeProduct');
    }
    public function delete($action,$id){
        if($action){
            $typeProduct = type_product::find($id);
            switch ($action){
                case 'delete':
                    $typeProduct->delete();
                    break;
            }
        }
        return Redirect()->Route('admin.index.typeProduct');
    }


}
