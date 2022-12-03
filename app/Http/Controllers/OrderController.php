<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $travel_id = $request->travel_id;
        Auth::user()->orders()->create([
            'travel_id' => $travel_id
        ]);

        return redirect()->route('travel.details', ['travel' => $travel_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->update($request->only(['is_accepted', 'testimoni']));
        return redirect()->back()->with('success', 'Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function history()
    {
        $orders = Order::where('user_id', Auth::id())->with('travel')->get();
        $data = [
            'orders' => $orders,
        ];
        return view('main.pages.order-history', $data);
    }

    public function testimonialUpdate(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $order->update($request->only('testimoni'));
        return redirect()->back()->with('success', 'Testimoni berhasil disimpan. Terimakasih!');
    }
}
