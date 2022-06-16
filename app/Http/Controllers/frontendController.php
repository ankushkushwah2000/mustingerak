<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class frontendController extends Controller
{
   public function index(){
       $data = Category::all();
       $product = Product::where("status",1)->get();
       $banner = Banner::where('status',1)->latest()->limit(3)->get();
       return view('frontend.index',compact('data','product','banner'));
   }

   public function track_order(){
       return view('frontend.truckorder');
   }

   public function about(){
       return view('frontend.about');
   }

   public function contact(){
       return view('frontend.contact');
   }
   public function singal_product($id){
       $data = Product::where("id",$id)->get();
       return view('frontend.singal_product',compact('data'));
   }
   public function add_to_cart(Request $a){
    $session_id= Session::getid();
       $data = new Cart();
       $data->product_id=$a->product_id;
       $data->quantity=$a->quantity;
       $data->discount=1;
       $data->size = $a->size;
       $data->colour = $a->colour;
       $data->product_price = $a->product_price;
       $data->product_name = $a->product_name;
       $data->session_id = $session_id;
       if(Auth::check()){
        $data->user_id= Auth::user()->id;
       }
       $data->save();
       return redirect('/cart');
   }
   public function cart(){
       $session_id = Session::getId();
       $sum = 0;
       if(Auth::check()){
        $user_id= Auth::user()->id;
        $data = Cart::where("user_id",$user_id)->get();
       }
       else{
        $data = Cart::where("session_id",$session_id)->get();
       }
       foreach($data as $a)
       {

            foreach($a->product as $p)
            {
                $sum = $sum + $p->selling_price*$a->quantity;
                // dump("selling_price ".$p->selling_price." qunatity".$a->quantity."sum ".$sum);
            }
       }
       return view('frontend.partition.cart',compact('data'))->with(['sum'=>$sum]);
   }

   public function search(Request $request){
    $this->validate($request,['search'=>'required|max:255']);
    $search = $request->search;
    $product = Product::where('title','like',"%$search%")->paginate(7);
    $product->appends(['search'=>$search]);
    return view('frontend.search',compact('product'));
   }

   public function delete_from_cart(Request $req)
   {
    Cart::where('id',$req->id)->delete();
     return redirect()->back();
   }

   public function check_out(){
    if(Auth::check()){
        $user_id = Auth::user()->id;
        $data = Cart::where('user_id',$user_id)->get();
        return view('frontend.checkout',compact('data'));
    }
    else{
        return redirect()->back()->with('message', 'plz login your self!');;
    }
   }
}
