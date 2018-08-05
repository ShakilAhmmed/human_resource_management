<?php

namespace App\Observer;
use Illuminate\Support\Facades\Cache;
class DesignationObserver{

    public function saved()
    {
        Cache::forget('designation_list');
    }

    public function created()
    {
        Cache::forget('designation_list');
    }

    public function deleted()
    {
        Cache::forget('designation_list');
    }

    public function updated()
    {
        Cache::forget('designation_list');
    }

}