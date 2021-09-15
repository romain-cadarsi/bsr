<?php
namespace App\Subscriber;

use App\Entity\Blog;
use App\Service\BlogService;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityDeletedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class BlogSubscriber implements EventSubscriberInterface
{
    private $blogService;

    public function __construct(BlogService $blogsService)
    {
        $this->blogService = $blogsService;
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

        if (!($result instanceof Blog)) {
            return;
        }
        $this->blogService->generateSitemap();

    }
}