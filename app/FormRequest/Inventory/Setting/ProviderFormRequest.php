<?php

namespace App\FormRequest\Inventory\Setting;

//model
use App\Model\Inventory\Setting\Provider;

class ProviderFormRequest
{

	public static function validate_provider(array $data, $id, $option)
	{
		//rules
        switch ($option) {
            case 'store':
                $rules=array(
                    'nit' => 'required|numeric|digits_between:6,14|unique:providers',
                    'name' => 'required|min:3|max:50',
                    'phone' => 'min:7|max:14',
                    'email' => 'max:50|email',
                    'country' => 'min:3|max:150',
                    'city' => 'min:3|max:250',
                    'description' => 'required'
                );
                break;
            case 'update':
                $rules=array(
                    'nit' => 'required|numeric|digits_between:6,14|unique:providers,nit,'.$id,
                    'name' => 'required|min:3|max:50',
                    'phone' => 'min:7|max:14',
                    'email' => 'max:50|email',
                    'country' => 'min:3|max:150',
                    'city' => 'min:3|max:250',
                    'description' => 'required'
                );
                break;
        }

        //data
        $new_data=array(
            'nit' =>  trim($data['nit']),
            'name' => mb_strtoupper(trim($data['name'])),
            'phone' => trim($data['phone']),
            'email' => trim($data['email']),
            'country' => trim($data['country']),
            'city' => trim($data['city']),
            'description' => trim($data['description'])
        );

        $validator = \Validator::make($new_data, $rules);
        if ($validator->fails())
        {
            $result='false';
        }else{
            $result='true';
        }
        return $result;
	}

	public static function save_provider(array $data)
	{
		try{
            $nit = trim($data['nit']);
            $name = mb_strtoupper(trim($data['name']));
            $phone = trim($data['phone']);
            $email = trim($data['email']);
            $country = trim($data['country']);
            $city = trim($data['city']);
            $description = $data['description'];

            $sql = new Provider;
            $sql -> nit = $nit;
            $sql -> name = $name;
            $sql -> phone = empty($phone) ? null : $phone;
            $sql -> email = empty($email) ? null : $email;
            $sql -> country = $country;
            $sql -> city = $city;
            $sql -> description = $description;
            $sql -> save();
            $result=array('type'=>'success','message'=>'Guardado exitosamente.');

        }catch(\Illuminate\Database\QueryException $e){   
            $result=array('type'=>'error','message'=>'Ocurrio un error interno.');
        }
        return $result;
	}

	public static function update_provider(array $data, $id)
	{
		try{
            $nit = trim($data['nit']);
            $name = mb_strtoupper(trim($data['name']));
            $phone = trim($data['phone']);
            $email = trim($data['email']);
            $country = trim($data['country']);
            $city = trim($data['city']);
            $description = $data['description'];

            $sql = Provider::find($id);
            $sql -> nit = $nit;
            $sql -> name = $name;
            $sql -> phone = empty($phone) ? null : $phone;
            $sql -> email = empty($email) ? null : $email;
            $sql -> country = $country;
            $sql -> city = $city;
            $sql -> description = $description;
            $sql -> save();
            $result=array('type'=>'success','message'=>'Guardado exitosamente.');
        }catch(\Illuminate\Database\QueryException $e){   
            $result=array('type'=>'error','message'=>'Ocurrio un error interno.');
        }
        return $result;
	}
}