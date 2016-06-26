<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;

class FrontController extends Controller
{
	public function home() {
		return view('inicio');
	}
    public function futbol() {
    	return view('publico.futbol');
    }
    public function historia_papusclub() {
    	return view('publico.historia-papusclub');
    }
    public function historia_papusclub_ver_mas(){
    	return view('publico.historia-papusclub-ver-mas');
    }
    public function historia_sede_callao() {
    	return view('publico.historia-sede-callao');
    }
    public function reserva_bungalow(){
    	return view('reserva-bungalow');
    }
    public function reserva_bungalow_busqueda(){
    	return view('reserva-bungalow-busqueda');
    }
    public function registrar_concesionaria_al(){
        return view('registrar-concesionaria-al');
    }
    public function registrar_precio_pref_bungalows_al(){
        return view('registrar-precio-pref-bungalows-al');
    }
    public function registrar_nuevo_producto_al(){
        return view('registrar-nuevo-producto-al');
    }
    public function registrar_precio_especial_membresia_al(){
        return view('registrar-precio-especial-membresia-al');
    }
    public function registrar_precio_pref_bungalows_1_al(){
        return view('registrar-precio-pref-bungalows-1-al');
    }
    public function registrar_precio_especial_membresia_1_al(){
        return view('registrar-precio-especial-membresia-1-al');
    }
     public function mesa_directiva(){
        return view('publico.mesa-directiva');
    }
     public function reglamento_club(){
        return view('publico.reglamento-club');
    }
    public function historia_sede_surquillo() {
        return view('publico.historia-sede-surquillo');
    }
    public function historia_sede_barranco() {
        return view('publico.historia-sede-barranco');
    }
    public function natacion() {
        return view('publico.natacion');
    }
    public function karate() {
        return view('publico.karate');
    }
    public function convenios() {
        return view('publico.convenios');
    }
    public function concesiones() {
        return view('publico.concesiones');
    }
    public function galeria() {
        return view('publico.galeria');
    }
    public function informes() {
        return view('publico.informes');
    }
    public function calendario() {
        return view('publico.calendario');
    }
    public function servicios() {
        return view('publico.servicios');
    }
    public function yoga() {
        return view('publico.yoga');
    }
    public function padre() {
        return view('publico.padre');
    }
    public function amigos() {
        return view('publico.amigos');
    }
}
