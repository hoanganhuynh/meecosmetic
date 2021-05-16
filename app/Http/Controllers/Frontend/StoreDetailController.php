<?php

namespace App\Http\Controllers\Frontend;

//use App\Models\Area;
use App\product;
use App\type_product;
use App\comment;
use App\brand;
use App\order;
// use App\Models\Store;
//use App\Models\TypeCook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreDetailController extends Controller
{
    public function getStoreSearch(Request $request)
    {
         $values = $request->find_product;
        //  $searchResults = (new search())
        //  ->registerModel(product::class, ['name', 'description']) //apply search on field name and description
         //Config partial match or exactly match
        //  ->registerModel(brand::class, function (ModelSearchAspect $modelSearchAspect) {
        //      $modelSearchAspect
        //          ->addExactSearchableAttribute('name') // only return results that exactly match
        //          ->addSearchableAttribute('description'); // return results for partial matches
        //  })
        //  ->perform($searchterm);
        // $proSearch = product::with('relation_store', 'get_tproduct');
        // if(isset($request->find_product)){
        //     $proSearch->where('pr_name', 'like', '%' . $request->find_product . '%')
        //     ->whereHas('brand', function ($proSearch) use ($values) {
        //         $proSearch->where('br_name','like','%'.$values.'%');
        //     })->get();
            //     ->orWhere('pr_uses', 'like', '%' . $request->find_product . '%')->get();
                // ->orWhere('br_name', 'like', '%'.$request->find_product.'%')
                // ->orWhere('tp_name', 'like', '%'.$request->find_product.'%')->get();
          
            // $proSearch = brand::where('br_name','like','%'.$request->find_product.'%')->get();
            // $proSearch = product::where('br_id', $hihi->id)->get();
        $proSearch = product::where('pr_name', 'like', '%' . $values . '%')
                    ->orWhere('pr_uses', 'like','%'.$values.'%')
                    ->orWhere('pr_ingredent', 'like', '%'.$values.'%')->get();
        $viewdata = [
            'proSearch' => $proSearch
        ];

        return view('frontend.pages.store.listStore', $viewdata);

        //    return redirect()->route('get.error.store_search');


    }


    public function getDetailStore(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i', $url);

        if ($id = array_pop($url)) {
            $proDetails = product::find($id);
            $brandProDetail = brand::find($proDetails->br_id);
            $typeProDetail = type_product::find($proDetails->tp_id);
            $quality = order::where('pr_id', $id)->get();
                $totalss = ($proDetails->pr_quality);

            $comments = comment::where('pr_id', $id)->orderBy('id', 'DESC')->paginate(6);
            $total = Comment::where('pr_id',$id)->count();
            $viewdata = [
                'proDetails' => $proDetails,
                'brandProDetail' => $brandProDetail,
                'typeProDetail' => $typeProDetail,
                'comments' => $comments,
                'total' => $total,
                'totalss' => $totalss,
                'quality' => $quality
            ];
            return view('frontend.pages.store.detail', $viewdata);


        }
        dd($request->all());
        if ($request->ajax()) {
            if($id = array_pop($url)){
                $productInStoreDetails = Product::where([
                    'pro_typeStore_id' => $id
                ]);
                $output = '';
                $products = $productInStoreDetails->where('pr_name', 'LIKE', '%' . $request->txtSearch . '%')->get();
                if ($products) {
                    foreach ($products as $key => $product) {
                        $output .= ' <div class="menu-detail-main-list">
                        <div class="menu-detail__content">
                            <div class="menu-detail__content-img">
                                <img src=' . pare_url_file($product->pro_avatar) . ' alt="">
                            </div>
                            <div class="menu-detail__content-txt">
                                <h5 class="menu-title">' . $product->pro_name . '</h5>
                                <div class="menu-price">' . $product->pro_price . ' VND</div>

                            </div>
                    </div>';
                    }
                }

                return Response($output);
            }
            }


    }



}
