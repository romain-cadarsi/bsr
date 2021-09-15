<?php

namespace App\Service;

use App\Repository\ArticleRepository;
use DateTime;
use Icamys\SitemapGenerator\SitemapGenerator;

class ArticleService{

    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository){
        $this->articleRepository = $articleRepository;
    }

    public function getAllRoutes(){
        $articleRoutes =  [];
        foreach ($this->articleRepository->findAll() as $article){
            array_push($articleRoutes,"/actualite/" . $article->getId());
        }
        return $articleRoutes;
    }

    public function generateSitemap(){
        $yourSiteUrl = $_SERVER['SERVER_NAME'];
        $outputDir = getcwd();
        $generator = new SitemapGenerator($yourSiteUrl, $outputDir);
        $generator->setMaxURLsPerSitemap(50000);
        $generator->setSitemapFileName("article_sitemap.xml");
        $generator->setSitemapIndexFileName("sitemap.xml");
        $generator->addURL($yourSiteUrl."/actualites",new DateTime(), 'always', 0.8);
        foreach ($this->getAllRoutes() as $route){
            $generator->addURL($route, new DateTime(), 'always', 0.7);
        }
        $generator->flush();
        $generator->finalize();
        $generator->updateRobots();
        $generator->submitSitemap();

        $sitemap = fopen("sitemap.xml",'w');
        $sitemap_content = '<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>https://'.$_SERVER['SERVER_NAME'].'/blog_sitemap.xml</loc>
    </sitemap>
    <sitemap>
           <loc>https://'.$_SERVER['SERVER_NAME'].'/article_sitemap.xml</loc>
    </sitemap>
</sitemapindex>';
        fwrite($sitemap,$sitemap_content);
        fclose($sitemap);
    }
}