<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTravelRequest;
use App\Http\Requests\UpdateTravelRequest;
use App\Models\Order;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            ->latest()->get();

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

        //Upload travel image
        $validated['img'] = $this->uploadTravelImage($request->file('img'));

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
        $orders = $travel->orders()->with(['user', 'travel'])->get();

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
    public function update(UpdateTravelRequest $request, Travel $travel)
    {
        $validated = $request->validated();

        //Upload travel image
        if (isset($validated['img'])) {
            $validated['img'] = $this->uploadTravelImage($request->file('img'));
        }

        $travel->update($validated);


        return redirect()->back()->with('success', 'Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Travel $travel)
    {
        $travel->delete();
        return redirect()->back()->with('success', 'Berhasil');
    }

    public function list(Request $request)
    {
        $filter = $request->filter ?? 'date';
        $travels = Travel::where('start_date', '>', today())
            ->when($filter == 'price', function ($q) {
                return $q->orderBy('price');
            })
            ->when($filter == 'price-desc', function ($q) {
                return $q->orderByDesc('price');
            })
            ->latest()
            ->paginate(9);

        $data = [
            'travels' => $travels,
            'filter' => $filter,
        ];

        return view('main.pages.travel-list', $data);
    }

    public function details(Travel $travel)
    {
        $isOrdered = optional(Auth::user())->isOrdered($travel->id);
        $order = $isOrdered ? $travel->orders()->where('user_id', Auth::id())->first() : null;
        $reviews = $travel->orders()->where('is_accepted', 1)->get()->filter(function($i) {
            return $i->testimoni;
        });

        $data = [
            'travel' => $travel,
            'reviews' => $reviews,
            'isOrdered' => $isOrdered,
            'order' => $order
        ];
        // return  $data;

        return view('main.pages.travel-details', $data);
    }

    private function uploadTravelImage($file)
    {
        $path = Storage::putFile(
            'public/images/travel',
            $file
        );
        $path = str_replace('public', '', $path);
        return "storage{$path}";
    }
}
