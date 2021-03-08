<?php

namespace App\Controller\Admin;

use App\Entity\Actualite;
use App\Entity\Blog;
use App\Entity\Emplacement;
use App\Entity\General;
use App\Entity\Realisation;
use App\Entity\Temoignage;
use App\Repository\BlogRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use http\Client;
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
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('General', 'fa fa-gears', General::class);
        yield MenuItem::linkToCrud('Blogs', 'fa fa-blog', Blog::class);
        yield MenuItem::linkToCrud('Clients', 'fa fa-user', \App\Entity\Client::class);
        yield MenuItem::linkToCrud('Emplacements', 'fa fa-map-marker', Emplacement::class);
        yield MenuItem::linkToCrud('Réalisation', 'fa fa-briefcase', Realisation::class);
        yield MenuItem::linkToCrud('Témoignages', 'fa fa-file', Temoignage::class);
        yield MenuItem::linkToCrud('Actualités', 'fa fa-newspaper', Actualite::class);
    }
}
