<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FibonacciRequest;
use App\BusinessObjects\FibonacciSeries;

class FibonacciController extends Controller{

  public function series(FibonacciRequest $request){
    $initial     = (int)$request->input( ['initial']);
    $size        = (int)$request->input( ['size']);
    $boFibonacci = new FibonacciSeries($initial, $size);
    return response()->json($boFibonacci->getSeries());
  }
}
