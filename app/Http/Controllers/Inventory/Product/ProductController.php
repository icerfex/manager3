<?php

namespace App\Http\Controllers\Inventory\Product;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//model
use App\Model\Inventory\Product\Product;

//formResquest
use App\FormRequest\Inventory\Product\ProductFormRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('page.inventory.product.index');
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
            $validate_product = ProductFormRequest::validate_product($data,'','store');
            if ($validate_product=='false')
            {
                $message=array('type'=>'error','message'=>'Error al guardar, revise los datos, puede que este duplicado el codigo, orden o el detalle del producto.');
            }else{
                $message = ProductFormRequest::save_product($data);
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
                $sql = Product::with('category','subcategory','unit')->get();
                break;
            
            case 'delete':
                $sql = Product::with('category','subcategory','unit')->onlyTrashed()->get();
                break;
            case 'all':
                # code...
                $sql = Product::with('category','subcategory','unit')->withTrashed()->get();
                break;
        }
        //return response()->json($sql);
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
        $sql = Product::find($id);
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
            $validate_product = ProductFormRequest::validate_product($data,$id,'update');
            if ($validate_product=='false')
            {
                $message=array('type'=>'error','message'=>'Error al guardar, revise los datos, puede que este duplicado el codigo, orden o el detalle del producto.');
            }else{
                $message = ProductFormRequest::update_product($data, $id);
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
                $product_array = $request->input('id');
                $array = explode(",", $product_array);
                for($i=0;$i<count($array);$i++){
                    $sql = Product::find($array[$i]);
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
