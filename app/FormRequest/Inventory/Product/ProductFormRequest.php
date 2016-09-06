<?php

namespace App\FormRequest\Inventory\Product;

//model
use App\Model\Inventory\Product\Product;
use App\Model\Inventory\Setting\Category;
use App\Model\Inventory\Setting\Subcategory;

class ProductFormRequest
{

	public static function validate_product(array $data, $id, $option)
	{
        //rules
        switch ($option) {
            //rule store
            case 'store':
                $rules=array(
                    'code' => 'required|unique:products',
                    'category_id' => 'required|numeric',
                    'subcategory_id' => 'required|numeric',
                    'unit_id' => 'required|numeric',
                    'name' => 'required|min:3|max:150',
                    'order_product' => 'required|numeric|digits_between:5,7'
                );
                break;
            //rule update
            case 'update':
                $rules=array(
                    'code' => 'required|unique:products,code,'.$id,
                    'category_id' => 'required|numeric',
                    'subcategory_id' => 'required|numeric',
                    'unit_id' => 'required|numeric',
                    'name' => 'required|min:3|max:150',
                    'order_product' => 'required|numeric|digits_between:5,7'
                );
                break;
        }

        //data
        $code_category = Category::where('id',$data['category_id'])->first()->abr;
        $new_data=array(
            'code' =>  $code_category.'-'.trim($data['order_product']),
            'category_id' => $data['category_id'],
            'subcategory_id' => $data['subcategory_id'],
            'unit_id' => $data['unit_id'],
            'name' => mb_strtoupper(trim($data['name'])),
            'order_product' => trim($data['order_product'])
        );

        $validator = \Validator::make($new_data, $rules);
        if ($validator->fails())
            $result='false';
        else
            $result='true';

        return $result;
	}

	public static function save_product(array $data)
	{
        try{
            //$code = trim($data['code']);
            $category_id = $data['category_id'];
            $subcategory_id = $data['subcategory_id'];
            $unit_id = $data['unit_id'];
            $name = mb_strtoupper(trim($data['name']));
            //$photo = $data['image'];
            $order_product = trim($data['order_product']);
            
            $sql = new Product;
            $code_category = Category::find($category_id);
            $code_subcategory = Subcategory::find($subcategory_id);
            $code_product = $sql->select(\DB::raw('max(sku) as sku'))->where('sku','like',$code_category->code.'-'.$code_subcategory->code.'-%')->first()->sku;
            
            if(empty($code_product)){
                $sku = $code_category->code.'-'.$code_subcategory->code.'-'.'0001';
            }else{
                list($ca,$sc,$co)=explode('-',$code_product);
                $sku = $code_category->code.'-'.$code_subcategory->code.'-'.str_pad((int) ($co)+1,4,"0",STR_PAD_LEFT);
            }

            $sql -> sku = $sku;
            $sql -> code = $code_category->abr.'-'.$order_product;
            $sql -> category_id = $category_id;
            $sql -> subcategory_id = $subcategory_id;
            $sql -> unit_id = $unit_id;
            $sql -> name = $name;
            $sql -> photo = 'http://demo.nextspender.nt/avatars/nextsofts/product.jpg';
            $sql -> order_product = $order_product;
            $sql -> save();
            $result=array('type'=>'success','message'=>'Guardado exitosamente.');

        }catch(\Illuminate\Database\QueryException $e){   
            $result=array('type'=>'error','message'=>'Ocurrio un error interno.');
        }
        return $result;
	}

	public static function update_product(array $data, $id)
	{
		try{
            //$code = trim($data['code']);
            $category_id = $data['category_id'];
            $subcategory_id = $data['subcategory_id'];
            $unit_id = $data['unit_id'];
            $name = mb_strtoupper(trim($data['name']));
            //$photo = $data['image'];
            $order_product = trim($data['order_product']);

            $sql_product = new Product;
            $code_category = Category::find($category_id);
            $code_subcategory = Subcategory::find($subcategory_id);
            $code_product = $sql_product->select(\DB::raw('max(sku) as sku'))->where('sku','like',$code_category->code.'-'.$code_subcategory->code.'-%')->first()->sku;
            
            if(empty($code_product)){
                $sku = $code_category->code.'-'.$code_subcategory->code.'-'.'0001';
            }else{
                list($ca,$sc,$co)=explode('-',$code_product);
                $sku = $code_category->code.'-'.$code_subcategory->code.'-'.str_pad((int) ($co)+1,4,"0",STR_PAD_LEFT);
            }

            $sql = Product::find($id);
            $sql -> sku = $sku;
            $sql -> code = $code_category->abr.'-'.$order_product;
            $sql -> category_id = $category_id;
            $sql -> subcategory_id = $subcategory_id;
            $sql -> unit_id = $unit_id;
            $sql -> name = $name;
            $sql -> order_product = $order_product;
            $sql -> save();
            $result=array('type'=>'success','message'=>'Guardado exitosamente.');
        }catch(\Illuminate\Database\QueryException $e){   
            $result=array('type'=>'error','message'=>'Ocurrio un error interno.');
        }
        return $result;
	}
}