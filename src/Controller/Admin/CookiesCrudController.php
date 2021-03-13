<?php

namespace App\Controller\Admin;

use App\Entity\Cookies;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class CookiesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cookies::class;
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
