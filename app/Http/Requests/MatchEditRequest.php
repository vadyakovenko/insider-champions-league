<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class MatchEditRequest
 * @package App\Http\Requests
 *
 * @property int $goals
 */
class MatchEditRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'goals' => ['required', 'integer', 'min:0']
        ];
    }
}
