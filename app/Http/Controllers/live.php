<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class live extends Controller
{
    public function livePreview() {
        return view('livepreview');
    }
}
