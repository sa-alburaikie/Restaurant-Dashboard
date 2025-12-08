<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Food;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getUsers()
    {
        $users = User::get();
        return view('admin.users', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user)
            $user->delete();
        return redirect()->back();
    }

    public function foodMenu()
    {
        $foods = Food::get();
        return view('admin.foodmenu', compact('foods'));
    }

    public function addFood(Request $request)
    {
        $food = new food;
        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('foodimage', $imageName);
        $food->image = $imageName;
        $food->title = $request->title;
        $food->price = $request->price;
        $food->description = $request->description;
        $food->save();
        return redirect()->back();
    }

    public function deleteMenu($id)
    {
        $food = Food::find($id);
        if ($food) {
            $food->delete();
        }
        return redirect()->back();
    }

    public function updateMenu($id)
    {
        $food = Food::find($id);
        return view('admin.updateview', compact('food'));
    }

    public function update(Request $request, $id)
    {
        $food = Food::find($id);
        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('foodimage', $imageName);
        $food->image = $imageName;
        $food->title = $request->title;
        $food->price = $request->price;
        $food->description = $request->description;
        $food->save();
        return redirect()->back();
    }

    public function viewReservation()
    {
        $reservations = Reservation::all();
        return view('admin.adminreservation', compact('reservations'));
    }

    public function viewChefs()
    {
        $chefs = Chef::all();
        return view('admin.adminchef', compact('chefs'));
    }

    public function addChef(Request $request)
    {
        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('chefimage', $imageName);
        Chef::create([
            'name' => $request->name,
            'speciality' => $request->speciality,
            'image' => $imageName,
        ]);
        return redirect()->back();
    }

    public function removeChef($id)
    {
        $chef = Chef::find($id);
        if ($chef)
            $chef->delete();
        return redirect()->back();
    }

    public function updateChef($id)
    {
        $chef = Chef::find($id);
        return view('admin.updatechef', compact('chef'));
    }

    public function updateChefInfo(Request $request, $id)
    {
        $chef = Chef::find($id);
        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('chefimage', $imageName);
        $chef->update([
            'name' => $request->name,
            'speciality' => $request->speciality,
            'image' => $imageName,
        ]);
        return redirect()->route('viewChefs');
    }

    public function showOrders()
    {
        $orders = Order::all();
        return view('admin.orders', compact('orders'));
    }

    public function searchOrders(Request $request)
    {
        $search = $request->search;
        $orders = Order::where('name', 'Like', '%' . $search . '%')->orWhere('food_name', 'Like', '%' . $search . '%')->get();
        return view('admin.orders', compact('orders'));
    }

}
