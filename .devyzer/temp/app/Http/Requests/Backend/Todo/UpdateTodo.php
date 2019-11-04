<?php
namespace App\Http\Requests\Backend\Todo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateTodo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function authorize()
    {
        return true;
        //   return Gate::allows('admin.todo.edit', $this->todo);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'id' => 'None',

            'title' => 'nullable',

            'description' => 'nullable',

            'deadline' => 'required'
        ];
    }
}
