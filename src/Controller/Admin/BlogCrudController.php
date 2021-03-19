<?php

namespace App\Controller\Admin;

use App\Entity\Blog;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Validator\Constraints\DateTime;

class BlogCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Blog::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
         TextField::new('titre'),
            TextEditorField::new('contenu')
                ->addJsFiles('js/trixFileUpload.js'),
            ImageField::new('image')
                ->setBasePath('images/upload/')
                ->setUploadDir('public/images/upload')
                ->setRequired(false)
                ->setUploadedFileNamePattern('[day][month][year][timestamp]-[name].[extension]'),
            DateField::new('date')
        ];
    }

}
