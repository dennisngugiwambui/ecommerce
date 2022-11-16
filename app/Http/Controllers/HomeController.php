<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Session;
use Stripe;

class HomeController extends Controller
{
    public function home()
    {
        if(Auth::id())
        {
            $usertype=Auth::user()->usertype;

        if($usertype=='1')
        {
            $total_product=Product::all()->count();
            $total_order=Order::all()->count();
            $total_user=User::all()->count();
            // $total=Product::all()->count();
            $orders=Order::all();
            $total_revenue=0;
            foreach($orders as $orders)
            {
                $total_revenue=$total_revenue+$orders->price;
            }

            $total_delivered= Order::where('delivery_status', '=', 'delivered')->get()->count();
            $total_processing= Order::where('delivery_status', '=', 'processing')->get()->count();

            return view('admin.home', compact('orders', 'total_product', 'total_user', 'total_order', 'total_revenue', 'total_delivered', 'total_processing'));
        }
        else
        {
            $products = Product::all();
            $carts=Cart::all()->count();
            return view('shop.index', compact('products', 'carts'));
        }
        }
        else
        {
            return view('auth.login');
        }
    }

    public function index()
    {
        // $products = Product::paginate(6);
        $products = Product::where('quantity', '>=', 1)->get();
        $carts=Cart::all()->count();
        return view('shop.index', compact('products', 'carts'));
    }

    public function product_details($id)
    {
        $carts=Cart::all()->count();
        $products = Product::find($id);
        return view('shop.product_details', compact('products', 'carts'));
    }

    public function one(Request $req)
    {
        $prod=Product::find($req->id);
        return view('shop.see');
    }
    public function add_cart(Request $req)
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $products = Product::find($req->id);
            $cart = new Cart();

            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;

            $cart->product_title=$products->title;
            if($products->discount_price!=null)
            {
                $cart->price=$products->discount_price * $req->quantity;
            }
            else
            {
                $cart->price=$products->price * $req->quantity;
            }
            $cart->image=$products->image;
            $cart->product_id=$products->id;

            $cart->quantity=$req->quantity;
            $cart->save();

            alert()->success('success','You have added a new product from '.$products->category.' category to cart');
            return redirect()->back()->with('success','products added to cart');

        }
        else
        {
            // $message='please make sure you are logged in before accessing this page';
            // alert()->info('login!!', $message);
            return redirect('login');
        }
    }

    public function cart(Request $req)
    {

        if(Auth::id())
        {
            $id=Auth::user()->id;

            $cart = Cart::where('user_id', '=', $id)->get();
            $carts=Cart::where('user_id', '=', $id)->count();

            return view('shop.cart', compact('cart', 'carts'));
        }
        else
        {
            return view('auth.login');
        }
    }

    public function remove_cart(Request $req)
    {
        if(Auth::id())
        {
            $cart = Cart::find($req->id);

            $cart->delete();

            $message='product removed successfully from the cart';
            alert()->success('success', $message);
            return redirect()->back()->with('success', $message);
        }
        else
        {
            return view('auth.login');
        }
    }

    public function cashPay()
    {
        $user=Auth::user();
        $userid=$user->id;
        $data=Cart::where('user_id', '=', $userid)->get();

        DB::beginTransaction();
        try {


            foreach($data as $data)
            {
                $order = new Order();
                $order->name=$data->name;
                $order->email=$data->email;
                $order->phone=$data->phone;
                $order->address=$data->address;
                $order->user_id=$data->user_id;


                $order->product_title=$data->product_title;
                $order->price=$data->price;
                $order->quantity=$data->quantity;
                $order->image=$data->image;
                $order->product_id=$data->product_id;

                $order->delivery_status='processing';
                $order->payment_status='cash on delivery';

                $order->save();

                $product = Product::where('id', $data->product_id)->first();
                if (!$product) {
                    DB::rollBack();
                    $message='Oops!, Something went wrong. If the problem insists please contact the management';
                    alert()->success('error', $message);
                    return redirect()->back()->with('error', $message);
                }
                $newQty = ($product->quantity - $data->quantity);
                Product::where('id', $product->id)
                ->update([
                    'quantity' => $newQty
                ]);

                $cart_id=$data->id;

                $cart_id=cart::find($cart_id);

                $cart_id->delete();


            }

            DB::commit();

            $message='you have ordered successfully, please pay for the admin to issue the products';
            alert()->success('success', $message);
            return redirect()->back()->with('success', $message);
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->success('error', $th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
            //throw $th;
        }




    }

    public function stripe($totalprice)
    {
        if(Auth::id())
        {
            $carts=Cart::all()->count();
            return view('shop.stripe', compact('totalprice', 'carts'));
        }
        else
        {
            return view('auth.login');
        }
    }

    public function stripePost(Request $request, $totalprice)
    {

        dd($totalprice);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment to denno site."
        ]);

        $user=Auth::user();
        $userid=$user->id;
        $data=Cart::where('user_id', '=', $userid)->get();
        foreach($data as $data)
        {
            $order = new Order();
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;


            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->product_id;

            $order->delivery_status='Paid';
            $order->payment_status='processing';

            $order->save();

            $cart_id=$data->id;

            $cart_id=cart::find($cart_id);

            $cart_id->delete();


        }

        $message='Order payment using card was successfully, let us process the receipt and issue the products out.';
        alert()->success('success', $message);
        return redirect()->back()->with('success', $message);
        // toast()->success('success', 'Payment successful!');

        // return back();
    }

    public function contact()
    {
        $carts=Cart::all()->count();
        return view('shop.contact', compact('carts'));
    }

    public function show_orders()
    {
        if(Auth::id())
        {
            $carts=Cart::all()->count();
            $user=Auth::user();
            $userid=$user->id;

            $orders=Order::where('user_id','=', $userid)->get();
            return view('shop.orders', compact('carts','orders'));
        }
        else
        {
            return view('auth.login');
        }
    }
    public function cancel_orders(Request $request)
    {
        $orders = Order::find($request->id);

        $orders->delivery_status='canceled';
        $orders->payment_status='refunded';
        $orders->save();
        $message='order canceled successfully';
        alert()->success('success', $message)->persistent();
        return redirect()->back()->with('success', $message);
        //$request=Store::where($request->id)->delete();
    }
}
