<?php
 namespace App\Traits;


 trait General
 {
     public $data = [];

     public function data($key, $value)
     {
         if (empty($key)) throw new \Exception('Key is not set');
         return $this->data[$key] = $value;
     }

     public function title($back,$separator = ' :: ',$front = null)
     {
         if (!isset($front)){
             $front = 'BlugMaster';
         }
         return $front.$separator.$back;
     }
 }