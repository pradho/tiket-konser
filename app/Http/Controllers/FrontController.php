<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    public function index()
    {
        $data = Concert::orderBy('id', 'desc')->get();
        return view('frontend.index', compact('data'));
    }

    public function booking($id)
    {
        $data = Concert::findorfail($id);
        return view('frontend.booking', compact('data'));
    }

    public function bookingStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'birthdate' => 'required',
        ]);

        $data = new Customer();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->birthdate = $request->birthdate;
        $data->save();

        $order = new Order();
        $order->id_customer = $data->id;
        $order->id_concert = $request->id_concert;
        $order->status = 'booking';
        $order->save();


        $data->save();
        return redirect(route('front.booking.payment', ['id' => $order->id]))->with('message', 'Sukses. Silahkan lakukan pembayaran.');
    }

    public function payment($id)
    {
        $data = Order::with('customer','concert')->findorfail($id);
        return view('frontend.payment', compact('data'));
    }

    public function paymentStore(Request $request)
    {
        $data = new Ticket();
        $data->ticket_code = Str::random(8);
        $data->id_customer = $request->id_customer;
        $data->id_concert = $request->id_concert;
        $data->status = 0;
        $data->save();

        return redirect(route('front.ticket', ['id' => $data->id]))->with('message', 'Simpan nomor tiket untuk melakukan check in.');;
    }

    public function ticketDetail($id)
    {
        $data = Ticket::findorfail($id);
        return view('frontend.ticket', compact('data'));
    }
}
