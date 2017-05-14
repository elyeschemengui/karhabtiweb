<?php
/**
 * Created by PhpStorm.
 * User: ELYES
 * Date: 19/02/2017
 * Time: 00:19
 */

namespace pidev\UserBundle\Entity;
use Doctrine\ORM\EntityRepository;


class OffreRepository extends EntityRepository
{
    public function findOffreDQL($offre){
        $query = $this->getEntityManager()
            ->createQuery('SELECT s FROM pidevUserBundle:Offre s WHERE s.nomOffre LIKE :OFFRE ')
            ->setParameter('OFFRE','%'.$offre.'%');
        return $query->getResult();
    }


}