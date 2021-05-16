<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\product;
use App\brand;
use App\type_product;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $products = product::orderBy('id', 'DESC')->paginate(8);


        $viewdata = [
            'products' => $products
        ];
        return view('frontend.pages.home.index',$viewdata);
    }

    public function getListProduct(Request $request){
        $url = $request->segment(2);
        // dd($url);
        $url = preg_split('/(-)/i', $url);
        if($id = array_pop($url))
        {
            $products = product::where([
                'br_id' => $id,
                ])->orderBy('id', 'DESC') -> paginate(10);
                $brandss = brand::find($id);
                
            $viewData = [
                'products' => $products,
                'brandss' => $brandss
            ];

            return view('frontend.pages.brand.index',$viewData);
        }
    }

    public function getListProductType(Request $request){
        $url = $request->segment(2);

        $url = preg_split('/(-)/i', $url);

        if($id = array_pop($url))
        {
            $brid = array_pop($url);
            $products = product::where([
                'tp_id' => $id,
                'br_id' => $brid
                ])->orderBy('id', 'DESC') -> paginate(10);
                $brandss = brand::find($brid);
                $typePro = type_product::find($id);
                
            $viewData = [
                'products' => $products,
                'typePro' => $typePro,
                'brandss' => $brandss
            ];

            return view('frontend.pages.brand.typePro',$viewData);
        }
    }

    public function getListProductTypePro(Request $request){
        $url = $request->segment(2);
        $url = preg_split('/(-)/i', $url);

        if($id = array_pop($url))
        {
            $products = product::where([
                'tp_id' => $id
                ])->orderBy('id', 'DESC') -> paginate(10);
                $typePro = type_product::find($id);
                
            $viewData = [
                'products' => $products,
                'typePro' => $typePro
            ];

            return view('frontend.pages.brand.typeProo',$viewData);
        }
    }
}
