<?php

namespace App\Foundation\Eloquent\Traits;

use Illuminate\Support\Facades\App;

trait HasLanguage
{

    public function getSingleNameAttribute() {
        $lang =  App::getLocale();

       if($lang == 'en') {
        $lang = 'eng';
       }

       return $this->{'name_'.$lang};
    }



}
