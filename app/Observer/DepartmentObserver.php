<?php
namespace Horsefly\Observer;
use Illuminate\Support\Facades\Cache;
class DepartmentObserver{
   public function saved()
   {
       Cache::forget('dept_data');
   }

   public function created()
   {
       Cache::forget('dept_data');
   }

   public function updated()
   {
       Cache::forget('dept_data');
   }

    /**
     *
     */
    public function deleted()
   {
       Cache::forget('dept_data');
   }
}