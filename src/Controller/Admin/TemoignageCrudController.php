<?php

namespace App\Controller\Admin;

use App\Entity\Temoignage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
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
            ImageField::new('image')->setBasePath('images/upload/')
                ->setUploadDir('public/images/upload')
                ->setRequired(false)
            ->setHelp("Si aucune image n'est défini pour ce témoignage, alors l'image affichée par défaut sera celle du client.")
        ];
    }
}
