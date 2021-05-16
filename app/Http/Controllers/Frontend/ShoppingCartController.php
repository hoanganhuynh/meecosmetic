<?php

namespace App\Http\Controllers\Frontend;

use App\order;
use App\product;
use App\transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;



class ShoppingCartController extends Controller
{
    public function addProduct(Request $request,$id){

        $products = product::select('id','pr_name','pr_price','pr_sale','pr_img')->find($id);
        if(!$products) return redirect('/');
        if($products->pr_sale > 0){
            $priceSale = $products->pr_price * (100 - $products->pr_sale)/100;
        }
        else{
            $priceSale = $products->pr_price;
        }
        \Cart::add([
            'id' => $id,
            'name' => $products->pr_name,
            'qty' => 1,
            'price' => $priceSale,
            'options' => [
                'avatar' => $products->pr_img,
                'sale' => $products->pr_sale,
                'price_old' => $products->pr_price
                ]
        ]);
        return redirect()->back();
    }

    public  function getListShoppingCart(){
        $listProducts = \Cart::content();

        $total = \Cart::subtotal(0,',','.');
        $viewdata = [
            'listProducts' =>  $listProducts,
            'total' => $total
        ];
        return view('frontend.pages.shopping.index',$viewdata);
    }
   
    public function deleteShoppingCart($id){
        \Cart::remove($id);
        \Session::flash('toastr',[
            'type' => 'success',
            'message' => 'Xóa thành công'
        ]);
        return redirect()->route('get.list.shopping.cart');
    }
    public function getFormPay(){
        $listProducts = \Cart::content();
        $total = \Cart::subtotal(0,',','.');
        $viewdata = [
            'listProducts' =>  $listProducts,
            'total' => $total
        ];
        return view('frontend.pages.shopping.pay',$viewdata);
    }
//    Save thong tin thanh toan
    public function saveInfoPayShoppingCart(Request $request){
            $totalMoneys = str_replace(',','',\Cart::subtotal(0,3));

            $transactionId = Transaction::insertGetId([
                'u_id' => get_data_user('web'),
                'tr_total' => $totalMoneys,
                'tr_address' => $request->address,
                'tr_phone_number' => $request->phone,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            if($transactionId){
                $listProducts = \Cart::content();
                foreach ($listProducts as $listProduct){
                    Order::insert([
                        'tr_id' =>  $transactionId,
                        'pr_id' => $listProduct->id,
                        'or_quality' => $listProduct->qty,
                        'or_price' => $listProduct->price,
                        'or_sale' => $listProduct->options->sale,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }
            }
//            Xoa item trong gio hang
            \Cart::destroy();
        \Session::flash('toastr',[
            'type' => 'success',
            'message' => 'Thanh toán thành công'
        ]);
        return redirect()->route('get.home');
    }
}
