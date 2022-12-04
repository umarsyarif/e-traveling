<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Travel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $acceptedDateStart = $request->acceptedDateStart;
        $acceptedDateEnd = $request->acceptedDateEnd;

        $createdDateStart = $request->createdDateStart;
        $createdDateEnd = $request->createdDateEnd;

        $orders = Order::when($acceptedDateStart != null, function ($q) use ($acceptedDateStart) {
            return $q->where('accepted_at', '>=', $acceptedDateStart . ' 00:00:00');
        })
            ->when($acceptedDateEnd != null, function ($q) use ($acceptedDateEnd) {
                return $q->where('accepted_at', '<=', $acceptedDateEnd . ' 23:59:59');
            })
            ->when($createdDateStart != null, function ($q) use ($createdDateStart) {
                return $q->where('created_at', '>=', $createdDateStart . ' 00:00:00');
            })
            ->when($createdDateEnd != null, function ($q) use ($createdDateEnd) {
                return $q->where('created_at', '<=', $createdDateEnd . ' 23:59:59');
            })
            ->with('travel', 'user')
            ->latest()
            ->get();

        $data = [
            'orders' => $orders
        ];

        return view('order.index', $data);
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

    public function orderDetail(Order $order)
    {
        $data = [
            'order' => $order
        ];
        // return $data;
        return view('main.pages.order-detail', $data);
    }

    public function testimonialUpdate(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $order->update($request->only('testimoni'));
        return redirect()->back()->with('success', 'Testimoni berhasil disimpan. Terimakasih!');
    }

    public function orderPDF(Request $request)
    {

        $acceptedDateStart = $request->acceptedDateStart;
        $acceptedDateEnd = $request->acceptedDateEnd;

        $createdDateStart = $request->createdDateStart;
        $createdDateEnd = $request->createdDateEnd;

        $orders = Order::when($acceptedDateStart != null, function ($q) use ($acceptedDateStart) {
            return $q->where('accepted_at', '>=', $acceptedDateStart . ' 00:00:00');
        })
            ->when($acceptedDateEnd != null, function ($q) use ($acceptedDateEnd) {
                return $q->where('accepted_at', '<=', $acceptedDateEnd . ' 23:59:59');
            })
            ->when($createdDateStart != null, function ($q) use ($createdDateStart) {
                return $q->where('created_at', '>=', $createdDateStart . ' 00:00:00');
            })
            ->when($createdDateEnd != null, function ($q) use ($createdDateEnd) {
                return $q->where('created_at', '<=', $createdDateEnd . ' 23:59:59');
            })
            ->with('travel', 'user')
            ->get();

        $data = [
            'orders' => $orders
        ];

        $pdf = PDF::loadView('order.pdf.order', $data);

        return $pdf->stream("Laporan {$createdDateStart} - {$createdDateEnd}.pdf");
    }
}
