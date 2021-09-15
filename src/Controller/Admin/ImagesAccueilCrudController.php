<?php

namespace App\Controller\Admin;

use App\Entity\ImagesAccueil;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;


class ImagesAccueilCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ImagesAccueil::class;
    }
    public function configureActions(Actions $actions): Actions
    {
        parent::configureActions($actions);
        $actions->disable('new','delete');
        return $actions;
    }

    public function configureFields(string $pageName): iterable
    {
        return [

                FormField::addPanel('Image gauche')->setCssClass(' field-form_panel col-6')
            ->setHelp("Image de gauche contenant du texte sur la page d'accueil"),
            TextField::new('texteGauche')->setLabel('Texte'),
            ImageField::new('imageGauche')->setLabel('Image')
                ->setBasePath('websiteImage/')
                ->setUploadDir('public/websiteImage/')
                ->setUploadedFileNamePattern("imageGauche.png")
                ->setRequired(false),
            ColorField::new('couleurGauche')->setLabel('Couleur du texte'),

            FormField::addPanel('Image droite')->setCssClass(' field-form_panel col-6')
                ->setHelp("Image de droite contenant du texte sur la page d'accueil"),
            TextField::new('texteDroite')->setLabel('Texte'),
            ImageField::new('imageDroite')->setLabel('Image')
                ->setBasePath('websiteImage/')
                ->setUploadDir('public/websiteImage/')
                ->setUploadedFileNamePattern("imageDroite.png")
                ->setRequired(false),
             ColorField::new('couleurDroite')->setLabel('Couleur du texte'),

             FormField::addPanel('Image Réalisations')->setCssClass(' field-form_panel col-6'),
            TextField::new('texteRealisations')->setLabel('Texte')->setHelp('Texte à afficher sous le titre de la page'),
            ImageField::new('imageRealisations')->setLabel('Image')
                ->setBasePath('websiteImage/')
                ->setUploadDir('public/websiteImage/')
                ->setUploadedFileNamePattern("realisation.jpg")
                ->setRequired(false),

             FormField::addPanel('Image Blogs')->setCssClass(' field-form_panel col-6'),
            TextField::new('texteBlogs')->setLabel('Texte')->setHelp('Texte à afficher sous le titre de la page'),
            ImageField::new('imageBlogs')->setLabel('Image')
                ->setBasePath('websiteImage/')
                ->setUploadDir('public/websiteImage/')
                ->setUploadedFileNamePattern("blog.jpg")
                ->setRequired(false),

            FormField::addPanel('Image Actualites')->setCssClass(' field-form_panel col-6'),
            TextField::new('texteActualites')->setLabel('Texte')->setHelp('Texte à afficher sous le titre de la page'),
            ImageField::new('imageActualites')->setLabel('Image')
                ->setBasePath('websiteImage/')
                ->setUploadDir('public/websiteImage/')
                ->setUploadedFileNamePattern("news.jpg")
                ->setRequired(false),

            FormField::addPanel('Image Contact')->setCssClass(' field-form_panel col-6'),
            TextField::new('texteContact')->setLabel('Texte')->setHelp('Texte à afficher sous le titre de la page'),
            ImageField::new('imageContact')->setLabel('Image')
                ->setBasePath('websiteImage/')
                ->setUploadDir('public/websiteImage/')
                ->setUploadedFileNamePattern("contact.jpg")
                ->setRequired(false)

        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setEntityLabelInPlural('Images du site')->setEntityLabelInSingular('Images du site');
    }

}
