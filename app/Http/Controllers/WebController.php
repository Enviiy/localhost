<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WebController extends controller
{
    public function home()
    {
        $user = Auth::user();
        $tables = DB::table('tables')->get();
        $time_slots = DB::table('time_slots')->get();
        return view('home', compact('tables', 'time_slots', 'user'));
    }

    public function store(Request $request)
    {
        $userId = Auth::check() ? Auth::id() : null;

        DB::table('bookings')->insert([
            'user_id' => $userId,
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'guests' => $request->guests,
            'table_id' => $request->table_number,
            'booking_date' => $request->booking_date,
            'time_slot_id' => $request->booking_time,
            'created_at' => now(),
        ]);

        return redirect('/')->with('success', 'Столик забронирован!');
    }

    public function menu()
    {
        $products = DB::table('products')->get();

        return view('menu', compact('products'));
    }

    public function about()
    {
        return view('about');
    }
    public function profile()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        $bookings = DB::table('bookings')
        ->join('tables', 'bookings.table_id', '=', 'tables.id')
        ->join('time_slots', 'bookings.time_slot_id', '=', 'time_slots.id')
        ->leftJoin('statuses', 'bookings.id_status', '=', 'statuses.id')
        ->select(
            'bookings.*',
            'tables.table_number',
            'time_slots.slot_time',
            'statuses.name as status_name',
        )
        ->where('bookings.user_id', $user->id)
        ->get();
        return view('profile', compact('user', 'bookings'));
    }
}
