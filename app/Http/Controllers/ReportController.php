<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
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
            ->get();

        $data = [
            'orders' => $orders
        ];

        return view('report.index', $data);
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

        $pdf = PDF::loadView('report.pdf.order', $data);

        return $pdf->stream('user.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
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
        //
    }
}
