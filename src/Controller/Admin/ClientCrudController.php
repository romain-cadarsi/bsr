<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\DomCrawler\Image;

class ClientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Client::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
           TextField::new('nom'),
            ImageField::new('image')
                ->setBasePath('images/upload/')
                ->setUploadDir('public/images/upload')
                ->setRequired(false)
                ->setUploadedFileNamePattern('[day][month][year][timestamp]-[name].[extension]'),
            BooleanField::new('afficherDansLesClients')
                ->setHelp("Si cette option est activé, ce client se retrouvera dans la section 'Ils nous font confiance'")
        ];
    }
}
