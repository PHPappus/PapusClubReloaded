<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Http\Controllers\Controller;

class PublicoController extends Controller
{
    public function index()
    {
        return view('publico.inicio-al-publico');
    }
}
