<?php

namespace Aved\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Aved\UserBundle\Entity\School")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $school;

    /**
     * Set school
     *
     * @param \Aved\UserBundle\Entity\School $school
     * @return User
     */
    public function setSchool(\Aved\UserBundle\Entity\School $school = null)
    {
        $this->school = $school;

        return $this;
    }

    /**
     * Get school
     *
     * @return \Aved\UserBundle\Entity\School 
     */
    public function getSchool()
    {
        return $this->school;
    }
}