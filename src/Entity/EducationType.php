<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EducationTypeRepository")
 */
class EducationType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Resume", mappedBy="educationType")
     */
    private $resumes;

    public function __construct()
    {
        $this->resumes = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
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
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getResumes()
    {
        return $this->resumes;
    }

    /**
     * @param mixed $resume
     */
    public function addResume($resume): void
    {
        $this->resumes[] = $resume;
    }
}
