<?php

namespace App\Controller\Admin;

use App\Entity\General;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GeneralCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return General::class;
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
            ImageField::new('logoSombre')->setBasePath('images/upload/')->setUploadDir('public/images/upload')->setUploadedFileNamePattern("logo-dark.png")->setRequired(false),
            ImageField::new('logoClair')->setBasePath('images/upload/')->setUploadDir('public/images/upload')->setUploadedFileNamePattern("logo-light.png")->setRequired(false),
            ImageField::new('logoPetit')->setBasePath('images/upload/')->setUploadDir('public/images/upload')->setUploadedFileNamePattern("logo-petit.png")->setRequired(false),
            TextField::new('adresseEmail')->setRequired(false),
            TextField::new('nomEntreprise')->setRequired(false),
            TextField::new('slogan')->setRequired(false),
            TextEditorField::new('quiSommesNous')->addJsFiles('js/trixFileUpload.js')->setRequired(false),
            ImageField::new('imageQuiSommesNous')->setBasePath('images/upload/')->setUploadDir('public/images/upload')->setRequired(false)->setUploadedFileNamePattern('quiSommesNous.png'),
            TextEditorField::new('nosChiffresCles')->setRequired(false),
            ImageField::new('imageNosChiffresCles')->setBasePath('images/upload/')->setUploadDir('public/images/upload')->setRequired(false)->setUploadedFileNamePattern('chiffresCles.png'),
            ImageField::new('imageAccueil')->setBasePath('images/upload/')->setUploadDir('public/images/upload')->setRequired(false)->setUploadedFileNamePattern('accueil.png'),



        ];
    }
}
