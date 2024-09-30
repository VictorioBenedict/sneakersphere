<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shoe;
use App\Models\CartItem;
use Illuminate\Routing\Controller;


class ShoeController extends Controller
{
    public function index(){
        $shoes = Shoe::all();
        return response()->json(['shoes' => $shoes]);
        return view ('products',compact('shoes'));
    }

    public function indexx(){
        $shoes = Shoe::all()->reverse();
        return view ('products',compact('shoes'));
    }
    public function developers(){
        return view ('developers');
    }

    public function services(){
        return view ('services');
    }

    public function main(){
        return view ('main');
    }

    public function shoes(){
        return view ('create');
    }
    public function store(Request $request){
           $shoes = new Shoe();
           Shoe::create([
            'name' => $request-> name,
            'image' => $request -> image,
            'description' => $request-> description,
            'price' => $request -> price,
           ]);
           return redirect('dashboard!2HmHzjLE90zxbdgftcxnbsazxctyr538djf!')->with('success','Product Successfully Added');
    }
    public function show($id){
        $shoes = Shoe::find($id);
        return view('show',compact('shoes'));
    }

    public function edit($id){
        $shoes = Shoe::find($id);
        return view('edit',compact('shoes'));
    }

    public function update(Request $request, $id){
        $shoes = Shoe::find($id);
        $shoes->name=$request->name;
        $shoes->image=$request->image;
        $shoes->description=$request->description;
        $shoes->price=$request->price;
        $shoes->save();
        return redirect('dashboard!2HmHzjLE90zxbdgftcxnbsazxctyr538djf!')->with('success','Product Successfully Updated');
    }

    public function destroy($id){
        Shoe::find($id)->delete();
        return redirect('dashboard!2HmHzjLE90zxbdgftcxnbsazxctyr538djf!')->with('success','Product Successfully Deleted');
    }

    public function mainindex(){
        $shoes = Shoe::get()->reverse();
        return view('index',compact('shoes'));
    }

    public function addtocart($id){
        $shoes = Shoe::find($id);
        $cart = session()->get('cart',[]);
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }
        else{
            $cart[$id] = [
                'name' => $shoes->name,
                'quantity' => 1,
                'size' => 6,
                'image' => $shoes->image,
                'description' => $shoes->description,
                'price' => $shoes->price,
            ];
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success','Product Has Been Added To Cart!');
    }
    public function updates(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Quantity Successfully Updated!');
        }
        elseif($request->id && $request->size){
            $cart = session()->get('cart');
            $cart[$request->id]["size"] = $request->size;
            session()->put('cart',$cart);
            session()->flash('success', 'Size Successfully Updated!');
        }
    }

    public function mycart(){
        return view('mycart');
    }

    public function deleteProduct(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product Successfully Deleted!');
        }
    }
 
    public function session(Request $request)
{
    \Stripe\Stripe::setApiKey(config('stripe.sk'));

    $productname = $request->get('productname');
    $totalprice = $request->get('total');
    $totalInCents = intval($totalprice) * 100; // Convert dollars to cents

    $session = \Stripe\Checkout\Session::create([
        'line_items'  => [
            [
                'price_data' => [
                    'currency'     => 'PHP',
                    'product_data' => [
                        "name" => $productname,
                    ],
                    'unit_amount'  => $totalInCents,
                ],
                'quantity'   => 1,
            ],
        ],
        'mode'        => 'payment',
        'success_url' => route('success'),
        'cancel_url'  => route('mycart'),
    ]);

    return redirect()->away($session->url);
}

    public function success(Request $request)
    {   
        
        
        $cart = session()->get('cart');
        // Save each cart item to the database
        foreach ($cart as $productId => $item) {
            CartItem::create([
                'product_id' => $productId,
                'name' => $item['name'],
                'image' => $item['image'],
                'quantity' => $item['quantity'],
                'size' => $item['size'],
                'price' => $item['price']
                // Add other fields as needed
            ]);
        }
        session()->forget('cart');
        return redirect('/yha!2746dghmzndccghfdujmAzhc681028fghfbz/home')->with('success','Thankyou For Purchasing!');
    }

    public function search(Request $request){
        $search = $request->search;
        $shoes= Shoe::where(function($query)use($search){
            $query->where('name','like',"%$search%")
            ->orwhere('description','like',"%$search%")
            ->orwhere('price','like',"%$search%");
        })
        ->get()->reverse();
        return view('index',compact('shoes','search'));
    }

    public function searchh(Request $request){
        $searchh = $request->search;
        $shoes= Shoe::where(function($query)use($searchh){
            $query->where('name','like',"%$searchh%")
            ->orwhere('description','like',"%$searchh%")
            ->orwhere('price','like',"%$searchh%");
        })
        ->get()->reverse();
        return view('products',compact('shoes','searchh'));
    }

    public function history(){
        $cartItems = CartItem::all();
        return view('history',compact('cartItems'));
    }


  
}
