<?php
/**
 * Created by PhpStorm.
 * User: HANY
 * Date: 14/02/2017
 * Time: 18:59
 */

namespace pidev\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */
class resultat
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="integer")
     */
    private $reponseSucces;
    /**
     * @ORM\Column(type="integer")
     */
    private $reponseEchec;

    /**
     * @return mixed
     */
    public function getReponseSucces()
    {
        return $this->reponseSucces;
    }

    /**
     * @param mixed $reponseSucces
     */
    public function setReponseSucces($reponseSucces)
    {
        $this->reponseSucces = $reponseSucces;
    }

    /**
     * @return mixed
     */
    public function getReponseEchec()
    {
        return $this->reponseEchec;
    }

    /**
     * @param mixed $reponseEchec
     */
    public function setReponseEchec($reponseEchec)
    {
        $this->reponseEchec = $reponseEchec;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

}