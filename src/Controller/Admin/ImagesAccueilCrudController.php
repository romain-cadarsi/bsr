<?php

namespace App\Controller\Admin;

use App\Entity\ImagesAccueil;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ImagesAccueilCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ImagesAccueil::class;
    }
    public function configureActions(Actions $actions): Actions
    {
        parent::configureActions($actions);
        $actions->disable('new','delete');
        return $actions;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('texteGauche'),
            ImageField::new('imageGauche')
                ->setBasePath('websiteImage/')
                ->setUploadDir('public/websiteImage/')
                ->setUploadedFileNamePattern("imageGauche.png")
                ->setRequired(false),
            TextField::new('texteDroite'),
            ImageField::new('imageDroite')
                ->setBasePath('websiteImage/')
                ->setUploadDir('public/websiteImage/')
                ->setUploadedFileNamePattern("imageDroite.png")
                ->setRequired(false)

        ];
    }

}
