<?php

namespace App\BusinessObjects;

use DateTime;

class BirthSign{

  const AQUARIO     = 1; //De 20/01 a 18/02
  const PEIXE       = 2; //De 19/02 a 20/03
  const ARIES       = 3; //De 21/03 a 19/04
  const TOURO       = 4; //De 20/04 a 20/05
  const GEMEOS      = 5; //De 21/05 a 20/06
  const CANCER      = 6; //De 21/06 a 22/07
  const LEAO        = 7; //De 23/07 a 22/08
  const VIRGEM      = 8; //De 23/08 a 22/09
  const LIBRA       = 9; //De 23/09 a 22/10
  const ESCORPIAO   = 10; //De 23/10 a 21/11
  const SAGITARIO   = 11; //De 22/11 a 21/12
  const CAPRICORNIO = 12; //De 22/12 a 19/01

  protected $birthday;
  protected $day;
  protected $month;

  public function __construct($birthday){
    if(strpos($birthday, '/') !== false){
      list($this->day, $this->month, ) = explode('/', $birthday);
    }
    else{
      list(, $this->month, $this->day) = explode('-', $birthday);
    }
  }

  public function getBirthSign(){
    switch(true){
      case $this->isAquario():     return self::AQUARIO;
      case $this->isPeixe():       return self::PEIXE;
      case $this->isAries():       return self::ARIES;
      case $this->isTouro():       return self::TOURO;
      case $this->isGemeos():      return self::GEMEOS;
      case $this->isCancer():      return self::CANCER;
      case $this->isLeao():        return self::LEAO;
      case $this->isVirgem():      return self::VIRGEM;
      case $this->isLibra():       return self::LIBRA;
      case $this->isEscorpiao():   return self::ESCORPIAO;
      case $this->isSagitario():   return self::SAGITARIO;
      case $this->isCapricornio(): return self::CAPRICORNIO;
      default: return null;
    }
  }

  public static function getDescrBirthSign($birthSign){
    switch($birthSign){
      case self::AQUARIO:     return 'Aquário';
      case self::PEIXE:       return 'Peixe';
      case self::ARIES:       return 'Áries';
      case self::TOURO:       return 'Touro';
      case self::GEMEOS:      return 'Gêmeos';
      case self::CANCER:      return 'Câncer';
      case self::LEAO:        return 'Leão';
      case self::VIRGEM:      return 'Virgem';
      case self::LIBRA:       return 'Libra';
      case self::ESCORPIAO:   return 'Escorpião';
      case self::SAGITARIO:   return 'Sagitário';
      case self::CAPRICORNIO: return 'Capricórnio';
      default: return null;
    }
  }

  //De 20/01 a 18/02
  public function isAquario(){
    return (($this->month == 1 && $this->day >= 20) || ($this->month == 2 && $this->day <= 18));
  }

  //De 19/02 a 20/03
  public function isPeixe(){
    return (($this->month == 2 && $this->day >= 19) || ($this->month == 3 && $this->day <= 20));
  }

  //De 21/03 a 19/04
  public function isAries(){
    return (($this->month == 3 && $this->day >= 21) || ($this->month == 4 && $this->day <= 19));
  }

  //De 20/04 a 20/05
  public function isTouro(){
    return (($this->month == 4 && $this->day >= 20) || ($this->month == 5 && $this->day <= 20));
  }

  //De 21/05 a 20/06
  public function isGemeos(){
    return (($this->month == 5 && $this->day >= 21) || ($this->month == 6 && $this->day <= 20));
  }

  //De 21/06 a 22/07
  public function isCancer(){
    return (($this->month == 6 && $this->day >= 21) || ($this->month == 7 && $this->day <= 22));
  }

  //De 23/07 a 22/08
  public function isLeao(){
    return (($this->month == 7 && $this->day >= 23) || ($this->month == 8 && $this->day <= 22));
  }

  //De 23/08 a 22/09
  public function isVirgem(){
    return (($this->month == 8 && $this->day >= 23) || ($this->month == 9 && $this->day <= 22));
  }

  //De 23/09 a 22/10
  public function isLibra(){
    return (($this->month == 9 && $this->day >= 23) || ($this->month == 10 && $this->day <= 22));
  }

  //De 23/10 a 21/11
  public function isEscorpiao(){
    return (($this->month == 10 && $this->day >= 23) || ($this->month == 11 && $this->day <= 21));
  }

  //De 22/11 a 21/12
  public function isSagitario(){
    return (($this->month == 11 && $this->day >= 22) || ($this->month == 12 && $this->day <= 21));
  }

  //De 22/12 a 19/01
  public function isCapricornio(){
    return (($this->month == 12 && $this->day >= 22) || ($this->month == 1 && $this->day <= 19));
  }
}
