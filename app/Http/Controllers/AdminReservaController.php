<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Http\Controllers\Controller;

class AdminReservaController extends Controller
{
    public function index()
    {
        return view('admin-reserva.inicio-al-admin-reserva');
    }
}
