<?php

namespace App\Http\Controllers;

use App\Camera;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::paginate(5);
        $keyword = $request->get('id');
        if ($keyword) {
            $orders = Order::where("id", "LIKE", "%$keyword%")->paginate(5);
        }
        return view('order.index', compact('orders'));
    }
    public function menampilkanSemuaOrder()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        $orders = Order::where("user_id", "=", $user->id)->paginate(10);

//        return $orders[1]->cameras[0]->name;
        return view('orderdetails',compact('user','orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $a = $request->get('stockminus');
        $camera = Camera::findOrFail($request['camera_id']);
        $stock = ($camera->stock - $a);
        $datas = $request->all();
        if (Auth::user()) {
            $datas['user_id'] = Auth::user()->id;
        } else {
            $datas['user_id'] = null;
        }
        $datas['status'] = "process";
        $orders = Order::create($datas);
        $orders->cameras()->attach($request['camera_id']);
        $camera->update(['stock' => $stock]);
        return redirect(route('depan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $datas = $request->all();
        $order->update($datas);
        return redirect(route('order.edit', compact('id')))->with('status', 'Order Successfully Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
