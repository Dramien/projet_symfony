<?php

namespace App\Controller;

use App\Entity\Bien;
use App\Entity\User;
use App\Entity\Search;
use App\Form\SearchBienType;
use App\Form\BienType;
use App\Repository\BienRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/bien")
 */
class BienController extends AbstractController
{
    /**
     * @Route("/", name="bien_index", methods={"GET"})
     */
    public function index(BienRepository $bienRepository, Request $request, PaginatorInterface $paginator): Response
    {

        $search = new Search();
        $form = $this->createForm(SearchBienType::class, $search);
        $form->handleRequest($request);

        $query = $this->getDoctrine()->getRepository(Bien::class)->findPaginateBien($search);
        $requestedPage = $request->query->getInt('page', 1);
         
        // Pagination du tableau de users
        $biens = $paginator->paginate(
            $query,             // Requête créée précedemment
            $requestedPage,     // Numéro de la page demandée
            3              // Nombre de biens affichés par page
        );

        return $this->render('bien/index.html.twig', [
            'biens' => $biens,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/new", name="bien_new", methods={"GET","POST"})
     * @Security("is_granted('ROLE_USER')")
     */
    public function new(Request $request): Response
    {
        $bien = new Bien();
        $form = $this->createForm(BienType::class, $bien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $bien->getphotoFile()!=null) {
            $entityManager = $this->getDoctrine()->getManager();
            $bien-> setProprietaire($this->getUser());
            $entityManager->persist($bien);
            $entityManager->flush();

            return $this->redirectToRoute('bien_index');
        }

        return $this->render('bien/new.html.twig', [
            'bien' => $bien,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bien_show", methods={"GET"})
     */
    public function show(Bien $bien): Response
    {
        return $this->render('bien/show.html.twig', [
            'bien' => $bien,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bien_edit", methods={"GET","POST"})
     * @Security("is_granted('ROLE_USER')")
     */
    public function edit(Request $request, Bien $bien): Response
    {
        $user = $this ->getUser();

        if ( $user->isAdmin($user) || $bien->isProprietaire($user) ) { // si l'utilisateur est bien le propriétaire du bien

            $form = $this->createForm(BienType::class, $bien);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('bien_index');
            }

            return $this->render('bien/edit.html.twig', [
                'bien' => $bien,
                'form' => $form->createView(),
            ]);

        } else{
            $this->addFlash('success', 'Fuck');
            return $this->redirectToRoute('bien_index');

        }

    }

    /**
     * @Route("/{id}", name="bien_delete", methods={"DELETE"})
     * @Security("is_granted('ROLE_USER')")
     */
    public function delete(Request $request, Bien $bien): Response
    {

        $user = $this ->getUser();
        if ( ( $user->isAdmin($user) || $bien->isProprietaire($user) ) && $this->isCsrfTokenValid('delete'.$bien->getId(), $request->request->get('_token')) ) { // si l'utilisateur est bien le propriétaire du bien
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bien);
            $entityManager->flush();

        } return $this->redirectToRoute('bien_index');

    }

}
