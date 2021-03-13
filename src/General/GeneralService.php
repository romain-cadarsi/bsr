<?php

namespace App\General;

use App\Repository\GeneralRepository;

class GeneralService{
    private GeneralRepository $gr;

    public function __construct(GeneralRepository $GeneralRepository){
        $this->gr = $GeneralRepository;
    }

    public function getGeneral(){
        return $this->gr->find(1);
    }
}