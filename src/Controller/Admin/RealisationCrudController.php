<?php

namespace App\Controller\Admin;

use App\Entity\Realisation;
use App\Form\ImageFileType;
use Doctrine\Common\Collections\Collection;
use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\FormBuilderInterface;

class RealisationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Realisation::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre')
                ->setRequired(false),
            TextField::new('adresse')
                ->setRequired(false),
            AssociationField::new('type'),
            ImageField::new('image')
                ->setLabel("Image principale")
                ->setBasePath('images/upload/')
                ->setUploadDir('public/images/upload')
                ->setRequired(false)
                ->setUploadedFileNamePattern('[day][month][year][timestamp]-[name].[extension]'),
            TextField::new('altDesc')
                ->setLabel("Description alternative de l'image principale"),
            TextEditorField::new('contenu')
                ->addJsFiles('js/trixFileUpload.js'),
            CollectionField::new('images')
                ->setLabel("Images additionnelles")
                ->onlyOnForms()
                ->setFormTypeOption('by_reference',false)
                ->setEntryType(ImageFileType::class),
            CollectionField::new('images')
                ->setLabel("Images additionnelles")
                ->onlyOnDetail()
                ->setTemplatePath('images.html.twig')
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
