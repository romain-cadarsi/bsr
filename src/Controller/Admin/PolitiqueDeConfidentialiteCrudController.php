<?php

namespace App\Controller\Admin;

use App\Entity\PolitiqueDeConfidentialite;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class PolitiqueDeConfidentialiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PolitiqueDeConfidentialite::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextEditorField::new('contenu')
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        parent::configureActions($actions);
        $actions->disable('new','delete');
        return $actions;
    }
}
