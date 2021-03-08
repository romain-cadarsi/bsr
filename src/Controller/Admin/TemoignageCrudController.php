<?php

namespace App\Controller\Admin;

use App\Entity\Temoignage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TemoignageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Temoignage::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('client'),
            TextField::new('temoignage'),
            TextField::new('nomPersonne'),
        ];
    }
}
