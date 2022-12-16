<?php

namespace App\Foundation\Eloquent\Traits;
use Carbon\Traits\Date;
use Carbon\Carbon;
use ErrorException;

trait HasDate
{
    public function transformDate($value)
    {
        if(is_int($value)) {
            return Carbon::parse(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value)->format('m-d-Y'))->format('Y-m-d');
        }
        else if(!is_int($value)||isset($value)){
            $inputDate =str_replace('/', '-', $value);
            return Carbon::parse($inputDate)->format('Y-m-d');
        }else{
            return null;
        }
    }
}
