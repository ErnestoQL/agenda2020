<?php

namespace App\Http\Controllers;

use App\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ContactosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuarioLogueado = Auth::user()->id;
        $contactos = Contacto::where('id_user', '=', $usuarioLogueado)->get();
        return view('contactos', compact('contactos'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $id_usuario = Auth::user()->id;

        $contacto = new Contacto;
        $contacto->nombre = $request->nombre;
        $contacto->apellido = $request->apellido;
        $contacto->direccion = $request->direccion;
        $contacto->apodo = $request->apodo;
        $contacto->url = $request->web;
        $contacto->telefono = $request->telefono;
        $contacto->cumpleaños=$request->cumpleaños;
        $contacto->id_user =Auth::user()->id;


        $foto = $request->file('file');
        $nombreFoto = $request->file->getClientOriginalName();
        $ruta = $id_usuario . "/". $request->telefono. "/". $nombreFoto;
        $contacto->foto = $ruta;
        Storage::putFileAs($id_usuario. "/". $request->telefono, $foto, $nombreFoto);
        $contacto->save();

        return redirect()->route('contactos');
    }

    public function show(Contacto $contacto)
    {
        //
    }

    public function edit(Contacto $contacto, $id)
    {

        $contacto = Contacto::find($id);

        return view('edit', compact('contacto'));
    }

    public function update(Request $request, Contacto $contacto, $id)
    {

        $contacto = Contacto::find($id);
        $contacto->nombre = $request->nombre;
        $contacto->apellido = $request->apellido;
        $contacto->cumpleaños = $request->cumpleaños;
        $contacto->telefono = $request->telefono;
        $contacto->direccion = $request->direccion;

        $contacto->save();

        return redirect()->route('contactos');
    }

    public function destroy(Contacto $contacto, $id)
    {
        $contacto = Contacto::destroy($id);
        return redirect()->route('contactos');
    }

    public function search(Request $request){

        $query=trim($request->get('s'));
        $id = Auth::user()->id;
        $contactos = DB::table('contacto')
            ->orWhere('contacto.direccion', 'LIKE', '%'.$query.'%')
            ->orWhere('contacto.nombre', 'LIKE', '%'.$query.'%')
            ->get();

        return view('search', compact('contactos', 'query'));
    }

    public function info(){
        return view('info');
    }
}
