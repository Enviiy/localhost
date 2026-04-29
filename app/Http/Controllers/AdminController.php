<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends controller
{
    public function admin()
    {
        if(Auth::user()->role_id==2){
            $bookings = DB::table('bookings')
            ->join('time_slots', 'bookings.time_slot_id', '=', 'time_slots.id')
            ->leftJoin('statuses', 'bookings.id_status', '=', 'statuses.id')
            ->select(
                'bookings.*',
                'time_slots.slot_time',
                'statuses.name as status_name',
            )
            ->get();
            $statuses = DB::table('statuses')->get();
            $products = DB::table('products')->get();
            $tables = DB::table('tables')->get();
            $table_availability = DB::table('table_availability')->get();
            $time_slots = DB::table('time_slots')->get();
            $users = DB::table('users')->get();
            return view('admin', compact('bookings','products','tables','table_availability','time_slots','users', 'statuses',));
        }
        else{
            return redirect('/');
        }
    }
    public function addProduct(Request $request)
    {
        $path = $request->file('image')->store('assets/img', 'public');
        $request->file('image')->move(public_path('assets/img/'), $path);

        DB::table('products')->insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'image'=>$path,
        ]);
        return redirect()->back()->with('messageAddProduct', 'Товар успешно добавлен');
    }
    public function deleteProduct(Request $request)
    {
        DB::table('products')->where('id', '=', $request->id_products)->delete();
        return redirect()->back()->with('messagedeleteProduct', 'Продукт успешно удален');
    }

    public function EditUserView($id)
    {
        $users = DB::table('users')->where('id', '=', $id)->first();
        return view('EditUserView', compact('users'));
    }

    public function EditUser($id, Request $request){
        DB::table('users')->where('id', '=', $id)->update([
            'name'=>$request->name,
            'surname'=>$request->surname,
            'phone'=>$request->phone,
            'email'=>$request->email,
        ]);
        return redirect()->back()->with('messageEditUser', 'Пользователь успешно изменен');
    }

    public function DeleteUser($id)
    {
        if (Auth::id() == $id) {
            return redirect()->back()->with('messageDeleteUser', 'Нельзя удалить самого себя');
        }

        DB::table('users')->where('id', $id)->delete();

        return redirect()->back()->with('messageDeleteUser', 'Пользователь успешно удалён');
    }

    public function EditBookingView($id)
    {
        $booking = DB::table('bookings')
            ->join('tables', 'bookings.table_id', '=', 'tables.id')
            ->join('time_slots', 'bookings.time_slot_id', '=', 'time_slots.id')
            ->leftJoin('statuses', 'bookings.id_status', '=', 'statuses.id')
            ->select(
                'bookings.*',
                'tables.table_number',
                'tables.id as table_id',
                'time_slots.slot_time',
                'time_slots.id as time_slot_id',
                'statuses.name as status_name'
            )
            ->where('bookings.id', $id)
            ->first();

        $tables = DB::table('tables')->get();

        $time_slots = DB::table('time_slots')->get();

        $statuses = DB::table('statuses')->get();


        if (!$booking) {
            return redirect()->route('admin')->with('error', 'Бронирование не найдено');
        }

        return view('EditBookingView', compact('booking', 'tables', 'time_slots', 'statuses'));
    }

    public function EditBooking(Request $request, $id)
    {

        DB::table('bookings')->where('id', $id)->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'guests' => $request->guests,
            'table_id' => $request->table_id,
            'booking_date' => $request->booking_date,
            'time_slot_id' => $request->time_slot_id,
            'id_status' => $request->id_status,
            'updated_at' => now(),
        ]);

        return redirect()->route('admin')->with('success', 'Бронирование успешно обновлено');
    }

    public function DeleteBooking($id)
    {
        DB::table('bookings')->where('id', $id)->delete();

        return redirect()->back()->with('messageDeleteBooking', 'Бронь успешно удалена');
    }

    public function EditProductView($id)
    {
        $products = DB::table('products')->where('id', '=', $id)->first();
        return view('EditProductView', compact('products'));
    }

    public function EditProduct($id, Request $request)
    {
        DB::table('products')->where('id','=',$id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        if(isset($request->image)){
            $img = $request->file('image');
            $typeImg = $img->extension();

            $uniqName = Str::random();
            $nameImg = $uniqName.'.'.$typeImg;
            $pathFolder = 'assets/img/';

            $img->move(public_path($pathFolder), $nameImg);

            DB::table('products')->where('id', '=', $id)->update([
                'image'=>$pathFolder . $nameImg
            ]);
        }
        return redirect()->back()->with('messageEditProduct', 'Товар успешно обновлен');
    }
}
