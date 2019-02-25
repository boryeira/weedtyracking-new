<?php

namespace App\Http\Requests\Growlogs;

use Illuminate\Foundation\Http\FormRequest;

class DayRequest extends FormRequest
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
       switch ($this->method()){
         case 'POST': {
           return [
              'growlog_id' => 'required|exists:growlogs,id',
           ];
         }
         case 'PUT': {
           return [

           ];
         }
         default:break;
       }
     }

     public function messages()
    {
      return [
        'growlog_id.required' => 'Debe seleccionar un seguimiento.',

      ];
    }
}
