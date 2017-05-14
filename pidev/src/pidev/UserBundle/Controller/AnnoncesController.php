<?php

namespace pidev\UserBundle\Controller;

use pidev\UserBundle\Entity\Annonces;
use pidev\UserBundle\Form\EmailType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use pidev\UserBundle\Entity\Email;



/**
 * Annonce controller.
 *
 */
class AnnoncesController extends Controller
{
    /**
     * Lists all annonce entities.
     *
     */
    public function indexAction()

    {
        $em = $this->getDoctrine()->getManager();
        $em2 = $this->getDoctrine()->getManager()->getRepository('pidevUserBundle:Annonces')->findAll();

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
        $t = $em->getRepository('pidevUserBundle:Annonces')->findBy(array(), array('date' => 'DESC'));


        $annonces = $em->getRepository('pidevUserBundle:Annonces')->findAll();

        return $this->render('annonces/index.html.twig', array(
            'annonces' => $annonces, 't' => $t
        ));
    }

    public function annoncedetailAction($id)
    {

        $em2 = $this->getDoctrine()->getManager()->getRepository('pidevUserBundle:Annonces')->findAll();
        $new = $this->getDoctrine()->getManager()->getRepository('pidevUserBundle:Annonces')->findBy(array(),array('date'=>'DESC'));

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
        $em = $this->getDoctrine()->getManager();
        $annonces = $em->getRepository('pidevUserBundle:Annonces')->findBy(array('id' => $id));

        return $this->render('pidevUserBundle:annonces:detailannonce.html.twig', array(
            'annonces' => $annonces, 't' => $new
        ));
    }

    public function adminAnnoncesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $em = $this->getDoctrine()->getManager();
        $em2 = $this->getDoctrine()->getManager()->getRepository('pidevUserBundle:Annonces')->findAll();

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

        $annonces = $em->getRepository('pidevUserBundle:Annonces')->findBy(array('VALIDATION' => '1'));
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($annonces, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('pidevUserBundle:Admin:adminAnnonces.html.twig', array(
            'annonces' => $pagination,
        ));
    }

    public function validationAdminAction(Request $request)

