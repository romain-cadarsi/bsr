<?php

namespace App\General;

use App\Repository\EmplacementRepository;
use App\Repository\GeneralRepository;

class EmplacementService{
    private EmplacementRepository $er;

    public function __construct(EmplacementRepository $emplacementRepository){
        $this->er = $emplacementRepository;
    }

    public function getAdresses(){
        return array_reverse($this->er->findAll());
    }
}