<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
            
        return [

             'name' => 'required',
             'phone' => 'required',
            
             'address' => 'required'
            //
        ];
    }

    public function messages()
    {
        return [
                 'name.required' => '用户名不能为空',              
                  'phone.required' => '联系方式不能为空',
                 // 'phone.regex' => '联系方式格式不正确',
                 'address.required' => '收货地址不能为空',
                 
        ];
    }
}
