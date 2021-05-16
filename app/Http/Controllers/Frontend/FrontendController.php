<?php

namespace App\Http\Controllers\Frontend;

//use App\Models\Area;
use App\brand;
//use App\TypeCook;
use App\type_product;
use App\product;
//use App\Models\TypeQuality;
//use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\View\View;
use Illuminate\Support\Facades\View;


class FrontendController extends Controller
{
    public function __construct()
    {
        $brands = brand::all();
        $products = product::all();
        $typeProducts = type_product::all();
        View::share('brands',$brands);
        View::share('typeProducts',$typeProducts);
        View::share('products',$products);

    }
}
