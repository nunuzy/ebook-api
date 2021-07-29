<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function me()
    {
        return 
        [
            "NIS" => 3103119035,
            "Nama" => 'Aulia Nukhi Fadillah',
            "Gender" => 'Perempuan',
            "Phone" => 6281225122748,
            "Class" => 'XII RPL 2'

        ];
    }  
}
