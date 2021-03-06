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
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'week' => ['required', 'integer', 'min:1']
        ];
    }
}
