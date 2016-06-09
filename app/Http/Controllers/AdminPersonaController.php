<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Http\Controllers\Controller;

class AdminPersonaController extends Controller
{
    public function index()
    {
        return view('admin-persona.inicio-al-admin-persona');
    }
}
