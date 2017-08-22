<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="student")
 * @UniqueEntity(fields = "username", targetClass = "UserBundle\Entity\User", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "UserBundle\Entity\User", message="fos_user.email.already_used")
 * @UniqueEntity(fields = "CIN", targetClass = "UserBundle\Entity\User", message="fos_user.CIN.already_used")
 * @UniqueEntity(fields = "phone", targetClass = "UserBundle\Entity\User", message="fos_user.phone.already_used")
 */
class Student extends User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Please enter your Company name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="The  school name is too short.",
     *     maxMessage="The school name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $school;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Please enter your level.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     max=255,
     *     minMessage="The level is too short.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $level;

    public function getSchool(){
        return $this->school;
    }
    public function setSchool($school){
        $this->school=$school;
        return $this;
    }
    public function getLevel(){
        return $this->level;
    }
    public function setLevel($level){
        $this->level=$level;
        return $this;
    }
}