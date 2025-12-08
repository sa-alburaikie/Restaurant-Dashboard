<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chef;
use App\Models\Food;
use App\Models\Order;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $food = Food::all();
        $chefs = Chef::all();
        if(Auth::id()){
            return redirect('redirects');
        }
        return view('home', compact('food', 'chefs'));
    }

    public function redirects()
    {
        $food = Food::all();
        $chefs = Chef::all();
        $userType = Auth::user()->user_type;

        if ($userType == '1') {
            return view('admin.adminhome');
        } else {
            $user_id = Auth::id();
            $count = Cart::where('user_id', $user_id)->count();
            return view('home', compact('food', 'chefs', 'count'));
        }
    }

    public function makeReservation(Request $request)
    {
        $reservation = new reservation;
        $reservation->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'guest' => $request->guest,
            'date' => $request->date,
            'time' => $request->time,
            'message' => $request->message,
        ]);
        return redirect()->back();
    }

    public function addToCart(Request $request, $id)
    {
        if (Auth::id()) {
            $user_id = Auth::id();
            $foodId = $id;
            $quantity = $request->quantity;
            Cart::create([
                'user_id' => $user_id,
                'food_id' => $foodId,
                'quantity' => $quantity,
            ]);
            return redirect()->back();
        } else
            return redirect('/login');
    }

    public function showCart($id)
    {
        $items = Cart::where('user_id', $id)
            ->join('food', 'carts.food_id', '=', 'food.id')
            ->select(
                'carts.id as cart_id',
                'carts.user_id',
                'carts.food_id',
                'carts.quantity',
                'food.title',
                'food.price',
                'food.image'
            ) ->get();
        $count = Cart::where('user_id', $id)->count();
        return view('showcart', compact('count', 'items'));
    }

    public function removeFromCart($id)
    {
        $item = Cart::find($id);
        $item->delete();
        return redirect()->back();
    }

    public function confirmOrder(Request $request){
        foreach($request -> food_name as $key => $food_name){
            $item = Order::create([
                'food_name' => $food_name,
                'price' => $request -> price[$key],
                'quantity' => $request -> quantity[$key],
                'name' => $request -> name,
                'phone' => $request -> phone,
                'address' => $request -> address,
                'image' => $request -> image[$key],
            ]);
        }
        return redirect()->back();
    }
}
