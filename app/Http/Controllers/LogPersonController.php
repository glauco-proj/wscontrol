<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LogPerson;
use App\Http\Requests\LogPersonRequest;

class LogPersonController extends Controller{

  public function getAll(Request $request){
    $aPersons  = LogPerson::orderBy('log_at', 'desc')->take(10)->get();
    $aFormated = [];
    foreach($aPersons as $oLogPerson){
      $aFormated[] = $oLogPerson->format();
    }
    return response()->json($aFormated);
  }

  public function log(LogPersonRequest $request){
    $person = new LogPerson();
    $person->fill($request->all());
    $person->loadData();
    $person->save();

    return response()->json($person->format());
  }
}
