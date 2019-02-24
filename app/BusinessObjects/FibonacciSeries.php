<?php

namespace App\BusinessObjects;

use DateTime;

class FibonacciSeries{

  protected $initial;
  protected $size;

  public function __construct($initial, $size){
    $this->initial = $initial;
    $this->size    = $size;
  }

  protected function getSecond(){
    if($this->initial == 0 || $this->initial == 1){
      return 1;
    }
    return round($this->initial * ((1+sqrt(5))/2));
  }

  public function getSeries(){
    $next    = $this->getSecond();
    $initial = $this->initial;
    $series  = [
       $initial
      ,$next
    ];
    for($i = $this->size - 2; $i > 0; $i--){
      $current  = $initial + $next;
      $series[] = $current;
      $initial  = $next;
      $next     = $current;
    }
    return $series;
  }
}
