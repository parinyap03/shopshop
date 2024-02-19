<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
//        dd($user);
        $products = Product::all();
        $carts = Cart::where('user_id',$user)->get();
        return view('product.index',compact('products','carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ptypes = ProductType::all();
        return view('product.create')->with('ptypes',$ptypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $p = new Product();
        $p->name = $request->name;
        $p->cost = $request->cost;
        $p->price = $request->price;
        $p->qty = $request->qty;
        $p->image_url = $request->image_url;
        $p->product_type_id = $request->product_type_id;
        $p->save();
        return redirect()->route('products.index')->with('status','บันทึกข้อมูลสำเร็จ');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return back();
    }
    public function  add_to_cart($product_id)
    {
        $user_id = Auth::user()->id;
        //find item
        $cart = Cart::where('user_id',$user_id)->where('product_id',$product_id)->first();
        if($cart ==null){
            $cart= new Cart();
            $cart->qty=0;
        }
        $cart->product_id = $product_id;
        $cart->user_id = $user_id;
        $cart->qty+=1;
        $cart->save();

        return redirect()->route('products.index')->with('status','เพิ่มสินค้าลงตะกร้าสำเร็จ');
    }
    public function remove_from_cart($product_id)
    {
        $user_id = Auth::user()->id;
        $cart = Cart::where('user_id',$user_id)
            ->where('product_id',$product_id)->first();
        if($cart !=null){
            $cart->qty-=1;
            $cart->save();
        }
        return redirect()->route('products.index')->with('status','นำสินค้าออกจากตะกร้าสำเร็จ');

    }
    public function empty_cart()
    {
        $user_id = Auth::user()->id;
        $cart = Cart::where('user_id',$user_id)->delete();
        return redirect()->route('products.index')->with('status','ล้างตะกร้าสำเร็จ');

    }

}
