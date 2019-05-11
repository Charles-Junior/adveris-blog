<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Articles;
use App\Repository\ArticlesRepository;
use App\Repository\CategoriesRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ArticleType;
use Symfony\Component\Validator\Constraints\DateTime;

class ListController extends AbstractController
{
    public $article;
    public $categorie;

    public function __construct(ArticlesRepository $article, CategoriesRepository $categorie)
    {
        $this->article = $article;
        $this->categorie = $categorie;
    }


    /**
     * @Route("/", name="list")
     */
    public function index()
    {   

        $articles = $this->article->findAll();
        $categories = $this->categorie->findAll();

        return $this->render('pages/index.html.twig', [
            'articles' => $articles,
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/details/{id}", name="details")
     */
    public function details($id)
    {   

        $articles = $this->article->find($id);

        return $this->render('pages/details.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/ajout", name="ajout")
     */
    public function ajout(Request $request)
    {      
        $em = $this->getDoctrine()->getManager();
        $article = new Articles();

        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

              $article -> setDate(new \DateTime());
              $em->persist($article);
              $em->flush();
 
             return $this->redirectToRoute('list');
        }

        return $this->render('pages/ajout.html.twig', ['form'=>$form->createView()]);

    }

     /**
     * @Route("/categorie/{id}", name="tri")
     */
    public function tri($id)
    {      
        $categories = $this->categorie->findAll();
        $categories2 = $this->categorie->find($id);

        $articles = $this->article-> findBy(['categories' => $categories2]);

        return $this->render('pages/index.html.twig', [
            'articles' => $articles,
            'categories' => $categories
        ]);

    }

    /**
     * @Route("/modifier/{id}", name="modifier")
     */
    public function update(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $articles = $this->article-> find($id);          

        $form = $this->createForm(ArticleType::class, $articles);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
     
              $em->flush();
 
             return $this->redirectToRoute('list');
        }

        return $this->render('pages/modifier.html.twig', [
            'form'=>$form->createView(),
            'articles'=>$articles
            ]);
    }
}
