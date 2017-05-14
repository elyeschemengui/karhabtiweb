<?php

namespace pidev\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class niveauUNController extends Controller
{

    public function question1Nv1Action(Request $request)
    {
        $id=1;
        $em = $this->getDoctrine()->getManager();
        $Resultat = $em->getRepository('pidevUserBundle:resultat')->find($id);
        $qu = $em->getRepository('pidevUserBundle:mesTests')->findBy(array('niveau' => '1'));
        if ($request->isMethod('post'))
        {
            $tempTot = $this->container->getParameter('temptotNv1');
            $totsucc = $this->container->getParameter('totalNv1');
            $totechec = $this->container->getParameter('temptot2Nv1');
            foreach ($qu as $item)
                {
                    $response_custom = $request->get($item->getId());
                    if ($response_custom == $item->getReponse())
                        {
                            $tempTot++;
                        }
                }
                     if ($tempTot > 2)
                        {
                            $totsucc++;
                            $Resultat->setReponseSucces($Resultat->getReponseSucces()+$totsucc);
                            $em->persist($Resultat);
                            $em->flush();
                            return $this->redirectToRoute('Resultat_Succes_niveau1');
                        }
                        if ($tempTot <= 2)
                        {
                            $totechec++;
                            $Resultat->setReponseEchec($Resultat->getReponseEchec()+$totechec);
                            $em->persist($Resultat);
                            $em->flush();
                            return $this->redirectToRoute('Resultat_Echec_niveau1');
                        }
        }
            return $this->render('@pidevUser/CodeDeLaRoute/niveau1/question1.html.twig', array("test" => $qu));


    }
    public function question1Nv2Action(Request $request)
    {
        $id=2;
        $em = $this->getDoctrine()->getManager();
        $Resultat = $em->getRepository('pidevUserBundle:resultat')->find($id);
        $qu = $em->getRepository('pidevUserBundle:mesTests')->findBy(array('niveau' => '2'));
        if ($request->isMethod('post'))
        {
            $tempTot = $this->container->getParameter('temptotNv2');
            $totsucc = $this->container->getParameter('totalNv2');
            $totechec = $this->container->getParameter('temptot2Nv2');
            foreach ($qu as $item)
            {
                $response_custom = $request->get($item->getId());
                if ($response_custom == $item->getReponse())
                {
                    $tempTot++;
                }
            }
            if ($tempTot > 2)
            {
                $totsucc++;
                $Resultat->setReponseSucces($Resultat->getReponseSucces()+$totsucc);
                $em->persist($Resultat);
                $em->flush();
                return $this->redirectToRoute('Resultat_Succes_niveau2');
            }
            if ($tempTot <= 2)
            {
                $totechec++;
                $Resultat->setReponseEchec($Resultat->getReponseEchec()+$totechec);
                $em->persist($Resultat);
                $em->flush();
                return $this->redirectToRoute('Resultat_Echec_niveau2');
            }
        }
        return $this->render('@pidevUser/CodeDeLaRoute/niveau2/question1.html.twig',array("test"=>$qu));
    }
    public function question1Nv3Action(Request $request)
    {
        $id=3;
        $em = $this->getDoctrine()->getManager();
        $Resultat = $em->getRepository('pidevUserBundle:resultat')->find($id);
        $qu = $em->getRepository('pidevUserBundle:mesTests')->findBy(array('niveau' => '3'));
        if ($request->isMethod('post'))
        {
            $tempTot = $this->container->getParameter('temptotNv3');
            $totsucc = $this->container->getParameter('totalNv3');
            $totechec = $this->container->getParameter('temptot2Nv3');
            foreach ($qu as $item)
            {
                $response_custom = $request->get($item->getId());
                if ($response_custom == $item->getReponse())
                {
                    $tempTot++;

                }
            }
            if ($tempTot > 2)
            {
                $totsucc++;

                $Resultat->setReponseSucces($Resultat->getReponseSucces()+$totsucc);
                $em->persist($Resultat);
                $em->flush();
                return $this->redirectToRoute('Resultat_Succes_niveau3');
            }
            if ($tempTot <= 2)
            {
                $totechec++;

                $Resultat->setReponseEchec($Resultat->getReponseEchec()+$totechec);
                $em->persist($Resultat);
                $em->flush();
                return $this->redirectToRoute('Resultat_Echec_niveau3');
            }
        }
            return $this->render('@pidevUser/CodeDeLaRoute/niveau3/question1.html.twig', array("test" => $qu));
    }
    public function question1Nv4Action(Request $request)
    {

        $id=4;
        $em = $this->getDoctrine()->getManager();
        $Resultat = $em->getRepository('pidevUserBundle:resultat')->find($id);
        $qu = $em->getRepository('pidevUserBundle:mesTests')->findBy(array('niveau' => '1'));
        if ($request->isMethod('post'))
        {
            $tempTot = $this->container->getParameter('temptotNv4');
            $totsucc = $this->container->getParameter('totalNv4');
            $totechec = $this->container->getParameter('temptot2Nv4');
            foreach ($qu as $item)
            {
                $response_custom = $request->get($item->getId());
                if ($response_custom == $item->getReponse())
                {
                    $tempTot++;
                }
            }
            if ($tempTot > 2)
            {
                $totsucc++;
                $Resultat->setReponseSucces($Resultat->getReponseSucces()+$totsucc);
                $em->persist($Resultat);
                $em->flush();
                return $this->redirectToRoute('Resultat_Succes_niveau4');
            }
            if ($tempTot <= 2)
            {
                $totechec++;
                $Resultat->setReponseEchec($Resultat->getReponseEchec()+$totechec);
                $em->persist($Resultat);
                $em->flush();
                return $this->redirectToRoute('Resultat_Echec_niveau4');
            }
        }
            return $this->render('@pidevUser/CodeDeLaRoute/niveau4/question1.html.twig', array("test" => $qu));
    }
    public function question1Nv5Action(Request $request)
    {
        $id=5;
        $em = $this->getDoctrine()->getManager();
        $Resultat = $em->getRepository('pidevUserBundle:resultat')->find($id);
        $qu = $em->getRepository('pidevUserBundle:mesTests')->findBy(array('niveau' => '2'));
        if ($request->isMethod('post'))
        {
            $tempTot = $this->container->getParameter('temptotNv5');
            $totsucc = $this->container->getParameter('totalNv5');
            $totechec = $this->container->getParameter('temptot2Nv5');
            foreach ($qu as $item)
            {
                $response_custom = $request->get($item->getId());
                if ($response_custom == $item->getReponse())
                {
                    $tempTot++;
                }
            }
            if ($tempTot > 2)
            {
                $totsucc++;
                $Resultat->setReponseSucces($Resultat->getReponseSucces()+$totsucc);
                $em->persist($Resultat);
                $em->flush();
                return $this->redirectToRoute('Resultat_Succes_niveau5');
            }
            if ($tempTot <= 2)
            {
                $totechec++;
                $Resultat->setReponseEchec($Resultat->getReponseEchec()+$totechec);
                $em->persist($Resultat);
                $em->flush();
                return $this->redirectToRoute('Resultat_Echec_niveau5');
            }
        }
        return $this->render('@pidevUser/CodeDeLaRoute/niveau5/question1.html.twig',array("test"=>$qu));

    }
    public function question1Nv6Action(Request $request)
    {
        $id=6;
        $em = $this->getDoctrine()->getManager();
        $Resultat = $em->getRepository('pidevUserBundle:resultat')->find($id);
        $qu = $em->getRepository('pidevUserBundle:mesTests')->findBy(array('niveau' => '3'));
        if ($request->isMethod('post'))
        {
            $tempTot = $this->container->getParameter('temptotNv6');
            $totsucc = $this->container->getParameter('totalNv6');
            $totechec = $this->container->getParameter('temptot2Nv6');
            foreach ($qu as $item)
            {
                $response_custom = $request->get($item->getId());
                if ($response_custom == $item->getReponse())
                {
                    $tempTot++;
                }
            }
            if ($tempTot > 2)
            {
                $totsucc++;
                $Resultat->setReponseSucces($Resultat->getReponseSucces()+$totsucc);
                $em->persist($Resultat);
                $em->flush();
                return $this->redirectToRoute('Resultat_Succes_niveau6');
            }
            if ($tempTot <= 2)
            {
                $totechec++;
                $Resultat->setReponseEchec($Resultat->getReponseEchec()+$totechec);
                $em->persist($Resultat);
                $em->flush();
                return $this->redirectToRoute('Resultat_Echec_niveau6');
            }
        }
        return $this->render('@pidevUser/CodeDeLaRoute/niveau6/question1.html.twig',array("test"=>$qu));
    }
}
