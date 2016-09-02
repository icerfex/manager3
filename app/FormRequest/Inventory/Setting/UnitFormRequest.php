<?php

namespace App\FormRequest\Inventory\Setting;

//model
use App\Model\Inventory\Setting\Unit;

class UnitFormRequest
{

	public static function validate_unit(array $data, $id, $option)
	{
		//rules
        switch ($option) {
            //rule store
            case 'store':
                $rules=array(
                    'name' => 'required|min:2|max:10|unique:units'
                );
                break;
            //rule update
            case 'update':
                $rules=array(
                    'name' => 'required|min:2|max:10|unique:units,name,'.$id
                );
                break;
        }
        $new_data=array(
            'name' => mb_strtoupper(trim($data['name']))
        );
        $validator = \Validator::make($new_data, $rules);
        if ($validator->fails())
            $result='false';
        else
            $result='true';

        return $result;
	}

	public static function save_unit(array $data)
	{
		try{
            $name = mb_strtoupper(trim($data['name']));
            $sql = new Unit;
            $sql -> name = $name;
            $sql -> save();
            $result=array('type'=>'success','message'=>'Guardado exitosamente.');

        }catch(\Illuminate\Database\QueryException $e){   
            $result=array('type'=>'error','message'=>'Ocurrio un error interno.');
        }
        return $result;
	}

	public static function update_unit(array $data, $id)
	{
		try{
            $name = mb_strtoupper(trim($data['name']));
            $sql = Unit::find($id);
            $sql -> name = $name;
            $sql -> save();
            $result=array('type'=>'success','message'=>'Guardado exitosamente.');
        }catch(\Illuminate\Database\QueryException $e){   
            $result=array('type'=>'error','message'=>'Ocurrio un error interno.');
        }
        return $result;
	}
}