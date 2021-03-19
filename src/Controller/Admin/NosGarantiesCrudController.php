<?php

namespace App\Controller\Admin;

use App\Entity\NosGaranties;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class NosGarantiesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return NosGaranties::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('icone')
                ->setHelp('Pour savoir quelles icones sont disponibles : <a href="https://fontawesome.com/icons">Fa icons </a>, et entrer uniquement le nom de l\'icone (exemple : si l\'icone est fa-adress-card, entrer uniquement <b> adress-card</b>)'),
            TextField::new('titre'),
            TextareaField::new('contenu')
                ->addJsFiles('js/trixFileUpload.js'),
        ];
    }
}
