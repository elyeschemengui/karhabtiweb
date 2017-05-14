<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 18/02/2017
 * Time: 22:04
 */

namespace pidev\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Table()
 * @ORM\Entity()
 */
class Email

{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;
    /**
     * @ORM\Column(name="message", type="string", length=255)
     */
    protected $message;

    /**
     * @ORM\Column(name="TITRE", type="string",length=255)
     */
    protected $mail;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }




}