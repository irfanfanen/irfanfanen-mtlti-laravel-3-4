<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Excavator;

class TrackingController extends Controller
{
    public function index() {
        $items = Excavator::all();

        return view('tracking.index', compact('items'));
    }
}