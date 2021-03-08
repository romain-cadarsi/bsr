<?php

namespace App\Controller;

use App\Repository\ActualiteRepository;
use App\Repository\BlogRepository;
use App\Repository\ClientRepository;
use App\Repository\EmplacementRepository;
use App\Repository\GeneralRepository;
use App\Repository\RealisationRepository;
use App\Repository\TemoignageRepository;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\DependencyInjection\Compiler\RegisterEntryPointPass;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class WebsiteController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(GeneralRepository $generalRepository,RealisationRepository $realisationRepository, ActualiteRepository $actualiteRepository,ClientRepository $clientRepository,TemoignageRepository $temoignageRepository): Response
    {
        $generalItem = $generalRepository->find(1);
        $realisations = $realisationRepository->findAll();
        $allActualites = $actualiteRepository->findAll();
        $allClient = $clientRepository->findAll();
        $allTemoignages = $temoignageRepository->findAll();
        return $this->render('pages/home.html.twig', [
            "general" => $generalItem,
            'realisations' => array_reverse($realisations),
            'actualites' => array_reverse($allActualites),
            'clients' => array_reverse($allClient),
            'temoignages' => array_reverse($allTemoignages)
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
     * @Route("/contact", name="contact")
     */
    public function contact(EmplacementRepository $emplacementRepository,Request $request,MailerInterface $mailer,GeneralRepository $repository): Response
    {
        if($request->isMethod('POST')){
            $name = $request->get('widget-contact-form-name');
            $mail = $request->get('widget-contact-form-email');
            $phone = $request->get('widget-contact-form-phone');
            $subject = $request->get('widget-contact-form-subject');
            $message = $request->get('widget-contact-form-message');
            $entrepriseName = $repository->find(1)->getNomEntreprise();

            $email = (new Email())
                ->from('energie@clearnetgroup.fr')
                ->subject("[$entrepriseName] " . $subject)
                ->html("Vous avez reçu un nouveau message de la part de $name. <b>Vous pourrez le recontacter sur son adresse mail <a href='mailto:$mail'> $mail</a> ou sur son numéro de téléphone : $phone . <br> <h2> A propos de : $subject </h2> <br><br> <b>$message<b>")
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
