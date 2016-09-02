<?php

namespace App\Http\Controllers\Inventory\Setting\SubCategory;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//model
use App\Model\Inventory\Setting\Subcategory;

//formResquest
use App\FormRequest\Inventory\Setting\SubcategoryFormRequest;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('page.inventory.setting.subcategory.index');
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
            $validate_subcategory = SubcategoryFormRequest::validate_subcategory($data,'','store');
            if ($validate_subcategory=='false')
            {
                $message=array('type'=>'error','message'=>'Error al guardar, revise los datos, puede que este duplicado el codigo, orden o el detalle del producto.');
            }else{
                $message = SubcategoryFormRequest::save_subcategory($data);
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
                $sql = Subcategory::All();
                break;
            
            case 'delete':
                $sql = Subcategory::onlyTrashed()->get();
                break;
            case 'all':
                # code...
                $sql = Subcategory::withTrashed()->get();
                break;
            case 'select':
                $sql = Subcategory::All();
                return $sql;
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
        $sql = Subcategory::find($id);
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
            $validate_subcategory = SubcategoryFormRequest::validate_subcategory($data,$id,'update');
            if ($validate_subcategory=='false')
            {
                $message=array('type'=>'error','message'=>'Error al guardar, revise los datos, puede que este duplicado el codigo, orden o el detalle del producto.');
            }else{
                $message = SubcategoryFormRequest::update_subcategory($data, $id);
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
                    $sql = Subcategory::find($array[$i]);
                    $sql->delete();
                }
                $message=array('type'=>'success','message'=>'Borrado exitosamente');
            }catch(\Illuminate\Database\QueryException $e){   
                $message=array('type'=>'error','message'=>'Ocurrio un error interno.');
            }
            return response()->json($message);
        }
    }
}
