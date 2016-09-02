<?php

namespace App\Http\Controllers\Inventory\Setting\Client;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//model
use App\Model\Inventory\Setting\Client;

//formResquest
use App\FormRequest\Inventory\ClientFormRequest;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('page.inventory.setting.client.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->ajax()){
            $data = $request -> all();
            $validate_client = ClientFormRequest::validate_client($data,'','store');
            if ($validate_client=='false')
            {
                $message=array('type'=>'error','message'=>'Error al guardar, revise los datos, puede que este duplicado el codigo, orden o el detalle del producto.');
            }else{
                $message = ClientFormRequest::save_client($data);
            }
            return response()->json($message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        switch ($id) {
            case 'active':
                $sql = Client::All();
                break;
            
            case 'delete':
                $sql = Client::onlyTrashed()->get();
                break;
            case 'all':
                # code...
                $sql = Client::withTrashed()->get();
                break;
        }
        return $sql->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $sql = Client::find($id);
        return $sql->toJson();
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
        //
        if($request->ajax()){
            $data = $request -> all();
            $validate_client = ClientFormRequest::validate_client($data,$id,'update');
            if ($validate_client=='false')
            {
                $message=array('type'=>'error','message'=>'Error al guardar, revise los datos, puede que este duplicado el codigo, orden o el detalle del producto.');
            }else{
                $message = ClientFormRequest::update_client($data, $id);
            }
            return response()->json($message);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        if($request->ajax()){
            try{
                $clientArray = $request->input('id');
                $array = explode(",", $clientArray);
                for($i=0;$i<count($array);$i++){
                    $sql = Client::find($array[$i]);
                    $sql->delete();
                }
                $message=array('type'=>'success','message'=>'Borrado exitosamente');
            }catch(\Illuminate\Database\QueryException $e){   
                $message=array('type'=>'error','message'=>'Ocurrio un error interno.');
            }
            return response()->json($message);
        }
    }

    public function reportClient($option)
    {
        switch ($option) {
            case 'active':
                $sql = Client::orderBy('nit','asc')->get();
                $this->listClient($sql,$option);
                break;
            case 'delete':
                $sql = Client::onlyTrashed()->orderBy('nit','asc')->get();
                $this->listClient($sql,$option);
                break;
            case 'all':
                $sql = Client::withTrashed()->orderBy('nit','asc')->get();
                $this->listClient($sql,$option);
                break;
        }
    }

    public function listClient($data, $option)
    {
        switch ($option) {
            case 'active':
                $title = "LISTA DE CLIENTES ACTIVOS";
                break;
            case 'delete':
                $title = "LISTA DE CLIENTES ELIMINADOS";
                break;
            case 'all':
                $title = "LISTA DE CLIENTES ACTIVOS Y ELIMINADOS";
                break;
        }
        $html='<div style="font-weight: bold;text-align:center;font-size:13pt;"><b><label>'.$title.'</label></b></div><br>';
        
        $html.='
            <table>
                <thead>
                    <tr>
                        <th valign="middle" align="center">Nro</th>
                        <th valign="middle" align="center">Nit</th>
                        <th valign="middle" align="center">Nombre/Razón Social</th>
                        <th valign="middle" align="center">Teléfono</th>
                        <th valign="middle" align="center">Email</th>
                        <th valign="middle" align="center">Dirección</th>
                        <th valign="middle" align="center">Zona</th>
                        <th valign="middle" align="center">Whatsapp</th>
                    </tr>
                </thead>
                <tbody>';
        foreach ($data as $key => $value) {
            $html.='<tr>
                        <td valign="middle" align="left">'.++$key.'</td>
                        <td valign="middle" align="left">'.$value->nit.'</td>
                        <td valign="middle" align="left">'.$value->name.'</td>
                        <td valign="middle" align="left">'.$value->phone.'</td>
                        <td valign="middle" align="left">'.$value->email.'</td>
                        <td valign="middle" align="left">'.$value->direction.'</td>
                        <td valign="middle" align="left">'.$value->location.'</td>
                        <td valign="middle" align="right">'.$value->whatsapp.'</td>
                    </tr>';
        }

        $html.='</tbody>
            </table>';
        
        $mpdf=new \mPDF('c','letter','','',20,20,20,20,10,10); 
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0;
       

        $mpdf->SetFooter('{PAGENO}/{nb}');

        $stylesheet = file_get_contents('assets/css/mpdf/mpdfstyletables.css');
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($html);
        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("Sistema de Inventarios");
        $mpdf->SetAuthor("NextSofts Global Corporation");
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->Output('Listado-Clientes-'.date('d.m.Y').'.pdf','I');
        exit;
    }
}
