<?php

namespace App\Http\Controllers;

use App\Mail\CloudHostingProduct;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

class HomeController extends Controller
{
    // public function mail() {

    // Mail::to('ahmedmolotfycrpyto@gmail.com')->send(new CloudHostingProduct());

    // return 'Email sent Successfully';

    // }

    public function mailAPI(Request $request) {
        $email = $request->name;
        Mail::to($request->name)->send(new CloudHostingProduct($email));

        return [
            'msg' => 'Email sent Successfully'
        ];

        }
}
