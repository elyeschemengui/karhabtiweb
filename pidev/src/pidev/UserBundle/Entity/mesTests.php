<?php
/**
 * Created by PhpStorm.
 * User: HANY
 * Date: 12/02/2017
 * Time: 20:12
 */

namespace pidev\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class mesTests
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
    private $niveau;
    /**
     * @ORM\Column(type="string")
     */
    private $image;
    /**
     * @ORM\Column(type="string")
     */
    private $question;
    /**
     * @ORM\Column(type="integer")
     */
    private $reponse;
    /**
     * @ORM\Column(type="string")
     */
    private $choix1;
    /**
     * @ORM\Column(type="string")
     */
    private $choix2;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $choix3;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $choix4;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $choix5;
    /**
     * @return mixed
     */
    public function getReponse()
    {
        return $this->reponse;
    }

    /**
     * @param mixed $reponse
     */
    public function setReponse($reponse)
    {
        $this->reponse = $reponse;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
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
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * @param mixed $niveau
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
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
     * @return mixed
     */
    public function getChoix1()
    {
        return $this->choix1;
    }

    /**
     * @param mixed $choix1
     */
    public function setChoix1($choix1)
    {
        $this->choix1 = $choix1;
    }

    /**
     * @return mixed
     */
    public function getChoix2()
    {
        return $this->choix2;
    }

    /**
     * @param mixed $choix2
     */
    public function setChoix2($choix2)
    {
        $this->choix2 = $choix2;
    }

    /**
     * @return mixed
     */
    public function getChoix3()
    {
        return $this->choix3;
    }

    /**
     * @param mixed $choix3
     */
    public function setChoix3($choix3)
    {
        $this->choix3 = $choix3;
    }

    /**
     * @return mixed
     */
    public function getChoix4()
    {
        return $this->choix4;
    }

    /**
     * @param mixed $choix4
     */
    public function setChoix4($choix4)
    {
        $this->choix4 = $choix4;
    }

    /**
     * @return mixed
     */
    public function getChoix5()
    {
        return $this->choix5;
    }

    /**
     * @param mixed $choix5
     */
    public function setChoix5($choix5)
    {
        $this->choix5 = $choix5;
    }

}