    {

        $em = $this->getDoctrine()->getManager();

        $annonces = $em->getRepository('pidevUserBundle:Annonces')->findBy(array('VALIDATION' => '0'));
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($annonces, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('@FOSUser/Admin/validationAnnonces.html.twig', array(
            'annonces' => $pagination,
        ));
    }

    public function mesannoncesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('pidevUserBundle:User')->findOneBy(array('id' => $this->getUser()));

        $annonces = $em->getRepository('pidevUserBundle:Annonces')->findBy(array('user' => $user));
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($annonces, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render(':annonces:index.html.twig', array(
            'annonces' => $pagination,
        ));
    }

    /**
     * Creates a new annonce entity.
     *
     */
    public function newAction(Request $request)
    {
        $annonce = new Annonces();
        $form = $this->createForm('pidev\UserBundle\Form\AnnoncesType', $annonce);
        $form->handleRequest($request);

        if($form->isValid()&& $form->isSubmitted()) {


                $em = $this->getDoctrine()->getManager();
                $user = $em->getRepository('pidevUserBundle:User')->findOneBy(array('id' => $this->getUser()));
                $file = $form['image']->getData();
                $fileName = $user->getId() . '.' . $file->guessExtension();
                $file->move(
                    $this->getParameter('upload'), $fileName
                );
                $em = $this->getDoctrine()->getManager();

                $annonce->setImage($fileName);
                $annonce->setVALIDATION('0');
                $annonce->setUser($user);
                $em->persist($annonce);
                $em->flush();
                return $this->redirectToRoute('annonces_show', array('id' => $annonce->getId()));
            }

        return $this->render('annonces/new.html.twig', array(
            'annonce' => $annonce,
            'form' => $form->createView(),
        ));
    }


    /**
     * Finds and displays a annonce entity.
     *
     */
    public function showAction(Annonces $annonce)
    {
        $deleteForm = $this->createDeleteForm($annonce);

        return $this->render('annonces/show.html.twig', array(
            'annonce' => $annonce,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function showadminAction(Annonces $annonce)
    {
        $deleteForm = $this->createDeleteForm($annonce);

        return $this->render('pidevUserBundle:Admin:adminShow.html.twig', array(
            'annonce' => $annonce,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    public function declarationAction(Request $request)
    {
        // ask the service for a Excel5
        $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();

        $phpExcelObject->getProperties()->setCreator("liuggio")
            ->setLastModifiedBy("Giulio De Donato")
            ->setTitle("Office 2005 XLSX Test Document")
            ->setSubject("Office 2005 XLSX Test Document")
            ->setDescription("Test document for Office 2005 XLSX, generated using PHP classes.")
            ->setKeywords("office 2005 openxml php")
            ->setCategory("Test result file");
        $phpExcelObject->setActiveSheetIndex(0)
            ->setCellValue('A1', 'id')
            ->setCellValue('B1', 'date')
             ->setCellValue('C1', 'TITRE')
        ->setCellValue('D1', 'NOMBRE_DE_CYLINDRES')
        ->setCellValue('E1', 'ENERGIE')
        ->setCellValue('F1', 'PUISSANCE_FISCALE')
        ->setCellValue('G1', 'CYLINDREE')
        ->setCellValue('H1', 'BOITE')
        ->setCellValue('I1', 'VALIDATION')
        ->setCellValue('J1', 'region')
        ->setCellValue('K1', 'PRIX')
        ->setCellValue('L1', 'DESCRIPITION');


        $em=$this->getDoctrine()->getManager();
        $annonce=$em->getRepository('pidevUserBundle:Annonces')->findAll();

        $aux=2;
        foreach ($annonce as $annonces){
            $phpExcelObject->setActiveSheetIndex(0)->setCellValue('A'.$aux, $annonces->getId())
                ->setCellValue('B'.$aux, $annonces->getDate())
                ->setCellValue('C'.$aux, $annonces->getTITRE())
                ->setCellValue('D'.$aux, $annonces->getNOMBREDECYLINDRES())
                ->setCellValue('E'.$aux, $annonces->getENERGIE())
                ->setCellValue('F'.$aux, $annonces->getPUISSANCEFISCALE())
                ->setCellValue('G'.$aux, $annonces->getCYLINDREE())
                ->setCellValue('H'.$aux, $annonces->getBOITE())
                ->setCellValue('I'.$aux, $annonces->getVALIDATION())
                ->setCellValue('J'.$aux, $annonces->getRegion())
                ->setCellValue('K'.$aux, $annonces->getPRIX())
                ->setCellValue('L'.$aux, $annonces->getDESCRIPITION())  ;
            $aux++;


        };
        $phpExcelObject->getActiveSheet()->setTitle('Simple');
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $phpExcelObject->setActiveSheetIndex(0);

        // create the writer
        $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
        // create the response
        $response = $this->get('phpexcel')->createStreamedResponse($writer);
        // adding headers
        $dispositionHeader = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            'Liste-des-Annonces.xls'
        );
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');
        $response->headers->set('Content-Disposition', $dispositionHeader);

        return $response;
    }

    /**
     * Displays a form to edit an existing annonce entity.
     *
     */
    public function editAction(Request $request, Annonces $annonce)
    {
        $deleteForm = $this->createDeleteForm($annonce);
        $editForm = $this->createForm('pidev\UserBundle\Form\AnnoncesType', $annonce);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('annonces_edit', array('id' => $annonce->getId()));
        }

        return $this->render('annonces/edit.html.twig', array(
            'annonce' => $annonce,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a annonce entity.
     *
     */
    public function deleteAction(Request $request, Annonces $annonce)
    {
        $form = $this->createDeleteForm($annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($annonce);
            $em->flush($annonce);
        }

        return $this->redirectToRoute('annonces_index');
    }

    /**
     * Creates a form to delete a annonce entity.
     *
     * @param Annonces $annonce The annonce entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Annonces $annonce)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('annonces_delete', array('id' => $annonce->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    public function validAction($id)
    {
        var_dump('lol');
        $em = $this->getDoctrine()->getManager();
        $promos = $em->getRepository("pidevUserBundle:Annonces")->find($id);
        $promos->setVALIDATION('1');
        $em->persist($promos);
        $em->flush();
        return $this->redirectToRoute("validation");
    }

    public function annoncesFrontAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();


        if ($request->isMethod('post')) {

            $em1 = $this->getDoctrine()->getManager();
            $titre = $request->get('Titre');
            $prix_min = $request->get('prix_min');
            $prix_max = $request->get('prix_max');
            $region = $request->get('region');
            $boite = $request->get('Boite');


            $new = $em->getRepository('pidevUserBundle:Annonces')->findBy(array(), array('date' => 'DESC'));

            $annonces = $em->getRepository('pidevUserBundle:Annonces')->findBy(array('VALIDATION' => '1'));
            $hot = $em->getRepository('pidevUserBundle:Annonces')->findBy(array('VALIDATION' => '1'), array('PRIX' => 'DESC'));
            if ($prix_min=null) {
                $em1 = $this->getDoctrine()->getManager();

                $em = $this->getDoctrine()->getManager();
                $new = $em->getRepository('pidevUserBundle:Annonces')->findBy(array(), array('date' => 'DESC'));

                $annonces = $em->getRepository('pidevUserBundle:Annonces')->findBy(array('VALIDATION' => '1'));
                $hot = $em->getRepository('pidevUserBundle:Annonces')->findBy(array('VALIDATION' => '1'), array('PRIX' => 'DESC'));

                $search1 = $em1->getRepository('pidevUserBundle:Annonces')->findAnnonce3DQL($titre, $prix_max, $region, $boite);
                $paginator = $this->get('knp_paginator');
                $pagination = $paginator->paginate($search1, /* query NOT result */
                    $request->query->getInt('page', 1)/*page number*/,
                    3/*limit per page*/
                );

                return $this->render('@pidevUser/annonces/annonces.html.twig', array('annonces' => $pagination, 't' => $new, 'hot' => $hot,));

            }
            elseif ($prix_max=null ) {
                $em = $this->getDoctrine()->getManager();
                $new = $em->getRepository('pidevUserBundle:Annonces')->findBy(array(), array('date' => 'DESC'));

                $annonces = $em->getRepository('pidevUserBundle:Annonces')->findBy(array('VALIDATION' => '1'));
                $hot = $em->getRepository('pidevUserBundle:Annonces')->findBy(array('VALIDATION' => '1'), array('PRIX' => 'DESC'));

                $search1 = $em1->getRepository('pidevUserBundle:Annonces')->findAnnonce2DQL($titre, $prix_min, $region, $boite);
                $paginator = $this->get('knp_paginator');
                $pagination = $paginator->paginate($search1, /* query NOT result */
                    $request->query->getInt('page', 1)/*page number*/,
                    3/*limit per page*/
                );

                return $this->render('@pidevUser/annonces/annonces.html.twig', array('annonces' => $pagination, 't' => $new, 'hot' => $hot,));

            }
            elseif ($prix_max=null && $prix_min=null) {
                $em = $this->getDoctrine()->getManager();
                $new = $em->getRepository('pidevUserBundle:Annonces')->findBy(array(), array('date' => 'DESC'));

                $annonces = $em->getRepository('pidevUserBundle:Annonces')->findBy(array('VALIDATION' => '1'));
                $hot = $em->getRepository('pidevUserBundle:Annonces')->findBy(array('VALIDATION' => '1'), array('PRIX' => 'DESC'));

                $search1 = $em1->getRepository('pidevUserBundle:Annonces')->findAnnonce4DQL($titre, $region, $boite);
                $paginator = $this->get('knp_paginator');
                $pagination = $paginator->paginate($search1, /* query NOT result */
                    $request->query->getInt('page', 1)/*page number*/,
                    3/*limit per page*/
                );

                return $this->render('@pidevUser/annonces/annonces.html.twig', array('annonces' => $pagination, 't' => $new, 'hot' => $hot,));

            }else{

                $em1 = $this->getDoctrine()->getManager();

                $em1 = $this->getDoctrine()->getManager();
                $titre = $request->get('Titre');
                $prix_min = $request->get('prix_min');
                $prix_max = $request->get('prix_max');
                $region = $request->get('region');
                $boite = $request->get('Boite');


                $new = $em->getRepository('pidevUserBundle:Annonces')->findBy(array(), array('date' => 'DESC'));

                $annonces = $em->getRepository('pidevUserBundle:Annonces')->findBy(array('VALIDATION' => '1'));
                $hot = $em->getRepository('pidevUserBundle:Annonces')->findBy(array('VALIDATION' => '1'), array('PRIX' => 'DESC'));

                $search1 = $em1->getRepository('pidevUserBundle:Annonces')->findAnnonceDQL($titre, $prix_min, $prix_max, $region, $boite);

                $paginator = $this->get('knp_paginator');
                $pagination = $paginator->paginate($search1, /* query NOT result */
                    $request->query->getInt('page', 1)/*page number*/,
                    3/*limit per page*/
                );

                return $this->render('@pidevUser/annonces/annonces.html.twig', array('annonces' => $pagination, 't' => $new, 'hot' => $hot,));
            }
        }
        $new = $em->getRepository('pidevUserBundle:Annonces')->findBy(array(), array('date' => 'DESC'));

        $annonces = $em->getRepository('pidevUserBundle:Annonces')->findBy(array('VALIDATION' => '1'));
        $hot = $em->getRepository('pidevUserBundle:Annonces')->findBy(array('VALIDATION' => '1'), array('PRIX' => 'DESC'));
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($annonces, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            3/*limit per page*/
        );


        return $this->render("pidevUserBundle:annonces:annonces.html.twig", array(
            'annonces' => $pagination, 't' => $new, 'hot' => $hot
        ));

    }

    public function deletevalidationAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $annonce = $em->getRepository('pidevUserBundle:Annonces')->find($id);
        $em->remove($annonce);
        $em->flush();
        return $this->redirectToRoute('validation');
    }
    public function EmailAction(Request $request)
    {
        $mail = new Email();
        $form= $this->createForm(EmailType::class, $mail);
        $form->handleRequest($request) ;
        if ($form->isValid()) {
            $message = \Swift_Message::newInstance()
                ->setSubject('Accusé de réception')
                ->setFrom('headevelopers@gmail.com')
                ->setTo($mail->getMail())
                ->setBody(
                    $this->renderView(
                        '@pidevUser/Default/mail.html.twig',
                        array('nom' => $mail->getName(), 'Email'=>$mail->getMail(),'message'=>$mail->getMessage())
                    )

                );
            $this->get('mailer')->send($message);
            return $this->redirect($this->generateUrl('my_app_mail_accuse'));
        }
        return $this->render('@pidevUser/Default/contact.html.twig', array('form'=>$form
            ->createView()));

}
    public function successAction(){
        return new Response("email envoyé avec succès, Merci de vérifier votre adresse mail
.");
}
    public function listuserAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $user=$em->getRepository('pidevUserBundle:User')->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($user, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );


        return $this->render('pidevUserBundle:Admin:listuser.html.twig',array("list"=>$pagination));
    }
}
