<?php

namespace App\Foundation\Validation;

use App\Foundation\Validation\Validator;

class AddressValidator extends Validator
{
    public function countryValidated(array $data)
    {
        return $this->validate($data, [
            "data.EN.name" => 'required|min:2'
        ], ['data.EN.name.required' => 'At least English  required is required']);
    }

    public function stateValidated(array $data)
    {
        return $this->validate(
            $data,
            [ "name_eng" => 'required',
               'name_mm' => 'required',
            ],
            ['name_eng.required' => 'required',
            'name_mm.required' => 'required',
            ]
        );
    }

    public function townshipValidated(array $data)
    {
        return $this->validate(
            $data,
            [ "name_eng" => 'required',
                'name_mm' => 'required',
                'district_id' => 'required'
             ],
            ['name_eng.required' => 'required',
            'name_mm.required' => 'required',
                'district_id.required' => 'required'
            ]
        );
    }





    public function searchLocationInfo($data)
    {
        return $this->validate($data, [ "location_segments" => 'required|array']);
    }
}
