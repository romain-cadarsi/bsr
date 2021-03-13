<?php

namespace App\Controller\Admin;

use App\Entity\Emplacement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EmplacementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Emplacement::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre'),
            TextField::new('adresse'),
            TextField::new('telephone'),
            TextField::new('email'),
            ImageField::new('image')->setBasePath('images/upload/')->setUploadDir('public/images/upload')->setRequired(false),
            BooleanField::new('afficherDansLeFooter')->onlyOnIndex()->setHelp("Si cette option est cochée, cette seule adresse apparaîtra dans le footer")
        ];
    }
}
