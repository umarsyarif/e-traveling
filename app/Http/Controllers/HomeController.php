<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Travel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $travels = Travel::where('start_date', '>', today())->limit(6)->get();
        $reviews = Order::select('user_id', 'testimoni')->whereNotNull('testimoni')->with('user')->get();
        $travelCount = Travel::count();

        $data = [
            'travels' => $travels,
            'travelCount' => $travelCount,
            'reviews' => $reviews
        ];
        return view('main.pages.index', $data);
    }

    public function dashboard()
    {
        $incomingTravels = Travel::where('start_date', '>', today())->limit(5)->get();

        $newOrders = Order::whereHas('travel', function ($q) {
            $q->where('start_date', '>', today());
        })->whereNull('accepted_at')->get();

        $statistic = [
            [
                'title' => 'Customer Terdaftar',
                'count' => User::where('role', 'customer')->count()
            ],
            [
                'title' => 'Destinasi Wisata',
                'count' => Travel::count()
            ],
            [
                'title' => 'Pesanan Selesai',
                'count' => Order::whereHas('travel', function ($q) {
                    $q->where('start_date', '<=', today());
                })->whereNotNull('accepted_at')->count()
            ],
            [
                'title' => 'Pesanan Baru',
                'count' => $newOrders->count()
            ],
        ];


        $data = [
            'statistic' => $statistic,
            'newOrders' => $newOrders,
            'incomingTravels' => $incomingTravels
        ];
        return view('admin.dashboard', $data);
    }
}
