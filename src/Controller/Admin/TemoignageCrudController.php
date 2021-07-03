<?php

namespace App\Controller\Admin;

use App\Entity\Temoignage;
use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\FormBuilderInterface;

class TemoignageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Temoignage::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('client'),
            TextField::new('temoignage'),
            TextField::new('nomPersonne'),
            ImageField::new('image')->setBasePath('images/upload/')
                ->setUploadDir('public/images/upload')
                ->setRequired(false)
            ->setHelp("Si aucune image n'est défini pour ce témoignage, alors l'image affichée par défaut sera celle du client.")
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
