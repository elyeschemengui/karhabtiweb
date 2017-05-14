<?php

namespace pidev\UserBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
/**
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="pidev\UserBundle\Entity\AnnoncesRepository")
 */
class Annonces
{

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="date", type="date")
     */
    protected $date;

    /**
     * @ORM\Column(name="TITRE", type="string", length=255)
     */
    protected $TITRE;
    /**
     * @ORM\Column(name="NOMBRE_DE_CYLINDRES", type="integer")
     */
    protected $NOMBRE_DE_CYLINDRES;
    /**
     * @ORM\Column(name="ENERGIE", type="string", length=255)
     */
    protected $ENERGIE;
    /**
     * @ORM\Column(name="PUISSANCE_FISCALE", type="string", length=255)
     */
    protected $PUISSANCE_FISCALE;
    /**
     * @ORM\Column(name="CYLINDREE", type="float")
     */
    protected $CYLINDREE;
    /**
     * @ORM\Column(name="BOITE", type="string", length=255)
     */
    protected $BOITE;


    /**
     * @ORM\Column(name="DESCRIPITION", type="text")
     */
    protected $DESCRIPITION;

    /**
     * @ORM\Column(name="VALIDATION", type="boolean")
     */
    private $VALIDATION = true;
    /**
     * @ORM\Column(name="PRIX", type="float")
     */
    protected $PRIX;
    /**
     * @ORM\Column(name="region", type="string")
     */
    protected $region;


    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @JoinColumn(name="user",referencedColumnName="id")
     */
    protected $user;

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }


    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @ORM\Column(name="image", type="string" ,nullable=true )
     */
    protected $image;
    /**
     * @ORM\Column(name="image1", type="string" ,nullable=true )
     */
    protected $image1;
    /**
     * @ORM\Column(name="image2", type="string" ,nullable=true )
     */
    protected $image2;
    /**
     * @ORM\Column(name="image3", type="string" ,nullable=true )
     */
    protected $image3;


    /**
     * @return mixed
     */
    public function getImage1()
    {
        return $this->image1;
    }

    /**
     * @param mixed $image1
     */
    public function setImage1($image1)
    {
        $this->image1 = $image1;
    }

    /**
     * @return mixed
     */
    public function getImage2()
    {
        return $this->image2;
    }

    /**
     * @param mixed $image2
     */
    public function setImage2($image2)
    {
        $this->image2 = $image2;
    }

    /**
     * @return mixed
     */
    public function getImage3()
    {
        return $this->image3;
    }

    /**
     * @param mixed $image3
     */
    public function setImage3($image3)
    {
        $this->image3 = $image3;
    }

    /**
     * @return mixed
     */
    public function getImage4()
    {
        return $this->image4;
    }

    /**
     * @param mixed $image4
     */
    public function setImage4($image4)
    {
        $this->image4 = $image4;
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

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }



    /**
     * @return mixed
     */
    public function getTITRE()
    {
        return $this->TITRE;
    }

    /**
     * @param mixed $TITRE
     */
    public function setTITRE($TITRE)
    {
        $this->TITRE = $TITRE;
    }

    /**
     * @return mixed
     */
    public function getNOMBREDECYLINDRES()
    {
        return $this->NOMBRE_DE_CYLINDRES;
    }

    /**
     * @param mixed $NOMBRE_DE_CYLINDRES
     */
    public function setNOMBREDECYLINDRES($NOMBRE_DE_CYLINDRES)
    {
        $this->NOMBRE_DE_CYLINDRES = $NOMBRE_DE_CYLINDRES;
    }

    /**
     * @return mixed
     */
    public function getENERGIE()
    {
        return $this->ENERGIE;
    }

    /**
     * @param mixed $ENERGIE
     */
    public function setENERGIE($ENERGIE)
    {
        $this->ENERGIE = $ENERGIE;
    }

    /**
     * @return mixed
     */
    public function getPUISSANCEFISCALE()
    {
        return $this->PUISSANCE_FISCALE;
    }

    /**
     * @param mixed $PUISSANCE_FISCALE
     */
    public function setPUISSANCEFISCALE($PUISSANCE_FISCALE)
    {
        $this->PUISSANCE_FISCALE = $PUISSANCE_FISCALE;
    }

    /**
     * @return mixed
     */
    public function getCYLINDREE()
    {
        return $this->CYLINDREE;
    }

    /**
     * @param mixed $CYLINDREE
     */
    public function setCYLINDREE($CYLINDREE)
    {
        $this->CYLINDREE = $CYLINDREE;
    }

    /**
     * @return mixed
     */
    public function getBOITE()
    {
        return $this->BOITE;
    }

    /**
     * @param mixed $BOITE
     */
    public function setBOITE($BOITE)
    {
        $this->BOITE = $BOITE;
    }

    /**
     * @return mixed
     */
    public function getDESCRIPITION()
    {
        return $this->DESCRIPITION;
    }

    /**
     * @param mixed $DESCRIPITION
     */
    public function setDESCRIPITION($DESCRIPITION)
    {
        $this->DESCRIPITION = $DESCRIPITION;
    }

    /**
     * @return mixed
     */
    public function getVALIDATION()
    {
        return $this->VALIDATION;
    }

    /**
     * @param mixed $VALIDATION
     */
    public function setVALIDATION($VALIDATION)
    {
        $this->VALIDATION = $VALIDATION;
    }

    /**
     * @return mixed
     */
    public function getPRIX()
    {
        return $this->PRIX;
    }

    /**
     * @param mixed $PRIX
     */
    public function setPRIX($PRIX)
    {
        $this->PRIX = $PRIX;
    }


    public function __construct()
    {
        // Par défaut, la date de l'annonce est la date d'aujourd'hui
        $this->date = new \Datetime();
    }


}