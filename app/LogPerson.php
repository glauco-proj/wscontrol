<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use App\BusinessObjects\BirthSign;

class LogPerson extends Model{

    //Não utiliza controle de dados
    public $timestamps  = false;

    //Nome da tabela
    protected $table    = 'tblogperson';

    //Campos
    protected $fillable = [
       'name'
      ,'birthday'
      ,'sex'
      ,'age'
      ,'birthsign'
      ,'log_at'
    ];

    /**
     * Carrega os dados virtuais com base nos parâmetros
     */
    public function loadData(){
      $this->log_at = date('d/m/Y H:i:s');
      //Carrega a idade (age)
      $this->loadAge();
      //Carrega o signo
      $this->loadBirthSign();
    }

    /**
     * Carrega a idade com base na data de nascimento
     */
    protected function loadAge(){
      if($this->birthday){
        if(strpos($this->birthday, '/') !== false){
          list($day, $month, $year) = explode('/', $this->birthday);
        }
        else{
          list($year, $month, $day) = explode('-', $this->birthday);
        }
        $oDateTime = new DateTime();
        $oDateTime->setDate($year, $month, $day);
        $oInterval = $oDateTime->diff(new DateTime());

        $this->age = $oInterval->format('%Y');
      }
    }

    /**
     * Carrega o signo através da data de aniversário
     */
    protected function loadBirthSign(){
      $boBirthSign     = new BirthSign($this->birthday);
      $this->birthsign = $boBirthSign->getBirthSign();
    }

    public function format(){
      return [
         'name'      => $this->name
        ,'birthday'  => $this->birthday
        ,'sex'       => $this->sex
        ,'age'       => $this->age
        ,'birthsign' => BirthSign::getDescrBirthSign($this->birthsign)
        ,'log_at'    => $this->log_at
      ];
    }
}
