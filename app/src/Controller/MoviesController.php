<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    
    #[Route('/movies', name: 'app_movies')]
    public function index(): Response
    {
        $repository = $this->em->getRepository(Movie::class);
        $movies =  $repository->findAll();

        dd($movies);
    return $this->json($movies);
       
        // return $this->render('movies/index.html.twig', [
        //     'title' => 'Test Movie',
        // ]);
    }


    // #[Route('/movies/{id}', name: 'app_movies', defaults:['name' => null], methods:['GET', 'HEAD'])]
    // public function  movie($id): Response
    // {

    //     return $this->json([
    //         'message' => 'welcome '.$id.' movie controller',
    //         'path' => 'src/Controller/MoviesController.php'
    //     ]);
    // }
    
    /**
     * oldMethod
     *
     * @Route("/old", name="old")
     */
    public function oldMethod(): Response {
         return $this->json([
            'message' => 'welcome to old movie controller',
            'path' => 'src/Controller/MoviesController.php'
        ]);
    }
}
