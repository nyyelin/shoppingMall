<?php

namespace App\Foundation\Validation;

use App\Foundation\Validation\Validator;

class VehicleValidator extends Validator
{
    public function vehicleValidatedForStoreDept(array $data)
    {
        return $this->validate(
            $data,
            [
                "vehicle_name_id" => 'required',
                "define_no" => 'required',
                "chassi_no" => 'required',
                'use_condition_id' => 'required',
                "vehicle_status_class_id" => 'required',

           ],
            [
             'vehicle_name_id.required' => 'required',
             'define_no.required' => 'required',
             'chassi_no.required' => 'required',
             'use_condition_id.required' => 'required',
             'vehicle_status_class_id.required' => 'required',
            ]
        );
    }

    public function vehicleValidatedForConfiscationDept(array $data)
    {
        return $this->validate(
            $data,
            [
                "vehicle_name_id" => 'required',
                "define_no" => 'required',
                "vehicle_status_class_id" => 'required',
           ],
            [
             'vehicle_name_id.required' => 'required',
             'define_no.required' => 'required',
             'vehicle_status_class_id.required' => 'required',
            ]
        );
    }

    public function vehicleInformationValidated(array $data)
    {
        return $this->validate(
            $data,
            [
                "vehicle_id" => 'required',
                "weight" => 'required',
                "weight_unit" => 'required',
                "current_location_id" => 'required',
                "vehicle_status_class_id" => 'required',
                "receive_info_status" => 'required',
                "receive_status_id" => 'required',
                "use_condition_id" => 'required',

            ],
            [
                'vehicle_id.required' => 'required',
                'weight.required' => 'required',
                'weight_unit.required' => 'required',
                'current_location_id.required' => 'required',
                'vehicle_status_class_id.required' => 'required',
                'receive_info_status.required' => 'required',
                'receive_status_id.required' => 'required',
                //'condition.required' => 'required',
                'use_condition_id.required' => 'required',
                // 'licence_status.required' => 'required',

            ]
        );
    }

    public function vehicleExcelValidated(array $data)
    {
        return $this->validate($data, ["file" => 'required'], ['file.required' => 'required']);
    }
}
