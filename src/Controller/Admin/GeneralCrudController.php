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
            ImageField::new('logoSombre')->setBasePath('images/upload/')->setUploadDir('public/images/upload')->setUploadedFileNamePattern("logo-dark.png")->setRequired(false)->setHelp('Ce logo sera utilisé pour les menu sombres(Ce logo doit donc avoir des textes blancs)')->hideOnIndex(),
            ImageField::new('logoClair')->setBasePath('images/upload/')->setUploadDir('public/images/upload')->setUploadedFileNamePattern("logo-light.png")->setRequired(false)->setHelp('Ce logo sera utilisé pour les menu sombres(Ce logo doit donc avoir des textes noirs)')->hideOnIndex(),
            ImageField::new('logoPetit')->setBasePath('images/upload/')->setUploadDir('public/images/upload')->setUploadedFileNamePattern("logo-petit.png")->setRequired(false)->setHelp('Ce logo sera utilisé sur les menus mobiles')->hideOnIndex(),
            TextField::new('adresseEmail')->setRequired(false)->setHelp("Cet email sera utilisé pour les messages clients venant du site"),
            TextField::new('nomEntreprise')->setRequired(false)->setHelp("Le nom d'entreprise sera utilisé partout sur le site."),
            ImageField::new('imageAccueil')->setBasePath('images/upload/')->setUploadDir('public/images/upload')->setRequired(false)->setUploadedFileNamePattern('accueil.png')->setHelp("La première image affichée sur la page d'accueil"),
            TextField::new('slogan')->setRequired(false)->setHelp("Correspond a la phrase sur l'image d'accueil"),
            TextEditorField::new('quiSommesNous')->addJsFiles('js/trixFileUpload.js')->setRequired(false)->setHelp("Le texte affiché dans la partie Qui Sommes Nous"),
            ImageField::new('imageQuiSommesNous')->setBasePath('images/upload/')->setUploadDir('public/images/upload')->setRequired(false)->setUploadedFileNamePattern('quiSommesNous.png'),
            TextEditorField::new('nosChiffresCles')->setRequired(false)->setHelp("Le texte affiché dans la partie Qui Sommes Nous"),
            ImageField::new('imageNosChiffresCles')->setBasePath('images/upload/')->setUploadDir('public/images/upload')->setRequired(false)->setUploadedFileNamePattern('chiffresCles.png'),
            TextField::new('telephone')->setRequired(false)->setHelp("Ce numéro de téléphone sera affiché dans le menu"),



        ];
    }
}
