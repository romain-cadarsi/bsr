<?php

namespace App\General;

use App\Repository\GeneralRepository;
use App\Repository\ImagesAccueilRepository;

class GeneralService{
    private GeneralRepository $gr;
    private ImagesAccueilRepository $ir;

    public function __construct(GeneralRepository $GeneralRepository,ImagesAccueilRepository $imagesAccueilRepository){
        $this->gr = $GeneralRepository;
        $this->ir = $imagesAccueilRepository;
    }

    public function getGeneral(){
        return $this->gr->find(1);
    }

    public function getImageAccueil()
    {
        return $this->ir->find(1);
    }
}