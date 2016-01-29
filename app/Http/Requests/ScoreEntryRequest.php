<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ScoreEntryRequest extends Request
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
		'CountryHomeScore' => 'required|integer',
		'CountryAwayScore' => 'required|integer'
        ];
    }

    public function messages()
    {
	    return [
	    'CountryHomeScore.required' => 'Home team score is required',
	    'CountryAwayScore.required' => 'Away team score is required',
	    'CountryHomeScore.integer' => 'Home team score must be an integer',
	    'CountryAwayScore.integer' => 'Away team score must be an integer',
	    ];
    }
}
