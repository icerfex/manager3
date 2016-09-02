<?php

namespace App\Http\Controllers\Inventory\Setting\Category;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//model
use App\Model\Inventory\Setting\Category;

//formResquest
use App\FormRequest\Inventory\Setting\CategoryFormRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('page.inventory.setting.category.index');
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
            $validate_category = CategoryFormRequest::validate_category($data,'','store');
            if ($validate_category=='false')
            {
                $message=array('type'=>'error','message'=>'Error al guardar, revise los datos, puede que este duplicado el codigo, orden o el detalle del producto.');
            }else{
                $message = CategoryFormRequest::save_category($data);
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
                $sql = Category::All();
                break;
            
            case 'delete':
                $sql = Category::onlyTrashed()->get();
                break;
            case 'all':
                # code...
                $sql = Category::withTrashed()->get();
                break;
            case 'select':
                $sql = Category::All();
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
        $sql = Category::find($id);
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
        //return array('type'=>'error','message'=>'Error al guardar, revise los datos, puede que este duplicado el codigo, orden o el detalle del producto.');
        if($request->ajax()){
            $data = $request -> all();
            $validate_category = CategoryFormRequest::validate_category($data,$id,'update');
            if ($validate_category=='false')
            {
                $message=array('type'=>'error','message'=>'Error al guardar, revise los datos, puede que este duplicado el codigo, orden o el detalle del producto.');
            }else{
                $message = CategoryFormRequest::update_category($data, $id);
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
                $category_array = $request->input('id');
                $array = explode(",", $category_array);
                for($i=0;$i<count($array);$i++){
                    $sql = Category::find($array[$i]);
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
