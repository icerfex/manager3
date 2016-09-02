<?php

namespace App\FormRequest\Inventory\Setting;

//model
use App\Model\Inventory\Setting\SubCategory;

class SubcategoryFormRequest
{

	public static function validate_subcategory(array $data, $id, $option)
	{
		//rules
        switch ($option) {
            //rule store
            case 'store':
                $rules=array(
                    'abr' => 'required|min:2|max:2|unique:subcategories',
                    'name' => 'required|min:3|max:50'
                );
                $new_data=array(
                    'abr' =>  mb_strtoupper(trim($data['abr'])),
                    'name' => mb_strtoupper(trim($data['name']))
                );
                break;
            //rule update
            case 'update':
                $rules=array(
                    'code' => 'required|min:3|max:3|unique:subcategories,code,'.$id,
                    'abr' => 'required|min:2|max:2|unique:subcategories,abr,'.$id,
                    'name' => 'required|min:3|max:50'
                );
                $new_data=array(
                    'code' =>  trim($data['code']),
                    'abr' =>  mb_strtoupper(trim($data['abr'])),
                    'name' => mb_strtoupper(trim($data['name']))
                );
                break;
        }

        $validator = \Validator::make($new_data, $rules);
        if ($validator->fails())
            $result='false';
        else
            $result='true';

        return $result;
	}

	public static function save_subcategory(array $data)
	{
		try{
            $sql = new Subcategory;
            $code = str_pad((int) ($sql->max('code')+1),3,"0",STR_PAD_LEFT);
            $abr = mb_strtoupper(trim($data['abr']));
            $name = mb_strtoupper(trim($data['name']));

            $sql -> code = $code;
            $sql -> abr = $abr;
            $sql -> name = $name;
            $sql -> save();
            $result=array('type'=>'success','message'=>'Guardado exitosamente.'.$abr.' '.$name);

        }catch(\Illuminate\Database\QueryException $e){   
            $result=array('type'=>'error','message'=>'Ocurrio un error interno.');
        }
        return $result;
	}

	public static function update_subcategory(array $data, $id)
	{
		try{
            $code = trim($data['code']);
            $abr = mb_strtoupper(trim($data['abr']));
            $name = mb_strtoupper(trim($data['name']));

            $sql = Subcategory::find($id);
            $sql -> code = $code;
            $sql -> abr = $abr;
            $sql -> name = $name;
            $sql -> save();
            $result=array('type'=>'success','message'=>'Guardado exitosamente.');
        }catch(\Illuminate\Database\QueryException $e){   
            $result=array('type'=>'error','message'=>'Ocurrio un error interno.');
        }
        return $result;
	}
}