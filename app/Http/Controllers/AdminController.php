<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use App\Notifications\SendEmailNotification;
use Barryvdh\DomPDF\Facade\Pdf;
// use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function view_category()
    {
        if(Auth::id())
        {
            $category = Category::all();
            return view('admin.category', compact('category'));
        }
        else
        {
            return view('auth.login');
        }
    }

    public function Category(Request $request)
    {
        $category = new Category();

        $category->category_name=$request->category_name;
        $category->save();

        $message='category added successfully';

        toast()->success('success', $message);
        return redirect()->back()->with('success', $message);
    }

    //  public function CategoryUpdate(Request $request)
    // {

    //     $category = Category::find($request->id);
    //     if(!$category){
    //         $message = 'product upload failure';
    //         return back()->with('Error', $message);
    //     }
    //     $category ->update($request->all());

    //     $message = 'product updated successfully';
    //     alert()->success('Success',$message)->persistent();
    //     //FacadesAlert::alert('success', $message)->persistent();//so wako wrong kwa iyo do
    //     return back()->with('success', $message);
    // }


    public function CategoryUpdate(Request $request)
    {
        $category = Category::find($request->id);
        if(!$category){
            $message = 'product upload failure';
            return back()->with('Error', $message);
        }
        $category ->update($request->all());

        $message = 'category updated successfully';
        alert()->success('Success',$message)->persistent();
        return back()->with('success', $message);
    }

    /**
     * Function to delete a  user
      */
    public function DestroyCategory(Request $request)
    {
        $category = Category::find($request->id);
        if(!$category){
            return back()->with('Error!!!', 'category not found');

        }
        $category ->delete();
        $message='category deleted successfully';
        alert()->success('success', $message)->persistent();
        return back()->with('success', $message);
        //$request=Store::where($request->id)->delete();
    }

    // Product controller area

    public function view_products()
    {
        if(Auth::id())
        {
            $products = Product::all();
            $category = Category::all();
            $orders=Order::all();
            return view('admin.products', compact('products', 'category', 'orders'));
        }
        else
        {
            return view('auth.login');
        }
    }

    public function products(Request $request)
    {
        $products = new Product();

        $products->title=$request->title;
        $products->description=$request->description;
        $products->category=$request->category;
        $products->quantity=$request->quantity;
        $products->price=$request->price;
        $products->discount_price=$request->discount_price;

        $image=$request->image;
        $imagename=time().'.'. $image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $products->image=$imagename;

        $products->save();
        $message='product added successfully';

        toast()->success('success', $message)->persistent();
        return redirect()->back()->with('success', $message);
    }

    public function orders()
    {
        if(Auth::id())
        {
            $orders = Order::all();
            return view('admin.orders', compact('orders'));
        }
        else
        {
            return view('auth.login');
        }
    }
    public function pending_orders()
    {
        if(Auth::id())
        {
            $orders = Order::where('payment_status', '=', 'cash on delivery')->get();
            return view('admin.order_pending', compact('orders'));
        }
        else
        {
            return view('auth.login');
        }
    }
    public function confirmed_orders()
    {
        if(Auth::id())
        {
            $usertype=Auth::user()->usertype;

        if($usertype=='1')
        {
            // $orders = Order::where('delivery_status','=', 'processing')->get();
            $orders = DB::table('orders')->where('payment_status', '=', 'confirmed')->get();
            return view('admin.order_confirmed', compact('orders'));
        }
        else
        {
            $carts=Cart::all()->count();
            return view('404', compact('carts'));
        }
        }

        else
        {
            return view('auth.login');
        }
    }

    public function Orders_confirming()
    {
        if(Auth::id())
        {

            $usertype=Auth::user()->usertype;

            if($usertype=='1')
            {
                $orders=Order::all();
                return view('admin.confirm', compact('orders'));
            }
            else
            {
                return view('/');
            }
        }
        else
        {
            return view('auth.login');
        }
    }
    public function disputed_orders()
    {

        $orders = Order::where('payment_status', '=', 'disputed')->get();
        return view('admin.disputed_orders');
    }

    public function delete_orders(Request $request)
    {
        $orders = Order::find($request->id);
        if(!$orders){
            return back()->with('Error!!!', 'category not found');

        }
        $orders ->delete();
        $message='order declined successfully';
        alert()->success('success', $message)->persistent();
        return back()->with('success', $message);
        //$request=Store::where($request->id)->delete();
    }

    public function decline_orders()
    {
        if(Auth::id())
        {
            $orders=Order::where('payment_status', '=', 'cash on delivery')->get();
            return view('admin.decline_orders', compact('orders'));
        }
        else
        {
            return view('auth.login');
        }
    }
    public function confirm_orders(Request $request)
    {
        $orders=Order::find($request->id);
        $orders->payment_status="confirmed";
        $orders->save();

        $message='order confirmed successfully';
        toast()->success('success', $message);
        return redirect()->back()->with('success', $message);
    }

    public function delivery_status()
    {
        if(Auth::id())
        {
            $orders=Order::where('delivery_status', '=', 'processing')->get();

            return view('admin.order_delivered', compact('orders'));
        }
        else
        {
            return view('auth.login');
        }
    }
    public function delivered_orders(Request $request)
    {
        $orders=Order::find($request->id);
        $orders->delivery_status="delivered";
        $orders->save();

        $message='order marked as delivered successfully';
        toast()->success('success', $message);
        return redirect()->back()->with('success', $message);
    }
    public function all_delivered()
    {
        if(Auth::id())
        {
            $orders=Order::where('delivery_status', '=', 'delivered')->get();

            return view('admin.delivered', compact('orders'));
        }
        else
        {
            return view('auth.login');
        }
    }

    public function print_receipts(Request $request)
    {
        // dd($request->id);
       $orders=Order::find($request->id);
    //    $orders=Order::where('user_id', $order->user_id)->get();
    //    dd($orders);
       $user=Auth::user();
       $pdf = Pdf::loadView('admin.receipts', [
        'orders' => $orders,
        'user' => $user,
       ]);
    //    ->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('receipt.pdf', array("Attachment" => false));
    //    return view('admin.receipts', compact('orders', 'user'));
    }

    // public function Getting_Receipt()
    // {
    //     $data=DomPDFPDF::loadView('hello');
    // }


    public function send_email(Request $req)
    {
        $orders=Order::find($req->id);
        $detail=[
            'greeting' => $req->greeting,
            'firstline' => $req->firstline,
            'body' => $req->body,
            'button' => $req->button,
            'url' => $req->url,
            'lastline' => $req->lastline,
        ];
        Notification::Send($orders, new SendEmailNotification($detail));

        $message='email sent successfully';
        toast()->success('success', $message);
        return redirect()->back()->with('success', 'email sent successfully');
    }

    public function sending_emails(Request $req)
    {
        if(Auth::id())
        {
            $orders=Order::find($req->id);
            return view('admin.email_info', compact('orders'));
        }
        else
        {
            return view('auth.login');
        }
    }
}
