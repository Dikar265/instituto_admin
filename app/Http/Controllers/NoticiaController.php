<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\User;
use App\Models\Etiqueta;
use App\Models\Carrera;
use Illuminate\Http\Request;
use App\Notifications\NoticiaNueva;
use App\Notifications\NoticiaLeer;
use Auth;

class NoticiaController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $noticias = Noticia::with('creadaPor')->with('deCarrera')->paginate(6);
      return view('backend.noticia.noticias', compact('noticias'));
   }

   public function blog()
   {
      $noticias = Noticia::with('creadaPor')->with('deCarrera')->paginate(6);
      return view('frontend.noticia.noticias', compact('noticias'));
   }

   public function conImagenesPage($page = 6)
   {
      $noticias = Noticia::conImagenes()->with('creadaPor')->paginate($page);
      return view('backend.noticia.noticias', ['noticias' => $noticias]);
   }

   public function porAutor($autor, $page = 6)
   {
      $autor = User::findOrFail($autor);
      $noticias = $autor->noticias()
         ->with('creadaPor')
         ->with('etiquetas')
         ->paginate($page);
      return view('backend.noticia.noticias', ['noticias' => $noticias]);
   }


   public function deCarrera($carrera, $page = 6)
   {
      $c = Carrera::findOrFail($carrera);
      $noticias = $c->noticias()
         ->with('deCarrera')
         ->with('creadaPor')
         ->with('etiquetas')
         ->paginate($page);
      return view('backend.noticia.noticias', ['noticias' => $noticias]);
   }


   public function porEtiqueta($etiqueta, $page = 6)
   {
      $e = Etiqueta::findOrFail($etiqueta);
      $oetiqueta = $e->noticias()->paginate($page);
      return view('backend.noticia.noticias', ['noticias' => $oetiqueta]);
   }

   public function porAutorBlog($autor, $page = 6)
   {
      $autor = User::findOrFail($autor);
      $noticias = $autor->noticias()
         ->with('creadaPor')
         ->with('etiquetas')
         ->paginate($page);
      return view('frontend.noticia.noticias', ['noticias' => $noticias]);
   }


   public function deCarreraBlog($carrera, $page = 6)
   {
      $c = Carrera::findOrFail($carrera);
      $noticias = $c->noticias()
         ->with('deCarrera')
         ->with('creadaPor')
         ->with('etiquetas')
         ->paginate($page);
      return view('frontend.noticia.noticias', ['noticias' => $noticias]);
   }


   public function porEtiquetaBlog($etiqueta, $page = 6)
   {
      $e = Etiqueta::findOrFail($etiqueta);
      $oetiqueta = $e->noticias()->paginate($page);
      return view('frontend.noticia.noticias', ['noticias' => $oetiqueta]);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $users = User::pluck('name', 'id');
      $etiquetas = Etiqueta::pluck('nombre', 'id');
      $carreras = Carrera::pluck('descripcion', 'id');
      return view('backend.noticia.create', compact('users', 'etiquetas', 'carreras'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $validatedData = $request->validate(
         [
            'titulo' => 'required|unique:noticias',
            'cuerpo' => 'required',
            // 'autor' => 'required',
            // 'carrera_id' => 'required',
            'image' => 'image|max:2048'
         ]
      );

      $noticia = new Noticia();
      $noticia->titulo = $request->input('titulo');
      $noticia->cuerpo = $request->input('cuerpo');
      $archivoImagen = $request->file('imagen');
      $archivoImagen2 = $request->file('imagen2');
      //$noticia->autor = $request->input('autor'); 
      $noticia->autor = Auth::user()->id;
      $noticia->carrera_id = $request->input('carrera_id');
      $noticia->save();
      if ($request->hasFile('imagen')) {
         $archivoImagen = $request->file('imagen');
         $path = $archivoImagen->storeAs('public/noticias/' . $noticia->id, $archivoImagen->getClientOriginalName());
         $savedPath = str_replace("public/", "", $path);
         $noticia->imagen = $savedPath;
         $noticia->save();
      }

      if ($request->hasFile('imagen2')) {
         $archivoImagen2 = $request->file('imagen2');
         $path2 = $archivoImagen2->storeAs('public/noticias/' . $noticia->id, $archivoImagen2->getClientOriginalName());
         $savedPath2 = str_replace("public/", "", $path2);
         $noticia->imagen2 = $savedPath2;
         $noticia->save();
      }

      if ($request->hasFile('archivo1')) {
         $archivoImagen = $request->file('archivo1');
         $path = $archivoImagen->storeAs('public/noticias/' . $noticia->id, $archivoImagen->getClientOriginalName());
         $savedPath = str_replace("public/", "", $path);
         $noticia->archivo1 = $savedPath;
         $noticia->save();
      }
      if ($request->hasFile('archivo2')) {
         $archivoImagen = $request->file('archivo2');
         $path = $archivoImagen->storeAs('public/noticias/' . $noticia->id, $archivoImagen->getClientOriginalName());
         $savedPath = str_replace("public/", "", $path);
         $noticia->archivo2 = $savedPath;
         $noticia->save();
      }
      if ($request->hasFile('archivo3')) {
         $archivoImagen = $request->file('archivo3');
         $path = $archivoImagen->storeAs('public/noticias/' . $noticia->id, $archivoImagen->getClientOriginalName());
         $savedPath = str_replace("public/", "", $path);
         $noticia->archivo3 = $savedPath;
         $noticia->save();
      }
      $etiquetas = Etiqueta::all();
      $user = Auth::user()->id;
      foreach ($etiquetas as $etiqueta) {
         if ($request->input('etiqueta' . $etiqueta->id)) {
            $noticia->etiquetas()->attach($request->input('etiqueta' . $etiqueta->id), ['user_id' => $user]);
         }
      }

      //$noticia->etiquetas()->attach('1', ['user_id'=> $user ]);
      $request->session()->flash('status', 'Se guardó correctamente la noticia ' . $noticia->titulo);

      // Enviar la noticia por mail a todos los usuarios
      /*  $users = User::all();
      foreach ($users as $ouser) {
      $ouser->notify(new NoticiaNueva());
      $ouser->notify(new NoticiaLeer($ouser, $noticia));
      }*/

      return redirect()->route('noticias.create');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      $noticia = Noticia::findOrFail($id);
      $users = User::pluck('name', 'id');
      $etiquetas = Etiqueta::pluck('nombre', 'id');
      $carreras = Carrera::pluck('descripcion', 'id');
      return view('backend.noticia.show', compact('noticia', 'users', 'etiquetas', 'carreras'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $noticia = Noticia::findOrFail($id);
      $users = User::pluck('name', 'id');
      $etiquetas = Etiqueta::pluck('nombre', 'id');
      $carreras = Carrera::pluck('descripcion', 'id');
      return view('backend.noticia.edit', compact('noticia', 'users', 'etiquetas', 'carreras'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Noticia  $noticia
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
      $noticia = Noticia::findOrFail($id);
      $validatedData = $request->validate(
         [
            'titulo' => 'required|unique:noticias,titulo,' . $id,
            'cuerpo' => 'required',
            // 'autor' => 'required',
            // 'carrera_id' => 'required',
            'image' => 'image|max:2048',
            'image2' => 'image|max:2048'
         ]
      );

      if ($request->hasFile('imagen')) {
         $archivoImagen = $request->file('imagen');
         $path = $archivoImagen->storeAs('public/noticias/' . $noticia->id, $archivoImagen->getClientOriginalName());
         $savedPath = str_replace("public/", "", $path);
         $noticia->imagen = $savedPath;
      }

      if ($request->hasFile('imagen2')) {
         $archivoImagen2 = $request->file('imagen2');
         $path2 = $archivoImagen2->storeAs('public/noticias/' . $noticia->id, $archivoImagen2->getClientOriginalName());
         $savedPath2 = str_replace("public/", "", $path2);
         $noticia->imagen2 = $savedPath2;
      }

      if ($request->hasFile('archivo1')) {
         $archivoImagen = $request->file('archivo1');
         $path = $archivoImagen->storeAs('public/noticias/' . $noticia->id, $archivoImagen->getClientOriginalName());
         $savedPath = str_replace("public/", "", $path);
         $noticia->archivo1 = $savedPath;
         $noticia->save();
      }
      if ($request->hasFile('archivo2')) {
         $archivoImagen = $request->file('archivo2');
         $path = $archivoImagen->storeAs('public/noticias/' . $noticia->id, $archivoImagen->getClientOriginalName());
         $savedPath = str_replace("public/", "", $path);
         $noticia->archivo2 = $savedPath;
         $noticia->save();
      }
      if ($request->hasFile('archivo3')) {
         $archivoImagen = $request->file('archivo3');
         $path = $archivoImagen->storeAs('public/noticias/' . $noticia->id, $archivoImagen->getClientOriginalName());
         $savedPath = str_replace("public/", "", $path);
         $noticia->archivo3 = $savedPath;
         $noticia->save();
      }
      $noticia->update($validatedData);
      //$noticia->autor = $request->input('autor'); 
      $noticia->autor = Auth::user()->id;
      $noticia->carrera_id = $request->input('carrera_id');
      $noticia->save();

      $etiquetas = Etiqueta::all();
      $user = User::all()->random()->id;

      $noticia->save();

      $noticia->etiquetas()->detach();

      foreach ($etiquetas as $etiqueta) {
         if ($request->input('etiqueta' . $etiqueta->id)) {
            $noticia->etiquetas()->attach($request->input('etiqueta' . $etiqueta->id), ['user_id' => $user]);
         }
      }
      $request->session()->flash('status', 'Se guardó correctamente la noticia ' . $noticia->titulo);
      return redirect()->route('noticias.edit', $noticia->id);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $noticia = Noticia::findOrFail($id);
      $noticia->etiquetas()->detach();
      $noticia->delete();
      return redirect()->route('noticias.index');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function leerNoticia($id)
   {
      $e = Etiqueta::where('nombre', 'novedades')->first();
      $noticias = $e->novedades()->paginate(6);
      return view('frontend.noticia.noticias', compact('noticias'));
   }
}