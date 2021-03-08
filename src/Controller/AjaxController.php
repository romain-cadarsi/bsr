<?php

namespace App\Controller;

use App\Repository\RealisationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Annotation\Route;

class AjaxController extends AbstractController
{
    /**
     * @Route("/realisation/more", name="realisationAjax")
     */
    public function realisationMore(RealisationRepository $realisationRepository,Request $request): Response
    {
        $realisation = $realisationRepository->find($request->get('realisation'));
        return $this->render('ajax/realisation.html.twig', [
            'realisation' => $realisation
        ]);
    }

    /**
     * @Route("/imagesPost", name="imagePost")
     */
    public function imagePost(Request $request,KernelInterface $kernel): Response
    {
        $image = $kernel->getProjectDir().'/public/' .$request->get("key");
        if (move_uploaded_file($_FILES['file']['tmp_name'], $image)) {
            $mess =  "File is valid, and was successfully uploaded.\n";
        } else {
            $mess =  "Possible file upload attack!\n";
        }
        return new Response($mess);
    }
}
