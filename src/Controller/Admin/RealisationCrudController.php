<?php

namespace App\Controller\Admin;

use App\Entity\Realisation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RealisationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Realisation::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre')->setRequired(false),
            TextField::new('adresse')->setRequired(false),
            ChoiceField::new('type')->setChoices(['Logements' => 'logement', "Maison" => "maison", "Extension" => "extension" , "Entreprise" => 'entreprise']),
            ImageField::new('image')->setBasePath('images/upload/')->setUploadDir('public/images/upload')->setRequired(false),
            TextEditorField::new('contenu')->addJsFiles('js/trixFileUpload.js')
        ];
    }
}
