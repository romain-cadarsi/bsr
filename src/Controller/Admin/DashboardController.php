<?php

namespace App\Controller\Admin;

use App\Entity\Actualite;
use App\Entity\Article;
use App\Entity\Blog;
use App\Entity\CategorieRealisation;
use App\Entity\Cookies;
use App\Entity\Emplacement;
use App\Entity\General;
use App\Entity\ImagesAccueil;
use App\Entity\MentionsLegales;
use App\Entity\NosGaranties;
use App\Entity\PolitiqueDeConfidentialite;
use App\Entity\Realisation;
use App\Entity\Temoignage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/home.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Www');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linktoDashboard('Dashboard', 'fa fa-home'),
            MenuItem::linkToCrud('General', 'fa fa-gears', General::class),
            MenuItem::linkToCrud('Images accueil', 'fa fa-images', ImagesAccueil::class),
            MenuItem::linkToCrud('Blogs', 'fa fa-blog', Blog::class),
            MenuItem::linkToCrud('Clients', 'fa fa-user', \App\Entity\Client::class),
            MenuItem::linkToCrud('Emplacements', 'fa fa-map-marker', Emplacement::class),
            MenuItem::subMenu('Réalisations', 'fa fa-briefcase')->setSubItems([
                MenuItem::linkToCrud('Réalisation', 'fa fa-briefcase', Realisation::class),
                MenuItem::linkToCrud('Catégories de réalisations', 'fa fa-folder', CategorieRealisation::class),
            ]),
            MenuItem::linkToCrud('Témoignages', 'fa fa-file', Temoignage::class),
            MenuItem::linkToCrud('Nos Garanties', 'fa fa-check', NosGaranties::class),
            MenuItem::linkToCrud('Lien sociaux', 'fa fa-share-alt', Actualite::class),
            MenuItem::linkToCrud('Actualités', 'fa fa-newspaper', Article::class),
            MenuItem::subMenu('RGPD' , 'fa fa-globe')->setSubItems([
                MenuItem::linkToCrud('Cookies', 'fa fa-cogs', Cookies::class),
                MenuItem::linkToCrud('Politique de confidentialité', 'fa fa-cogs', PolitiqueDeConfidentialite::class),
                MenuItem::linkToCrud('Mentions légales', 'fa fa-cogs', MentionsLegales::class),
            ])
        ];


    }
}
