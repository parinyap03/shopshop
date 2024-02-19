<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Sale;
use App\Models\SaleDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function create()
    {
    return view('sale.create');
    }
    public function store(Request $request)
    {
        $user_id = 1;

        try {
// Begin transaction
            DB::beginTransaction();
            $sale = new Sale();
            $sale->shipping_name = request('shipping_name');
            $sale->shipping_address = request('shipping_address');
            $sale->shipping_tel = request('shipping_tel');
            $sale->discount = request('discount',0); // Example discount
            $sale->subtotal = request('subtotal',0); // Example subtotal
            $sale->payment_date = null; // Example null payment date
            $sale->status = 'pending';
            $sale->user_id = $user_id;
            $sale->save();
            $subtotal = 0;
            $items = Cart::where('user_id',$user_id)->get();
            foreach ($items as $item){
                $sale_detail = new SaleDetail();
                $sale_detail->product_id = $item->product_id;
                $sale_detail->sale_id = $sale->id;
                $sale_detail->unit_price = $item->product->price;
                $sale_detail->qty = $item->qty;
                $subtotal += $sale_detail->unit_price * $sale_detail->qty;
                $sale_detail->save();
            }
            $sale->subtotal = $subtotal;
            $sale->save();
// umcomment when on production
//Cart::where('user_id',$user_id)->delete();
            DB::commit();
            return redirect()->route('products.index')->with('status', 'บันทึกรายการสั่งซื้อสำเร็จ');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('products.index')->with('status',
                'Transaction failed: ' . $e->getMessage());
        }
    }

}
