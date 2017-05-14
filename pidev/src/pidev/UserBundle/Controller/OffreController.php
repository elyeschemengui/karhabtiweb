<?php

namespace pidev\UserBundle\Controller;

use pidev\UserBundle\Entity\Offre;
use pidev\UserBundle\Form\OffreType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Offre controller.
 *
 */
class OffreController extends Controller
{
    /**
     * Lists all offre entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $offres = $em->getRepository('pidevUserBundle:Offre')->findByEtat('1');
        if ($request->isMethod('post')){
        $offre=$request->get('offre');
            $recherche=$em->getRepository('pidevUserBundle:Offre')->findOffreDQL($offre);

            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate(  $recherche, /* query NOT result */
                $request->query->getInt('page', 1)/*page number*/,
                4/*limit per page*/
            );

            return $this->render('offre/index.html.twig', array(
                'offres' => $pagination));
        }
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(  $offres, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            4/*limit per page*/
        );

        return $this->render('offre/index.html.twig', array(
            'offres' => $pagination
        ));
    }
    public function index2Action(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $offres = $em->getRepository('pidevUserBundle:Offre')->findBy(array('membre_id'=>$this->getUser()));
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(  $offres, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            4/*limit per page*/
        );

        return $this->render('offre/index2.html.twig', array(
            'offres' => $pagination
        ));
    }

    /**l
     * Creates a new offre entity.
     *
     */
    public function newAction(Request $request)
    {
        $offre = new Offre();
        $form = $this->createForm('pidev\UserBundle\Form\OffreType', $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file=$form['photo']->getData();
            $fileName=md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('upload'),$fileName
            );
            $em=$this->getDoctrine()->getManager();

            $offre->setPhoto($fileName);
            $offre->setMembreId($this->getUser());

            $em->persist($offre);
            $em->flush();

            return $this->redirectToRoute('offre_show', array('id' => $offre->getId()));
        }

        return $this->render('offre/new.html.twig', array(
            'offre' => $offre,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a offre entity.
     *
     */
    public function showAction(Offre $offre)
    {
        $deleteForm = $this->createDeleteForm($offre);

        return $this->render('offre/show.html.twig', array(
            'offre' => $offre,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing offre entity.
     *
     */
    public function editAction(Request $request, Offre $offre)
    {
        $deleteForm = $this->createDeleteForm($offre);
        $editForm = $this->createForm('pidev\UserBundle\Form\OffreType', $offre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $file=$editForm['photo']->getData();
            $fileName=md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('upload'),$fileName
            );
            $em=$this->getDoctrine()->getManager();

            $offre->setPhoto($fileName);

            $em->persist($offre);
            $em->flush();

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('offre_show', array('id' => $offre->getId()));
        }

        return $this->render('offre/edit.html.twig', array(
            'offre' => $offre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a offre entity.
     *
     */
    public function deleteAction(Request $request, Offre $offre)
    {
        $form = $this->createDeleteForm($offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($offre);
            $em->flush();
        }

        return $this->redirectToRoute('offre_index');
    }
    public function deletevalidationAction($id){
        $em=$this->getDoctrine()->getManager();
        $offre=$em->getRepository('pidevUserBundle:Offre')->find($id);
        $em->remove($offre);
        $em->flush();
        return $this->redirectToRoute('afficheOffre');
    }

    /**
     * Creates a form to delete a offre entity.
     *
     * @param Offre $offre The offre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Offre $offre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('offre_delete', array('id' => $offre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    public function afficheOffreAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $offres = $em->getRepository('pidevUserBundle:Offre')->findBy(array('etat'=>'0'));
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(  $offres, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            4/*limit per page*/
        );

        return $this->render('@FOSUser/Admin/validationOffre.html.twig', array(
            'offres' => $pagination,
        ));
    }

    public function validAction($id)
    {
        var_dump('lol');
        $em=$this->getDoctrine()->getManager();
        $promos = $em->getRepository("pidevUserBundle:Offre")->find($id);
        $promos->setEtat('1');
        $em->persist($promos);
        $em->flush();
        return $this->redirectToRoute("afficheOffre");
    }
    public function afficheOffre2Action(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $offres = $em->getRepository('pidevUserBundle:Offre')->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(  $offres, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            4/*limit per page*/
        );

        return $this->render('@FOSUser/Admin/listoffres.twig', array(
            'offres' => $pagination,
        ));
    }
    public function afficheusers2Action(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('pidevUserBundle:User')->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(  $users, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            4/*limit per page*/
        );

        return $this->render('@FOSUser/Admin/listusers.html.twig', array(
            'users' => $pagination,
        ));
    }

    public function deleteUserAction($id){
        $em=$this->getDoctrine()->getManager();
        $user=$em->getRepository('pidevUserBundle:User')->find($id);
        $em->remove($user);
        $em->flush();
        return $this->redirectToRoute('afficheTouteUsers');
    }







}
