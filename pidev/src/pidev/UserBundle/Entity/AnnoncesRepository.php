<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 17/02/2017
 * Time: 23:42
 */

namespace pidev\UserBundle\Entity;
use Doctrine\ORM\EntityRepository;


class AnnoncesRepository extends EntityRepository
{
    public function findAnnonceDQL($titre,$prix_min,$prix_max,$region,$boite){
        $query=$this->getEntityManager()
            ->createQuery('SELECT s FROM pidevUserBundle:Annonces s WHERE s.TITRE LIKE :Titre AND s.VALIDATION =:p AND s.PRIX<=:prix_max AND s.PRIX>=:prix_min AND s.region LIKE :region AND s.BOITE LIKE :Boite')
            ->setParameters(array('Titre'=>'%'.$titre.'%','p'=>'1','prix_min'=>$prix_min,'prix_max'=>$prix_max,'region'=>'%'.$region.'%','Boite'=>'%'.$boite.'%'));
        return $query->getResult();
    }
    public function findAnnonce1DQL($titre1){
        $query=$this->getEntityManager()
            ->createQuery('SELECT s FROM pidevUserBundle:Annonces s WHERE s.TITRE LIKE :Titre AND s.VALIDATION =:p ')
            ->setParameters(array('Titre'=>'%'.$titre1.'%','p'=>'1'));
        return $query->getResult();
    }
    public function findAnnonce2DQL($titre,$prix_min,$region,$boite)
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT s FROM pidevUserBundle:Annonces s WHERE s.TITRE LIKE :Titre AND s.VALIDATION =:p  AND s.PRIX>=:prix_min AND s.region LIKE :region AND s.BOITE LIKE :Boite')
            ->setParameters(array('Titre' => '%' . $titre . '%', 'p' => '1', 'prix_min' => $prix_min, 'region' => '%' . $region . '%', 'Boite' => '%' . $boite . '%'));
        return $query->getResult();
    }
    public function findAnnonce3DQL($titre,$prix_max,$region,$boite){
        $query=$this->getEntityManager()
            ->createQuery('SELECT s FROM pidevUserBundle:Annonces s WHERE s.TITRE LIKE :Titre AND s.VALIDATION =:p AND s.PRIX<=:prix_max AND s.region LIKE :region AND s.BOITE LIKE :Boite')
            ->setParameters(array('Titre'=>'%'.$titre.'%','p'=>'1','prix_max'=>$prix_max,'region'=>'%'.$region.'%','Boite'=>'%'.$boite.'%'));
        return $query->getResult();
    }
    public function findAnnonce4DQL($titre,$region,$boite){
        $query=$this->getEntityManager()
            ->createQuery('SELECT s FROM pidevUserBundle:Annonces s WHERE s.TITRE LIKE :Titre AND s.VALIDATION =:p  AND s.region LIKE :region AND s.BOITE LIKE :Boite')
            ->setParameters(array('Titre'=>'%'.$titre.'%','p'=>'1','region'=>'%'.$region.'%','Boite'=>'%'.$boite.'%'));
        return $query->getResult();
    }
}