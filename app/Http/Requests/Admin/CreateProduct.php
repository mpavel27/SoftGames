<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class CreateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth()->check() && auth()->user()->pterodactyl_admin == 1){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_name' => 'required|string|max:16',
            'product_desc' => 'required|string|max:16',
            'product_category' => 'required|integer',
            'product_price' => 'required|numeric',
            'product_anual_price' => 'required|numeric',
            'product_image' => 'required|url',
            'product_nest' => 'required|gt:0',
            'product_location' => 'required|gt:0',
            'product_eggs' => 'required|json',
            'product_ram_limit' => 'required',
            'product_swap' => 'required',
            'product_disk_limit' => 'required',
            'product_block_io' => 'required',
            'product_cpu_limit' => 'required',
            'product_database_limit' => 'required',
            'product_backup_limit' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        foreach ($validator->errors()->messages() as $message) {
            toastr()->error($message[0]);
        }
        return redirect()->back();
    }
}
