<?php

namespace App\FormRequest\Inventory\Setting;

//model
use App\Model\Inventory\Setting\Client;

class ClientFormRequest
{

	public static function validate_client(array $data, $id, $option)
	{
		//rules
        switch ($option) {
            //rule store
            case 'store':
                $rules=array(
                    'nit' => 'required|numeric|digits_between:6,14|unique:clients',
                    'name' => 'required|min:3|max:50',
                    'phone' => 'numeric|digits_between:7,8',
                    'email' => 'max:50|email',
                    'direction' => 'min:3|max:150',
                    'location' => 'min:3|max:50'
                );
                break;
            //rule update
            case 'update':
                $rules=array(
                    'nit' => 'required|numeric|digits_between:6,14|unique:clients,nit,'.$id,
                    'name' => 'required|min:3|max:50',
                    'phone' => 'numeric|digits_between:7,8',
                    'email' => 'max:50|email',
                    'direction' => 'min:3|max:150',
                    'location' => 'min:3|max:50'
                );
                break;
        }
        //data
        $new_data=array(
            'nit' =>  trim($data['nit']),
            'name' => mb_strtoupper(trim($data['name'])),
            'phone' => trim($data['phone']),
            'email' => trim($data['email']),
            'direction' => trim($data['direction']),
            'location' => trim($data['location'])
        );

        $validator = \Validator::make($new_data, $rules);
        if ($validator->fails())
            $result='false';
        else
            $result='true';

        return $result;
	}

	public static function save_client(array $data)
	{
		try{
            $nit = trim($data['nit']);
            $name = mb_strtoupper(trim($data['name']));
            $phone = trim($data['phone']);
            $email = trim($data['email']);
            $direction = trim($data['direction']);
            $location = trim($data['location']);
            if(isset($data['whatsapp']))
                $whatsapp = 1;
            else
                $whatsapp = 0;

            $sql = new Client;
            $sql -> nit = $nit;
            $sql -> name = $name;
            $sql -> phone = empty($phone) ? null : $phone;
            $sql -> email = empty($email) ? null : $email;
            $sql -> direction = empty($direction) ? null : $direction;
            $sql -> location = empty($location) ? null : $location;
            $sql -> whatsapp = $whatsapp;
            $sql -> save();
            $result=array('type'=>'success','message'=>'Guardado exitosamente.');

        }catch(\Illuminate\Database\QueryException $e){   
            $result=array('type'=>'error','message'=>'Ocurrio un error interno.');
        }
        return $result;
	}

	public static function update_client(array $data, $id)
	{
		try{
            $nit = trim($data['nit']);
            $name = mb_strtoupper(trim($data['name']));
            $phone = trim($data['phone']);
            $email = trim($data['email']);
            $direction = trim($data['direction']);
            $location = trim($data['location']);
            if(isset($data['whatsapp']))
                $whatsapp = 1;
            else
                $whatsapp = 0;

            $sql = Client::find($id);
            $sql -> nit = $nit;
            $sql -> name = $name;
            $sql -> phone = empty($phone) ? null : $phone;
            $sql -> email = empty($email) ? null : $email;
            $sql -> direction = empty($direction) ? null : $direction;
            $sql -> location = empty($location) ? null : $location;
            $sql -> whatsapp = $whatsapp;
            $sql -> save();
            $result=array('type'=>'success','message'=>'Guardado exitosamente.');
        }catch(\Illuminate\Database\QueryException $e){   
            $result=array('type'=>'error','message'=>'Ocurrio un error interno.');
        }
        return $result;
	}
}