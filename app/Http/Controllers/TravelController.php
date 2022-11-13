<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTravelRequest;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->filter;
        $travels = Travel::when($filter == "available", function ($q) use ($filter) {
            return $q->where('start_date', '>', date('Y-m-d'));
        })
            ->when($filter == "closed", function ($q) use ($filter) {
                return $q->where('start_date', '<', date('Y-m-d'));
            })
            ->get();

        $data = [
            'travels' => $travels
        ];

        return view('travel.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\StoreTravelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTravelRequest $request)
    {
        $validated = $request->validated();

        //Remove unnecessary string from price
        $validated['price'] = filter_var(str_replace(',00', '', $validated['price']), FILTER_SANITIZE_NUMBER_INT);

        //Upload travel image
        $path = $this->uploadTravelImage($request->file('img'));
        $validated['img'] = $path;

        $travel = Travel::create($validated);

        return redirect()->route('travel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function show(Travel $travel)
    {
        $orders = $travel->orders()->get();

        $data = [
            'travel' => $travel,
            'orders' => $orders
        ];

        return view('travel.show', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Travel $travel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Travel $travel)
    {
        //
    }

    function uploadTravelImage($file)
    {
        return Storage::putFile(
            'images/travel',
            $file
        );
    }
}
