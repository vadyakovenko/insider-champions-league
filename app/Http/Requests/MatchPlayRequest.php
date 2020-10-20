<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class MatchPlayRequest
 * @package App\Http\Requests
 *
 * @property int $week;
 */
class MatchPlayRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'week' => ['required', 'integer']
        ];
    }
}
