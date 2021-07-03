<?php

namespace App\Controller\Admin;

use App\Entity\Emplacement;
use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\FormBuilderInterface;

class EmplacementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Emplacement::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre'),
            TextField::new('adresse'),
            TextField::new('telephone'),
            TextField::new('email'),
            ImageField::new('image')
                ->setBasePath('images/upload/')
                ->setUploadDir('public/images/upload')
                ->setRequired(false)
                ->setUploadedFileNamePattern('[day][month][year][timestamp]-[name].[extension]'),
            BooleanField::new('afficherDansLeFooter')
                ->setHelp("Si cette option est cochée, cette seule adresse apparaîtra dans le footer")
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
