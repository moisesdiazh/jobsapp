<?php

namespace App\Http\Controllers;

use App\Models\Salario;
use App\Models\Vacante;
use App\Models\Categoria;
use App\Models\Ubicacion;
use App\Models\Experiencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacantes = Vacante::where('user_id', auth()->user()->id)->latest()->simplePaginate(3);

        return view('vacantes.index', compact('vacantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Consultas
        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();



        return view('vacantes.create')
            ->with('categorias', $categorias)
            ->with('experiencias', $experiencias)
            ->with('ubicaciones', $ubicaciones)
            ->with('salarios', $salarios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validacion
        $data = $request->validate([

            'titulo' => 'required|min:6',
            'categoria' => 'required',
            'experiencia' => 'required',
            'ubicacion' => 'required',
            'salario' => 'required',
            'descripcion' => 'required|min:50',
            'imagen' => 'required',
            'skills' => 'required'

        ]);

        //almacenar en la bd
        auth()->user()->vacantes()->create([

            'titulo' => $data['titulo'],
            'imagen' => $data['imagen'],
            'descripcion' => $data['descripcion'],
            'skills' => $data['skills'],
            'categoria_id' => $data['categoria'],
            'experiencia_id' => $data['experiencia'],
            'ubicacion_id' => $data['ubicacion'],
            'salario_id' => $data['salario']
        ]);

        return redirect()->action('VacanteController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {
        //
        return view('vacantes.show')->with('vacante', $vacante);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacante $vacante)
    {
        $this->authorize('view', $vacante); //por el policy

        //Consultas
        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();



        return view('vacantes.edit')
             ->with('categorias', $categorias)
             ->with('experiencias', $experiencias)
             ->with('ubicaciones', $ubicaciones)
             ->with('salarios', $salarios)
             ->with('vacante', $vacante);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacante $vacante)
    {
        $this->authorize('update', $vacante); //por el policy

        //Validacion, lo traemos de store
        $data = $request->validate([

            'titulo' => 'required|min:6',
            'categoria' => 'required',
            'experiencia' => 'required',
            'ubicacion' => 'required',
            'salario' => 'required',
            'descripcion' => 'required|min:50',
            'imagen' => 'required',
            'skills' => 'required'
        ]);

        $vacante->titulo = $data['titulo'];
        $vacante->skills = $data['skills'];
        $vacante->imagen = $data['imagen'];
        $vacante->descripcion = $data['descripcion'];
        $vacante->categoria_id = $data['categoria'];
        $vacante->experiencia_id = $data['experiencia'];
        $vacante->ubicacion_id = $data['ubicacion'];
        $vacante->salario_id = $data['salario'];

        $vacante->save();

        //redireccion

        return redirect()->action('VacanteController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacante $vacante, Request $request)
    {
        $this->authorize('delete', $vacante); //por el policy

        // return response()->json($vacante);
        // return response()->json($request);

        $vacante->delete();

        return response()->json(['mensaje' => 'Se eliminó la vacante ' . $vacante->titulo]);

    }

    //campos extras al crud


    public function imagen(Request $request) //parte de dropzone
    {
        //
        $imagen = $request->file('file');
        $nombreImagen = time() . '.' . $imagen->extension(); //para que no se pueda repetir el mismo archivo
        $imagen->move(public_path('storage/vacantes'), $nombreImagen);
        return response()->json(['correcto' => $nombreImagen]);
    }

    public function borrarimagen(Request $request) //borrar imagen con ajax
    {
        //primero validamos que es un request de ajax
        if ($request->ajax()) {

            $imagen = $request->get('imagen'); //buscamos las imagenes

            //luego verificamos mediante el metodo file que la imagen exista en esa carpeta
            if (File::exists('storage/vacantes' . $imagen)) {

                File::delete('storage/vacantes' . $imagen); //eliminamos la imagen luego de verificar
            }
            return response('Eliminada', 200);
        }
    }

    //CAMBIA EL ESTADO DE UNA VACANTE
    public function estado(Request $request, Vacante $vacante) //request es lo que envias al servidor
    {
        //Leer nuevo estado y asignarlo
        $vacante->activa = $request->estado;

        //guardarlo en la base de datos
        $vacante->save();

        return response()->json($vacante); //json comunicacion entre php y el javascript
    }

    public function buscar(Request $request)
    {

        //validacion
        $data = $request->validate([

            'categoria' => 'required',
            'ubicacion' => 'required'
        ]);

        //asignamos los valores

        $categoria = $data['categoria'];
        $ubicacion = $data['ubicacion'];

        $vacantes = Vacante::latest()
                    ->where('categoria_id', $categoria)
                    ->where('ubicacion_id', $ubicacion)
                    ->get();

        return view('buscar.index', compact('vacantes'));
    }

    public function resultados()
    {

    }
}
