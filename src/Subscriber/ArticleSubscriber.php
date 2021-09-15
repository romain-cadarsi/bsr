<?php
namespace App\Subscriber;

use App\Entity\Article;
use App\Service\ArticleService;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityDeletedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ArticleSubscriber implements EventSubscriberInterface
{
    private $articleService;

    public function __construct(ArticleService $articlesService)
    {
        $this->articleService = $articlesService;
    }

    public static function getSubscribedEvents()
    {
        return array(
            AfterEntityPersistedEvent::class => array('updateSitemap'),
            AfterEntityUpdatedEvent::class => array('updateSitemap'),
            AfterEntityDeletedEvent::class => array('updateSitemap'),
        );
    }

    function updateSitemap($event) {
        $result = $event->getEntityInstance();

        if (!($result instanceof Article)) {
            return;
        }
        $this->articleService->generateSitemap();

    }
}