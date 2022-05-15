<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function display()
    {
        $data = Booking::all();
        return $data;
    }
}
