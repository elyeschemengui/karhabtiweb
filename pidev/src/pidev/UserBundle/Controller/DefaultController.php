<?php

namespace pidev\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('pidevUserBundle:Default:index.html.twig');
    }
    public function home2Action()
    {
        $em=$this->getDoctrine()->getManager();
        $new = $em->getRepository('pidevUserBundle:Offre')->findBy(array(), array('tauxRemise' => 'DESC'));
        return $this->render('base.html.twig',array('new'=>$new));
    }
    public function contactAction()
    {
        return $this->render('pidevUserBundle:Default:contact.html.twig');
    }

    public function produitAction()
    {
        return $this->render('pidevUserBundle:Default:produit.html.twig');
    }

    public function checkAction(Request $request){
        if ($this->isGranted('ROLE_ADMIN')){
            return $this->redirectToRoute('homeAdmin');
        }else
            return $this->redirectToRoute('fos_user_profile_show');


        return $this->render('@FOSUser/Default/check.html.twig');
    }
    public function editProfileAction()
    {
        return $this->render('pidevUserBundle:Profile:editProfile.html.twig');
    }
    public function homeAction( Request $request)

    {

        $em2 = $this->getDoctrine()->getManager()->getRepository('pidevUserBundle:Annonces')->findAll();
        $emm=$this->getDoctrine()->getManager();
        $new = $emm->getRepository('pidevUserBundle:Offre')->findBy(array(), array('tauxRemise' => 'DESC'));

        foreach ($em2 as $i) {
            $d = $i->getDate();
            $t = date('Y-m-d');
            $dd = new \DateTime($t);
            $nn = (int)$d->diff($dd)->format("%a");
            if ($nn > 50) {
                $en = $this->getDoctrine()->getManager();
                $en->remove($i);
                $en->flush();
            }
        }


        $em=$this->getDoctrine()->getManager();
        if($request->isMethod('post')){
            $titre1=$request->get('titre');
            $search1 = $em->getRepository('pidevUserBundle:Annonces')->findAnnonce1DQL($titre1);
            $annonces=$em->getRepository('pidevUserBundle:Annonces')->findBy(array('VALIDATION'=>'1'));
            $hot=$em->getRepository('pidevUserBundle:Annonces')->findBy(array('VALIDATION'=>'1'),array('PRIX'=>'DESC'));
            $annoncesold=$em->getRepository('pidevUserBundle:Annonces')->findBy(array('VALIDATION'=>'1'),array('date'=>'ASC'));
            $annoncesnew=$em->getRepository('pidevUserBundle:Annonces')->findBy(array('VALIDATION'=>'1'),array('date'=>'DESC'));
            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate($search1, /* query NOT result */
                $request->query->getInt('page', 1)/*page number*/,
                9/*limit per page*/
            );
            return $this->render('base.html.twig',array('annonces'=>$annonces,'annoncesnew'=>$annoncesnew,'annoncesold'=>$annoncesold,'hot'=>$hot,'titre1'=>$pagination));

        }
        $annonces=$em->getRepository('pidevUserBundle:Annonces')->findBy(array('VALIDATION'=>'1'));
        $hot=$em->getRepository('pidevUserBundle:Annonces')->findBy(array('VALIDATION'=>'1'),array('PRIX'=>'DESC'));
        $annoncesold=$em->getRepository('pidevUserBundle:Annonces')->findBy(array('VALIDATION'=>'1'),array('date'=>'ASC'));
        $annoncesnew=$em->getRepository('pidevUserBundle:Annonces')->findBy(array('VALIDATION'=>'1'),array('date'=>'DESC'));
        $titre1=null;

        return $this->render('base.html.twig',array('annonces'=>$annonces,'new'=>$new,'annoncesnew'=>$annoncesnew,'annoncesold'=>$annoncesold,'hot'=>$hot,'titre1'=>$titre1));
    }
}
