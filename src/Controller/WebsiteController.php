<?php

namespace App\Controller;

use App\Repository\ActualiteRepository;
use App\Repository\ArticleRepository;
use App\Repository\BlogRepository;
use App\Repository\ClientRepository;
use App\Repository\CookiesRepository;
use App\Repository\EmplacementRepository;
use App\Repository\GeneralRepository;
use App\Repository\ImagesAccueilRepository;
use App\Repository\MentionsLegalesRepository;
use App\Repository\NosGarantiesRepository;
use App\Repository\PolitiqueDeConfidentialiteRepository;
use App\Repository\RealisationRepository;
use App\Repository\TemoignageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class WebsiteController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(NosGarantiesRepository $nosGarantiesRepository, GeneralRepository $generalRepository,RealisationRepository $realisationRepository, ArticleRepository $articleRepository, ActualiteRepository $actualiteRepository,ClientRepository $clientRepository,TemoignageRepository $temoignageRepository,ImagesAccueilRepository $imageAccueilRepository): Response
    {
        $generalItem = $generalRepository->find(1);
        $realisations = $realisationRepository->findAll();
        $allActualites = $actualiteRepository->findAll();
        $allArticles = $articleRepository->findAll();
        $allClient = $clientRepository->findAll();
        $allTemoignages = $temoignageRepository->findAll();
        $allEngagements = $nosGarantiesRepository->findAll();
        $imagesAccueil = $imageAccueilRepository->find(1);
        return $this->render('pages/home.html.twig', [
            "general" => $generalItem,
            'realisations' => array_reverse($realisations),
            'actualites' => array_reverse($allActualites),
            'clients' => array_reverse($allClient),
            'temoignages' => array_reverse($allTemoignages),
            'articles' => array_reverse($allArticles),
            'engagements' => $allEngagements,
            "imageAccueil" => $imagesAccueil
        ]);
    }

    /**
     * @Route("/realisations", name="realisations")
     */
    public function realisation(RealisationRepository $realisationRepository,ClientRepository $clientRepository): Response
    {
        $realisations = $realisationRepository->findAll();
        $allClient = $clientRepository->findAll();
        return $this->render('pages/realisations.html.twig', [
            'realisations' => $realisations,
            'clients' => $allClient
        ]);
    }
    /**
     * @Route("/blogs", name="blogs")
     */
    public function blogs(BlogRepository $blogRepository, GeneralRepository $generalRepository): Response
    {
        $allBlogs = $blogRepository->findAll();
        $general = $generalRepository->find(1);
        $allBlogs = array_reverse($allBlogs);
        return $this->render('pages/blogs.html.twig', [
            'blogs' => $allBlogs,
            'general' => $general
        ]);
    }

    /**
     * @Route("/actualites", name="actualites")
     */
    public function articles(ArticleRepository $articleRepository, GeneralRepository $generalRepository): Response
    {
        $allArticles = $articleRepository->findAll();
        $general = $generalRepository->find(1);
        $allArticles = array_reverse($allArticles);
        return $this->render('pages/articles.html.twig', [
            'articles' => $allArticles,
            'general' => $general
        ]);
    }

    /**
     * @Route("/social", name="social")
     */
    public function actualites(ActualiteRepository $actualiteRepository): Response
    {
        $allActualites = $actualiteRepository->findAll();
        return $this->render('pages/social.html.twig', [
            'actualites' => array_reverse($allActualites),
        ]);
    }

    /**
     * @Route("/cookies", name="cookies")
     */
    public function cookies(CookiesRepository $cookieRepo): Response
    {
        $cookie = $cookieRepo->find(1);
        return $this->render('pages/cookies.html.twig', [
            'cookies' => $cookie,
        ]);
    }

    /**
     * @Route("/mentions-legales", name="mentionsLegales")
     */
    public function mentionsLegales(MentionsLegalesRepository $mentionsLegalesRepository): Response
    {
        $mentionsLegales = $mentionsLegalesRepository->find(1);
        return $this->render('pages/mentionsLegales.html.twig', [
            'mentionsLegales' => $mentionsLegales,
        ]);
    }

    /**
     * @Route("/politique-de-confidentialite", name="politiqueDeConfidentialite")
     */
    public function politiqueDeConfidentialite(PolitiqueDeConfidentialiteRepository $PolitiqueDeConfidentialiteRepository): Response
    {
        $pdc = $PolitiqueDeConfidentialiteRepository->find(1);
        return $this->render('pages/pdc.html.twig', [
            'pdc' => $pdc,
        ]);
    }

    /**
     * @Route("/blog/{id}", name="blog", methods={"GET"})
     */
    public function blog(BlogRepository $blogRepository, GeneralRepository $generalRepository,int $id): Response
    {
        $blog = $blogRepository->find($id);
        $general = $generalRepository->find(1);
        $nextBlog = $blogRepository->find($blog->getId() +1);
        $previousBlog = $blogRepository->find($blog->getId() -1);
        $otherBlogs = $blogRepository->findBy([],[],3);
        return $this->render('pages/blog.html.twig', [
            'blog' => $blog,
            'general' => $general,
            'nextBlog' => $nextBlog,
            'previousBlog' => $previousBlog,
            'otherBlogs' => $otherBlogs
        ]);
    }

    /**
     * @Route("/actualite/{id}", name="actualite", methods={"GET"})
     */
    public function actualite(ArticleRepository $articleRepository, GeneralRepository $generalRepository,int $id): Response
    {
        $article = $articleRepository->find($id);
        $general = $generalRepository->find(1);
        $nextArticle = $articleRepository->find($article->getId() +1);
        $previousArticle = $articleRepository->find($article->getId() -1);
        $otherArticles = $articleRepository->findBy([],[],3);
        return $this->render('pages/article.html.twig', [
            'article' => $article,
            'general' => $general,
            'nextArticle' => $nextArticle,
            'previousArticle' => $previousArticle,
            'otherArticles' => $otherArticles
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(EmplacementRepository $emplacementRepository,Request $request,MailerInterface $mailer,GeneralRepository $repository): Response
    {
        if($request->isMethod('POST')){
            $name = $request->get('widget-contact-form-name');
            $mail = $request->get('widget-contact-form-email');
            $phone = $request->get('widget-contact-form-phone');
            $message = $request->get('widget-contact-form-message');
            $entrepriseName = $repository->find(1)->getNomEntreprise();

            $email = (new Email())
                ->from('energie@clearnetgroup.fr')
                ->subject("[$entrepriseName] Nouveau message Client")
                ->html("Vous avez reçu un nouveau message de la part de $name. <b>Vous pourrez le recontacter sur son adresse mail <a href='mailto:$mail'> $mail</a> ou sur son numéro de téléphone : $phone . <br> <br><br> <b>$message<b>")
                ->to($repository->find(1)->getAdresseEmail());
            $email->ensureValidity();
            $mailer->send($email);

            return new JsonResponse(['response' => 'success',"message" => 'message envoyé']);
        }
        else{
            $allEmplacements = $emplacementRepository->findAll();
            return $this->render('pages/contact.html.twig', [
                'emplacements' => array_reverse($allEmplacements),
            ]);
        }

    }



}
