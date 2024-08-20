<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CurrController extends Controller
{
    public function index()
    {
        echo "Hello World";
    }

    public function create() {
        return view('curriculo.create');
    }

}

