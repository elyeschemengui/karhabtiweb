<?php

namespace pidev\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }
    public function homeAdminAction()
    {
        return $this->render('pidevUserBundle:Admin:home.html.twig');
    }
    public function userProfileAction()
    {
        return $this->render('pidevUserBundle:Admin:userProfile.html.twig');
    }
    public function loginAction()
    {
        return $this->render('pidevUserBundle:Admin:login.html.twig');
    }
    public function usersAction()
    {
        $em=$this->getDoctrine()->getManager();
        $user=$em->getRepository('pidevUserBundle:User')->findAll();
        return $this->render('pidevUserBundle:Admin:users.html.twig',array('userlist'=>$user));
    }
    public function deleteAction($id)
    {
        $em =$this->getDoctrine()->getManager();
        $user = $em->getRepository("pidevUserBundle:User")->find($id);
        $em->remove($user);
        $em->flush();
        return $this->redirectToRoute("users");
    }
}
