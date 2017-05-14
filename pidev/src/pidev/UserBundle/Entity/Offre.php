<?php
/**
 * Created by PhpStorm.
 * User: ELYES
 * Date: 11/02/2017
 * Time: 19:14
 */

namespace pidev\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="pidev\UserBundle\Entity\OffreRepository")
 */


class Offre
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity="Pointdevente")
     */
    protected $ptvente_id;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     */
    protected $membre_id;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $etat=0;

    /**
     * @ORM\Column(type="float")
     */
    protected $prixinit;


    /**
     * @ORM\Column(type="float")
     */
    protected $tauxRemise;



    /**
     * @ORM\Column(type="string",length=255)
     */
    protected $nomOffre;

    /**
     * @ORM\Column(type="string",length=255)
     */
    protected $description;

    /**
     * @ORM\Column(type="string",length=255)
     */
    protected $photo;

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

    /**
     * @return mixed
     */
    public function getNomOffre()
    {
        return $this->nomOffre;
    }

    /**
     * @param mixed $nomOffre
     */
    public function setNomOffre($nomOffre)
    {
        $this->nomOffre = $nomOffre;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getPtventeId()
    {
        return $this->ptvente_id;
    }

    /**
     * @param mixed $ptvente_id
     */
    public function setPtventeId($ptvente_id)
    {
        $this->ptvente_id = $ptvente_id;
    }

    /**
     * @return mixed
     */
    public function getPtventeNom()
    {
        return $this->ptvente_nom;
    }

    /**
     * @param mixed $ptvente_nom
     */
    public function setPtventeNom($ptvente_nom)
    {
        $this->ptvente_nom = $ptvente_nom;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return mixed
     */
    public function getMembreId()
    {
        return $this->membre_id;
    }

    /**
     * @param mixed $membre_id
     */
    public function setMembreId($membre_id)
    {
        $this->membre_id = $membre_id;
    }

    /**
     * @return mixed
     */
    public function getPrixinit()
    {
        return $this->prixinit;
    }

    /**
     * @param mixed $prixinit
     */
    public function setPrixinit($prixinit)
    {
        $this->prixinit = $prixinit;
    }

    /**
     * @return mixed
     */
    public function getTauxRemise()
    {
        return $this->tauxRemise;
    }

    /**
     * @param mixed $tauxRemise
     */
    public function setTauxRemise($tauxRemise)
    {
        $this->tauxRemise = $tauxRemise;
    }





}