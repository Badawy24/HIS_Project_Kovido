<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class docProfileController extends Controller
{
    public function docProfile() {
        return view('doc_profile');
    }
}
