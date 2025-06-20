<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residuo;
use App\Models\CategoriasResiduo;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class ResiduoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ultimoMes = Carbon::now()->translatedFormat('F');
        $mes = Carbon::now()->month;
        $anio = Carbon::now()->year;
        
        //$categoriasResiduo = CategoriasResiduo::join('residuos', 'residuos.categoria_id', '=', 'categorias_residuos.id' , 'left outer')->select('categorias_residuos.id', 'nombre', DB::raw('COALESCE(SUM(peso),0) as peso'))->groupBy('categorias_residuos.id')->paginate(15);

        //FER
        //$pesosAnio = Residuo::select(Residuo::raw("nombre, SUM(peso) as peso"))->join('categorias_residuos', 'residuos.categoria_id', '=', 'categorias_residuos.id' )->whereYear('residuos.created_at', '=', $anio)->groupBy('nombre')->paginate(10);
        //JOA
        $pesosAnio = DB::select('SELECT categorias_residuos.id , categorias_residuos.nombre , COALESCE(SUM(peso),0) as peso , COALESCE(anio,'.$anio.') as anio FROM categorias_residuos LEFT OUTER JOIN (SELECT residuos.categoria_id, SUM(residuos.peso) as peso , YEAR(residuos.created_at) as anio FROM residuos WHERE YEAR(residuos.created_at) = '.$anio.' GROUP BY residuos.categoria_id, anio) as residuos ON residuos.categoria_id = categorias_residuos.id GROUP BY categorias_residuos.id, anio');
        
        //FER
        //$pesosMes = Residuo::select(Residuo::raw("nombre, SUM(peso) as peso"))->join('categorias_residuos', 'residuos.categoria_id', '=', 'categorias_residuos.id' )->whereYear('residuos.created_at', '=', $anio)->whereMonth('residuos.created_at', '=', $mes)->groupBy('nombre')->paginate(10);
        //JOA
        $pesosMes = DB::select('SELECT categorias_residuos.id , categorias_residuos.nombre , COALESCE(SUM(peso),0) as peso , COALESCE(mes,'.$mes.') as mes FROM categorias_residuos LEFT OUTER JOIN (SELECT residuos.categoria_id, SUM(residuos.peso) as peso , MONTH(residuos.created_at) as mes FROM residuos WHERE MONTH(residuos.created_at) = '.$mes.' and YEAR(residuos.created_at) = '.$anio.' GROUP BY residuos.categoria_id, mes) as residuos ON residuos.categoria_id = categorias_residuos.id GROUP BY categorias_residuos.id, mes');

        $totalMes = Residuo::select(Residuo::raw("SUM(peso) as peso"))->join('categorias_residuos', 'residuos.categoria_id', '=', 'categorias_residuos.id')->whereYear('residuos.created_at', '=', $anio)->whereMonth('residuos.created_at', '=', $mes)->get();
        $totalAnio = Residuo::select(Residuo::raw("SUM(peso) as peso"))->join('categorias_residuos', 'residuos.categoria_id', '=', 'categorias_residuos.id')->whereYear('residuos.created_at', '=', $anio)->get();
        return view ('backend.residuos.index', compact('pesosMes', 'pesosAnio', 'ultimoMes', 'anio', 'mes', 'totalMes', 'totalAnio')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categoriasResiduo = CategoriasResiduo::pluck('nombre', 'id');
        return view ('backend.residuos.create', compact('categoriasResiduo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombreResiduo = CategoriasResiduo::pluck('nombre', 'id');
        $request->validate(
            [
                'categoria' => 'required',
                'peso' => 'required',
                'fecha'=>'required'
            ]
        );

        
        
        $pesosResiduo = new Residuo();
        $pesosResiduo->categoria_id = $request->input('categoria');
        $pesosResiduo->peso = $request->input('peso');
        $pesosResiduo->created_at = $request->input('fecha');
        
        //dd($nombreResiduo[1]);

        $pesosResiduo->save();

        $request->session()->flash('success', 'Se guardó correctamente el peso '. $pesosResiduo->peso.' de '.$nombreResiduo[$request->input('categoria')]);
        return redirect()->route('residuos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesosResiduo = Residuo::findOrFail($id);
        
        return view('backend.residuos.show', compact('pesosResiduo'));
    }

    public function show_mes($mes,$anio) {

        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $mespedido = $meses[$mes-1];
       
        //$anio = Carbon::now()->year;

        $pesosMes = Residuo::select(Residuo::raw("residuos.id as id, nombre, peso, DATE_FORMAT(residuos.created_at, '%d/%m/%Y') as fecha"))->join('categorias_residuos', 'residuos.categoria_id', '=', 'categorias_residuos.id')->whereYear('residuos.created_at', '=', $anio)->whereMonth('residuos.created_at', '=', $mes)->paginate(10);
    
        return view('backend.residuos.showMes', compact('pesosMes', 'mespedido'));

        
    }

    public function show_anio($anio) {
        
    //JOA
    $pesosAnioMeses = DB::select('SELECT categorias_residuos.id , categorias_residuos.nombre, 
    COALESCE(Ene,0) as Ene,
    COALESCE(Feb,0) as Feb,
    COALESCE(Mar,0) as Mar,
    COALESCE(Abr,0) as Abr,
    COALESCE(May,0) as May,
    COALESCE(Jun,0) as Jun,
    COALESCE(Jul,0) as Jul,
    COALESCE(Ago,0) as Ago,
    COALESCE(Sep,0) as Sep,
    COALESCE(Oct,0) as Oct,
    COALESCE(Nov,0) as Nov,
    COALESCE(Dic,0) as Dic
    FROM categorias_residuos LEFT OUTER JOIN 
    (SELECT residuos.categoria_id, 
        SUM(IF(MONTH(residuos.created_at) = 1, peso, 0)) AS Ene,
        SUM(IF(MONTH(residuos.created_at) = 2, peso, 0)) AS Feb, 
        SUM(IF(MONTH(residuos.created_at) = 3, peso, 0)) AS Mar, 
        SUM(IF(MONTH(residuos.created_at) = 4, peso, 0)) AS Abr, 
        SUM(IF(MONTH(residuos.created_at) = 5, peso, 0)) AS May, 
        SUM(IF(MONTH(residuos.created_at) = 6, peso, 0)) AS Jun, 
        SUM(IF(MONTH(residuos.created_at) = 7, peso, 0)) AS Jul, 
        SUM(IF(MONTH(residuos.created_at) = 8, peso, 0)) AS Ago, 
        SUM(IF(MONTH(residuos.created_at) = 9, peso, 0)) AS Sep, 
        SUM(IF(MONTH(residuos.created_at) = 10, peso, 0)) AS Oct, 
        SUM(IF(MONTH(residuos.created_at) = 11, peso, 0)) AS Nov, 
        SUM(IF(MONTH(residuos.created_at) = 12, peso, 0)) AS Dic 
    FROM residuos WHERE YEAR(residuos.created_at) = '.$anio.' GROUP BY residuos.categoria_id) as residuos 
    ON residuos.categoria_id = categorias_residuos.id 
    GROUP BY categorias_residuos.id, categorias_residuos.nombre, 
    Ene, Feb, Mar, Abr, May, Jun, Jul, Ago, Sep, Oct, Nov, Dic;');

        //$anioActual = Carbon::now()->year;
        //$pesosAnio = Residuo::select(Residuo::raw("nombre, SUM(peso) as peso, MONTH(residuos.created_at) as mes"))->join('categorias_residuos', 'residuos.categoria_id', '=', 'categorias_residuos.id')->whereYear('residuos.created_at', '=', $anio)->groupBy('nombre', 'mes')->orderBy('mes', 'asc')->paginate(12);
        return view('backend.residuos.showAnio', compact('pesosAnioMeses', 'anio'));
    }

    public function show_mes_categoria($mes,$anio,$categoria) {
        
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $mespedido = $meses[$mes-1];
       
        //$anio = Carbon::now()->year;
        $categoriaTitulo = CategoriasResiduo::findOrFail($categoria);
        $pesosMesCategoria = Residuo::select(Residuo::raw("residuos.id as id, nombre, peso, DATE_FORMAT(residuos.created_at, '%d/%m/%Y') as fecha"))->join('categorias_residuos', 'residuos.categoria_id', '=', 'categorias_residuos.id')->whereYear('residuos.created_at', '=', $anio)->whereMonth('residuos.created_at', '=', $mes)->where('residuos.categoria_id', '=', $categoria)->paginate(10);
        return view('backend.residuos.showMesCategoria', compact('pesosMesCategoria', 'mespedido' , 'anio', 'categoriaTitulo'));
    }

    public function historico(){
        //$pesosAnio = Residuo::select(Residuo::raw("nombre, SUM(peso) as peso"))->join('categorias_residuos', 'residuos.categoria_id', '=', 'categorias_residuos.id' )->whereYear('residuos.created_at', '=', $anio)->groupBy('nombre')->paginate(10);
        $anios = DB::select('SELECT YEAR(residuos.created_at) as anios FROM residuos GROUP BY anios');
        //dd(sizeof($anios));
        
        $pesosAnio = array();
        $totalAnio = array();

        for ($i=0; $i < sizeof($anios); $i++) { 
            $anio = DB::select('SELECT categorias_residuos.id , categorias_residuos.nombre , COALESCE(SUM(peso),0) as peso , COALESCE(anio,'.$anios[$i]->anios.') as anio FROM categorias_residuos LEFT OUTER JOIN (SELECT residuos.categoria_id, SUM(residuos.peso) as peso , YEAR(residuos.created_at) as anio FROM residuos WHERE YEAR(residuos.created_at) = '.$anios[$i]->anios.' GROUP BY residuos.categoria_id, anio) as residuos ON residuos.categoria_id = categorias_residuos.id GROUP BY categorias_residuos.id, anio');
            $pesosAnio[$i] = $anio;

            $total = Residuo::select(Residuo::raw("SUM(peso) as peso"))->join('categorias_residuos', 'residuos.categoria_id', '=', 'categorias_residuos.id')->whereYear('residuos.created_at', '=', $anios[$i]->anios)->get();
            $totalAnio[$i] = $total;
        }

        //dd($totalAnio[0][0]->peso);

        /* foreach($pesosAnio as $key1 => $value1) {
            echo $key1;
            foreach($anio as $key2 => $value2) {
                echo "<br>$value2->nombre : $value2->peso</br>";
            }
        }  */ 
        
        return view('backend.residuos.historico', compact('pesosAnio', 'totalAnio'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoriasResiduo = CategoriasResiduo::pluck('nombre', 'id');
        $pesosResiduo = Residuo::findOrFail($id);
        $fecha = Carbon::parse($pesosResiduo->created_at)->format('Y-m-d');
        return view('backend.residuos.edit', compact('pesosResiduo', 'categoriasResiduo', 'fecha'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'categoria_id' => 'required',
            'peso' => 'required',
            'created_at' => 'required'
        ]); 
        $pesosResiduo = Residuo::findOrFail($id);
        
        $pesosResiduo->categoria_id = $request->input('categoria_id');
        $pesosResiduo->peso = $request->input('peso');
        $pesosResiduo->created_at = $request->input('created_at');
        $pesosResiduo->save();

        $request->session()->flash('success', 'Se guardaron correctamente los cambios');
        return redirect()->route('residuos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesossResiduo = Residuo::findOrFail($id);
        $pesossResiduo->delete();
        return redirect()->route('residuos.index')->with('deleted','Se borró correctamente el ingreso');
    }
}
