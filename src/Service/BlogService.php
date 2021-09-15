<?php

namespace App\Service;

use App\Repository\BlogRepository;
use DateTime;
use Icamys\SitemapGenerator\SitemapGenerator;

class BlogService{

    private $blogRepository;

    public function __construct(BlogRepository $blogRepository,){
        $this->blogRepository = $blogRepository;
    }

    public function getAllRoutes(){
        $blogRoutes =  [];
        foreach ($this->blogRepository->findAll() as $blog){
            array_push($blogRoutes,"/blog/" . $blog->getId());
        }
        return $blogRoutes;
    }

    public function generateSitemap(){
        $yourSiteUrl = $_SERVER['SERVER_NAME'];
        $outputDir = getcwd();
        $generator = new SitemapGenerator($yourSiteUrl, $outputDir);
        $generator->setMaxURLsPerSitemap(50000);
        $generator->setSitemapFileName("blog_sitemap.xml");
        $generator->setSitemapIndexFileName("sitemap.xml");
        $generator->addURL($yourSiteUrl."/blogs",new DateTime(), 'always', 0.7);
        $generator->addURL($yourSiteUrl."/",new DateTime(), 'always', 1);
        $generator->addURL($yourSiteUrl."/realisations",new DateTime(), 'always', 0.8);
        $generator->addURL($yourSiteUrl."/contact",new DateTime(), 'always', 0.8);
        $generator->addURL($yourSiteUrl."/mentions-legales",new DateTime(), 'always', 0.5);
        $generator->addURL($yourSiteUrl."/cookies",new DateTime(), 'always', 0.5);
        $generator->addURL($yourSiteUrl."/politique-de-confidentialite",new DateTime(), 'always', 0.5);

        foreach ($this->getAllRoutes() as $route){
            $generator->addURL($route, new DateTime(), 'always', 0.7);
        }
        $generator->flush();
        $generator->finalize();
        $generator->updateRobots();
        $generator->submitSitemap();
    }
}