<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Booking;
use App\Mail\BookingDone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function add_booking(Request $request)
    {
        $input = $request->all();
        $date = "{$input['booking_date']} {$input['booking_time']}";
        $date = Carbon::parse($date)->format('d/m/y H:i');
        $data = [
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone_no'] ?? '',
            'desc' => $input['desc'] ?? '',
            'booking_date' => $date
        ];
        $mail_data = [
            'name' => $data['name'],
            'date' => Carbon::parse($input['booking_date'])->format('d M, Y'),
            'time' => $input['booking_time']
        ];
        try {
            Booking::create($data);
            Mail::to($data['email'])->cc('hetarthshah9@gmail.com')->send(new BookingDone($mail_data));
            return response()->json([
                'status' => true,
                'message' => 'Your Booking is confirmed, please check your email.'
            ]);
        } catch (Exception $error) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong, Please try again.'
            ]);
        }
    }

    public function clear_booking()
    {
        dd(123);
        $data = Booking::all();
        foreach ($data as $value) {
            Booking::destroy($value['_id']);
        }
        return true;
    }
}
