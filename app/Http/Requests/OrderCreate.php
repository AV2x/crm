<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderCreate extends FormRequest
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
            'customer' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'product.*.product_id' => [
                function($attribute, $value, $fail){
                    if($value == null){
                        $str = explode('.',$attribute)[1];
                        $fail('Укажите товар в строчке '.$str);
                    }
                }
            ],
            'product.*.count' => [
                function($attribute, $value, $fail){
                    if($value == null){
                        $str = explode('.',$attribute)[1];
                        $fail('Укажите количество товара в строчке '.$str);
                    }
                }
            ],
        ];
    }

    public function messages()
    {
        return [
          'customer.required' => 'Имя клиента обязательное поле',
          'telephone.required' => 'Телефон клиента обязательное поле',
          'email.required' => 'Email клиента обязательное поле',
          'address.required' => 'Адрес клиента обязательное поле',
          'product.*.product_id.required' => 'Выберите продукт в строке :values',
          'product.*.count.required' => 'Укажите количество продукции в строке :attribute'
        ];
    }


}
