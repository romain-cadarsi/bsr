<?php

namespace App\Controller\Admin;

use App\Entity\CategorieRealisation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategorieRealisationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CategorieRealisation::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre')
        ];
    }
}
