<?php

namespace pidev\UserBundle\Controller;

use Ob\HighchartsBundle\Highcharts\Highchart;
use pidev\UserBundle\Entity\mesTests;
use pidev\UserBundle\Form\mesTestsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CodeRouteController extends Controller
{
    public function ListerAction()
    {
        $em=$this->getDoctrine()->getManager();
        $test=$em->getRepository('pidevUserBundle:mesTests')->findAll();
        return $this->render('@pidevUser/Admin/codeRoute/listerTests.html.twig',array('listTests'=>$test));
    }
    public function ModifierAction()
    {
        $em=$this->getDoctrine()->getManager();
        $test=$em->getRepository('pidevUserBundle:mesTests')->findAll();
        return $this->render('@pidevUser/Admin/codeRoute/modifierTests.html.twig',array('listTests'=>$test));
    }
    public function editTestAction($id,Request $request)
    {
        $em =$this->getDoctrine()->getManager();
        $code = $em->getRepository("pidevUserBundle:mesTests")->find($id);
        if ($request->isMethod('post'))
        {
            $nv=$request->get('niveau');
            $qu=$request->get('question');
            $choix1=$request->get('choix1');
            $choix2=$request->get('choix2');
            $choix3=$request->get('choix3');
            $choix4=$request->get('choix4');
            $choix5=$request->get('choix5');
            $rep=$request->get('reponse');

            $code->setNiveau($nv);
            $code->setQuestion($qu);
            $code->setChoix1($choix1);
            $code->setChoix2($choix2);
            $code->setChoix3($choix3);
            $code->setChoix4($choix4);
            $code->setChoix5($choix5);
            $code->setReponse($rep);
            $file=$request->files->get('image');
            var_dump($file);
            $em->persist($code);
            $em->flush();
            return $this->redirectToRoute("Modifier_codeRoute");
        }
        return $this->render('@pidevUser/Admin/codeRoute/editTest.html.twig',array('code'=>$code));
    }
    public function SupprimerAction()
    {
        $em=$this->getDoctrine()->getManager();
        $test=$em->getRepository('pidevUserBundle:mesTests')->findAll();
        return $this->render('@pidevUser/Admin/codeRoute/supprimerTest.html.twig',array('listTests'=>$test));
    }
    public function deleteAction($id)
    {
        $em =$this->getDoctrine()->getManager();
        $test = $em->getRepository("pidevUserBundle:mesTests")->find($id);
        $em->remove($test);
        $em->flush();
        return $this->redirectToRoute("Supprimer_codeRoute");
    }
    public function AjouterAction(Request $request)
    {
        $code = new mesTests();
        $form = $this->createForm(mesTestsType::class,$code);
        $form->handleRequest($request);

        if ($form->isSubmitted())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($code);
            $em->flush();

            $file=$form['image']->getData();
            $fileName=$code->getId().'.'.$file->guessExtension();
            $file->move($this->getParameter('upload'),$fileName);
            $code->setImage($fileName);
            $em->persist($code);
            $em->flush();
            return $this->redirectToRoute('Lister_codeRoute');
        }
        return $this->render("pidevUserBundle:Admin/codeRoute:ajouterTests.html.twig",array("f"=>$form->createView()));
    }
    public function indexAction()
    {
        return $this->render('pidevUserBundle:CodeDeLaRoute:index.html.twig');
    }
    public function StatistiquesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $id1=1;
        $Resultat1 = $em->getRepository('pidevUserBundle:resultat')->find($id1);
        $succes1=$Resultat1->getReponseSucces();
        $echec1=$Resultat1->getReponseEchec();
        $ob1 = new Highchart();
        $ob1->chart->renderTo('chart1');
        $ob1->title->text('Test de réussite du niveau');
        $ob1->plotOptions->pie(array(
            'allowPointSelect'  => true,
            'cursor'    => 'pointer',
            'dataLabels'    => array('enabled' => false),
            'showInLegend'  => true
        ));
        $data1 = array(
            array('Réussite', $succes1),
            array('Echec', $echec1),
        );
        $ob1->series(array(array('type' => 'pie', 'data' => $data1)));

        $id2=2;
        $Resultat2 = $em->getRepository('pidevUserBundle:resultat')->find($id2);
        $succes2=$Resultat2->getReponseSucces();
        $echec2=$Resultat2->getReponseEchec();

        $ob2 = new Highchart();
        $ob2->chart->renderTo('chart2');
        $ob2->title->text('Test de réussite du niveau');
        $ob2->plotOptions->pie(array(
            'allowPointSelect'  => true,
            'cursor'    => 'pointer',
            'dataLabels'    => array('enabled' => false),
            'showInLegend'  => true
        ));
        $data2 = array(
            array('Réussite', $succes2),
            array('Echec', $echec2),
        );
        $ob2->series(array(array('type' => 'pie', 'data' => $data2)));


        $id3=3;
        $Resultat3 = $em->getRepository('pidevUserBundle:resultat')->find($id3);
        $succes3=$Resultat3->getReponseSucces();
        $echec3=$Resultat3->getReponseEchec();
        $ob3 = new Highchart();
        $ob3->chart->renderTo('chart3');
        $ob3->title->text('Test de réussite du niveau');
        $ob3->plotOptions->pie(array(
            'allowPointSelect'  => true,
            'cursor'    => 'pointer',
            'dataLabels'    => array('enabled' => false),
            'showInLegend'  => true
        ));
        $data3 = array(
            array('Réussite', $succes3),
            array('Echec', $echec3),
        );
        $ob3->series(array(array('type' => 'pie', 'data' => $data3)));



        $id4=4;
        $Resultat4 = $em->getRepository('pidevUserBundle:resultat')->find($id4);
        $succes4=$Resultat4->getReponseSucces();
        $echec4=$Resultat4->getReponseEchec();
        $ob4 = new Highchart();
        $ob4->chart->renderTo('chart4');
        $ob4->title->text('Test de réussite du niveau');
        $ob4->plotOptions->pie(array(
            'allowPointSelect'  => true,
            'cursor'    => 'pointer',
            'dataLabels'    => array('enabled' => false),
            'showInLegend'  => true
        ));
        $data4 = array(
            array('Réussite', $succes4),
            array('Echec', $echec4),
        );
        $ob4->series(array(array('type' => 'pie', 'data' => $data4)));
        $id5=5;
        $Resultat5 = $em->getRepository('pidevUserBundle:resultat')->find($id5);
        $succes5=$Resultat5->getReponseSucces();
        $echec5=$Resultat5->getReponseEchec();
        $ob5 = new Highchart();
        $ob5->chart->renderTo('chart5');
        $ob5->title->text('Test de réussite du niveau');
        $ob5->plotOptions->pie(array(
            'allowPointSelect'  => true,
            'cursor'    => 'pointer',
            'dataLabels'    => array('enabled' => false),
            'showInLegend'  => true
        ));
        $data5 = array(
            array('Réussite', $succes5),
            array('Echec', $echec5),
        );
        $ob5->series(array(array('type' => 'pie', 'data' => $data5)));
        $id6=6;
        $Resultat6 = $em->getRepository('pidevUserBundle:resultat')->find($id6);
        $succes6=$Resultat6->getReponseSucces();
        $echec6=$Resultat6->getReponseEchec();
        $ob6 = new Highchart();
        $ob6->chart->renderTo('chart6');
        $ob6->title->text('Test de réussite du niveau');
        $ob6->plotOptions->pie(array(
            'allowPointSelect'  => true,
            'cursor'    => 'pointer',
            'dataLabels'    => array('enabled' => false),
            'showInLegend'  => true
        ));
        $data6 = array(
            array('Réussite', $succes6),
            array('Echec', $echec6),
        );
        $ob6->series(array(array('type' => 'pie', 'data' => $data6)));


        return $this->render('pidevUserBundle:Admin/codeRoute:statistiquesTests.html.twig'
            , array(
                'chart1' => $ob1,
                'chart2' => $ob2,
                'chart3' => $ob3,
                'chart4' => $ob4,
                'chart5' => $ob5,
                'chart6' => $ob6



            ));
    }
    public function ResutalNv1SuccAction()
    {
        return $this->render('@pidevUser/CodeDeLaRoute/niveau1/ResultatNv1Succes.html.twig');
    }
    public function ResutalNv2SuccAction()
    {
        return $this->render('@pidevUser/CodeDeLaRoute/niveau2/ResultatNv2Succes.html.twig');
    }
    public function ResutalNv3SuccAction()
    {
        return $this->render('@pidevUser/CodeDeLaRoute/niveau3/ResultatNv3Succes.html.twig');
    }
    public function ResutalNv4SuccAction()
    {
        return $this->render('@pidevUser/CodeDeLaRoute/niveau4/ResultatNv4Succes.html.twig');
    }
    public function ResutalNv5SuccAction()
    {
        return $this->render('@pidevUser/CodeDeLaRoute/niveau5/ResultatNv5Succes.html.twig');
    }
    public function ResutalNv6SuccAction()
    {
        return $this->render('@pidevUser/CodeDeLaRoute/niveau6/ResultatNv6Succes.html.twig');
    }
    public function ResutalNv1EchAction()
    {
        return $this->render('@pidevUser/CodeDeLaRoute/niveau1/ResultatNiv1Echec.html.twig');
    }
    public function ResutalNv2EchAction()
    {
        return $this->render('@pidevUser/CodeDeLaRoute/niveau2/ResultatNv2Echec.html.twig');
    }
    public function ResutalNv3EchAction()
    {
        return $this->render('@pidevUser/CodeDeLaRoute/niveau3/ResultatNv3Echec.html.twig');
    }
    public function ResutalNv4EchAction()
    {
        return $this->render('@pidevUser/CodeDeLaRoute/niveau4/ResultatNv4Echec.html.twig');
    }
    public function ResutalNv5EchAction()
    {
        return $this->render('@pidevUser/CodeDeLaRoute/niveau5/ResultatNv5Echec.html.twig');
    }
    public function ResutalNv6EchAction()
    {
        return $this->render('@pidevUser/CodeDeLaRoute/niveau6/ResultatNv6Echec.html.twig');
    }



}
