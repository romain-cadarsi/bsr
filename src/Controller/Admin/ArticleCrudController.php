<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\FormBuilderInterface;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Informations du blog')->setCssClass('field-form_panel col-12'),
            TextField::new('titre'),
            ImageField::new('image')
                ->setBasePath('images/upload/')
                ->setUploadDir('public/images/upload')
                ->setUploadedFileNamePattern('[day][month][year][timestamp]-[name].[extension]'),
            TextField::new('altDescription')->setLabel("Description alternative de l'image")->setHelp("Sera utilisé dans les options d'accessibilité afin de décrire l'image aux non voyants"),
            DateField::new('date'),
            FormField::addPanel('Contenu du blog')->setCssClass('field-form_panel col-12'),
            TextEditorField::new('contenu')
                ->addJsFiles('js/trixFileUpload.js'),
        ];
    }

    public function createEditFormBuilder(EntityDto $entityDto, KeyValueStore $formOptions, AdminContext $context): FormBuilderInterface
    {
        if(!file_exists('./images/upload/'.$entityDto->getInstance()->getImage())) {
            $entityDto->getInstance()->setImage(null);
        }
        return parent::createEditFormBuilder($entityDto, $formOptions, $context);
    }
}
