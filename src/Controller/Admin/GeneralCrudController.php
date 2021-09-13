<?php

namespace App\Controller\Admin;

use App\Entity\General;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GeneralCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return General::class;
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
            FormField::addPanel('Images Générales du site')->setCssClass('field-form_panel col-6'),
            ImageField::new('logoSombre')
                ->setBasePath('images/upload/')
                ->setUploadDir('public/images/upload')
                ->setUploadedFileNamePattern("logo-dark.png")
                ->setRequired(false)
                ->setHelp('Ce logo sera utilisé pour les menu clairs (Ce logo doit donc avoir des textes noirs)')
                ->hideOnIndex(),
            ImageField::new('logoClair')
                ->setBasePath('images/upload/')
                ->setUploadDir('public/images/upload')
                ->setUploadedFileNamePattern("logo-light.png")
                ->setRequired(false)
                ->setHelp('Ce logo sera utilisé pour les menu sombres (Ce logo doit donc avoir des textes blancs)')
                ->hideOnIndex(),
            ImageField::new('logoPetit')
                ->setBasePath('images/upload/')
                ->setUploadDir('public/images/upload')
                ->setUploadedFileNamePattern("logo-petit.png")
                ->setRequired(false)
                ->setHelp("Ce logo sera utilisé sur les menus mobiles et dans l'icône du site. (Devrait contenir uniquement que le logo, sans texte associé)")
                ->hideOnIndex(),
            ImageField::new('imageAccueil')
                ->setBasePath('images/upload/')
                ->setUploadDir('public/images/upload')
                ->setRequired(false)
                ->setUploadedFileNamePattern('accueil.png')
                ->setHelp("La première image affichée sur la page d'accueil"),

            FormField::addPanel('Informations Générales du site')->setCssClass(' field-form_panel col-6'),
            TextField::new('adresseEmail')
                ->setRequired(false)
                ->setHelp("Cet email sera utilisé pour les messages clients venant du site"),
            TextField::new('nomEntreprise')
                ->setRequired(false)
                ->setHelp("Le nom d'entreprise sera utilisé partout sur le site."),
            TextField::new('telephone')
                ->setRequired(false)
                ->setHelp("Ce numéro de téléphone sera affiché dans le menu"),
            TextField::new('entrepriseDescription')->hideOnIndex()->setRequired(false),
            TextField::new('questionFooter')->hideOnIndex()->setRequired(false),
            TextField::new('descriptionQuestionFooter')->hideOnIndex()->setRequired(false),

            FormField::addPanel("Slider d'accueil")
            ->setHelp("Le slider d'accueil est le premier élément disponible sur la page d'accueil")
                ->setCssClass(' field-form_panel col-4'),

            ChoiceField::new('positionSloganAccueil')->setChoices(function(){
                return [
                    'Haut-Gauche' => 'slider-top text-left',
                    'Haut-Centre' => 'slider-top text-center',
                    'Haut-Droit' => 'slider-top text-right',
                    'Centre-Gauche' => 'text-left',
                    'Centre' => 'text-center',
                    'Centre-Droite' => 'text-right',
                    'Bas-Gauche' => 'slider-bottom text-left',
                    'Bas-Centre' => 'slider-bottom text-center',
                    'Bas-Droite' => 'slider-bottom text-right',
                ];
            })->hideOnIndex(),
            ChoiceField::new('policeGeneral')
                ->setChoices(function(){
                    return $this->getFonts();
                })
                ->setRequired(false)
                ->setHelp('Prévisualisez les polices sur <a target="_blank" href=https://fonts.google.com/> Google Fonts </a>')->hideOnIndex(),
            ChoiceField::new('policeTitres')
                ->setChoices(function(){
                    return $this->getFonts();
                })
                ->setRequired(false)
                ->setHelp('Prévisualisez les polices sur <a target="_blank" href=https://fonts.google.com/> Google Fonts </a>')->hideOnIndex(),
            TextField::new('slogan')
                ->setRequired(false)
                ->setHelp("Correspond a la phrase sur l'image d'accueil")->hideOnIndex(),
            TextField::new('sousTexteSlogan')
                ->setRequired(false)
                ->setHelp("La petite phrase à afficher en dessous du slogan principal")->hideOnIndex(),
            ColorField::new('couleurSlogan')
                ->setRequired(false)->hideOnIndex(),

            FormField::addPanel("Contenu accueil")->setCssClass(' field-form_panel col-8'),
            TextField::new('accueilTitreSection1')
            ->setLabel("Titre de la section 1 de l'accueil")->hideOnIndex(),
            TextEditorField::new('quiSommesNous')
                ->setLabel("Contenu de la section 1")
                ->addJsFiles('js/trixFileUpload.js')
                ->setRequired(false)
                ->setHelp("Le texte affiché dans la partie Qui Sommes Nous")->hideOnIndex(),
            ImageField::new('imageQuiSommesNous')
                ->setBasePath('images/upload/')
                ->setUploadDir('public/images/upload')
                ->setRequired(false)
                ->setUploadedFileNamePattern('quiSommesNous.png')->hideOnIndex()
                ->setLabel("Image de la section 1"),

            TextField::new('accueilTitreSection2')
            ->setLabel("Titre de la section 2 de l'accueil")->hideOnIndex(),

            TextEditorField::new('nosChiffresCles')
                ->setRequired(false)
                ->setHelp("Le texte affiché dans la partie Qui Sommes Nous")->hideOnIndex()
                ->setLabel("Contenu de la section 2"),

            ImageField::new('imageNosChiffresCles')
                ->setBasePath('images/upload/')
                ->setUploadDir('public/images/upload')
                ->setRequired(false)
                ->setLabel("Image de la section 2")
                ->setUploadedFileNamePattern('chiffresCles.png')->hideOnIndex(),




        ];
    }

    function getFonts() : array
    {
        $ch = curl_init("https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyCgtd44LCBKfwxsOtlqPi49NzTQ7Grp7UA");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $data = curl_exec($ch);
        curl_close($ch);
        $items = json_decode($data)->items;
        $choices = array_map(function($item){
            return $item->family;
        },$items);
        return array_combine($choices,$choices);
    }
}
