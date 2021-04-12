<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use App\Models\Candidato;
use Illuminate\Http\Request;
use App\Notifications\NuevoCandidato;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //obtenemos el id actual
        $id_vacante = $request->route('id');

        //obtener los candidatos y la vacante
        $vacante = Vacante::findOrFail($id_vacante);

        $this->authorize('view', $vacante); //por el policy

        return view('candidatos.index', compact('vacante'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion
        $data = $request->validate([

            'nombre' => 'required',
            'email' => 'required|email',
            'cv' => 'required|mimes:pdf|max:1000',
            'vacante_id' => 'required'
        ]);

        //Para almacenar archivo pdf
        if($request->file('cv'))
        {
            $archivo = $request->file('cv');
            $nombreArchivo = time() . "." . $request->file('cv')->extension(); //generando el nombre unico
            $ubicacion = public_path('/storage/cv'); //ubicacion donde estaran
            $archivo->move($ubicacion, $nombreArchivo); //para mover el archivo a la ubicacion

        }

        //forma principal para almacenar en la base de datos y la mas segura
        //debemos hacer la relacion de candidato en el modelo de vacante
        $vacante = Vacante::find($data['vacante_id']);

        //recibimos la nueva vacante
        $vacante->candidatos()->create([

            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'cv' => $nombreArchivo
        ]);

        //se le envia una notificacion al reclutador
        $reclutador = $vacante->reclutador;
        $reclutador->notify( new NuevoCandidato( $vacante->titulo, $vacante->id) );

        //el usuario recibe el mensaje
        return back()->with('estado', '¡Solicitud enviada correctamente! ¡Mucho exito!');
        //con back te lleva a la pagina anterior y los with son los mensajes agregados aparte
        //luego vamos al app.blade y integramos el mensaje con un if comenzando el body


        //2da forma de pasar a la base de datos el formulario
        // $candidato = new Candidato();
        // $candidato->nombre = $data['nombre'];
        // $candidato->email = $data['email'];
        // $candidato->vacante_id = $data['vacante_id'];
        // $candidato->cv = "123.pdf";

        // $candidato->save();


        //3era forma de pasar a la base de datos el formulario
        // luego debemos ir al model Candidato.php y debemos colocar el protected fillable
        // $candidato = new Candidato($data);
        // $candidato->cv = "123.pdf";

        // $candidato->save();


        //4ta forma de pasar a la base de datos el formulario
        // $candidato = new Candidato();
        // $candidato->fill($data);
        // $candidato->cv = "123.pdf";

        // $candidato->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidato $candidato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidato $candidato)
    {
        //
    }
}
