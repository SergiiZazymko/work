<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResumeRepository")
 */
class Resume
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=55)
     * @Assert\NotBlank()
     */
    private $position;

    /**
     * @ORM\ManyToOne(targetEntity="City", inversedBy="resumes")
     * @Assert\NotBlank()
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=13)
     * @Assert\NotBlank()
     */
    private $phone;

    /**
     * @ORM\ManyToOne(targetEntity="EmploymentType", inversedBy="resumes")
     */
    private $employmentType;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $salary;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     */
    private $workCompany;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\NotBlank()
     */
    private $workCity;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\NotBlank()
     */
    private $workPosition;

    /**
     * @ORM\Column(type="date")
     */
    private $workStart;

    /**
     * @ORM\Column(type="date")
     */
    private $workFinish;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $workDescription;

    /**
     * @ORM\ManyToOne(targetEntity="EducationType", inversedBy="resumes")
     */
    private $educationType;

    /**
     * @ORM\Column(type="string", length=60)
     * @Assert\NotBlank()
     */
    private $educationInstitution;

    /**
     * @ORM\Column(type="string", length=60)
     * @Assert\NotBlank()
     */
    private $educationSpeciality;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\NotBlank()
     */
    private $educationCity;

    /**
     * @ORM\Column(type="date")
     */
    private $educationStart;

    /**
     * @ORM\Column(type="date")
     */
    private $educationFinish;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $educationDescription;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $additionlInfo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAvailable;

    public function __toString()
    {
        return $this->id;
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
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position): void
    {
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getEmploymentType()
    {
        return $this->employmentType;
    }

    /**
     * @param mixed $employmentType
     */
    public function setEmploymentType($employmentType): void
    {
        $this->employmentType = $employmentType;
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @param mixed $salary
     */
    public function setSalary($salary): void
    {
        $this->salary = $salary;
    }

    /**
     * @return mixed
     */
    public function getWorkCompany()
    {
        return $this->workCompany;
    }

    /**
     * @param mixed $workCompany
     */
    public function setWorkCompany($workCompany): void
    {
        $this->workCompany = $workCompany;
    }

    /**
     * @return mixed
     */
    public function getWorkCity()
    {
        return $this->workCity;
    }

    /**
     * @param mixed $workCity
     */
    public function setWorkCity($workCity): void
    {
        $this->workCity = $workCity;
    }

    /**
     * @return mixed
     */
    public function getWorkPosition()
    {
        return $this->workPosition;
    }

    /**
     * @param mixed $workPosition
     */
    public function setWorkPosition($workPosition): void
    {
        $this->workPosition = $workPosition;
    }

    /**
     * @return mixed
     */
    public function getWorkStart()
    {
        return $this->workStart;
    }

    /**
     * @param mixed $workStart
     */
    public function setWorkStart($workStart): void
    {
        $this->workStart = $workStart;
    }

    /**
     * @return mixed
     */
    public function getWorkFinish()
    {
        return $this->workFinish;
    }

    /**
     * @param mixed $workFinish
     */
    public function setWorkFinish($workFinish): void
    {
        $this->workFinish = $workFinish;
    }

    /**
     * @return mixed
     */
    public function getWorkDescription()
    {
        return $this->workDescription;
    }

    /**
     * @param mixed $workDescription
     */
    public function setWorkDescription($workDescription): void
    {
        $this->workDescription = $workDescription;
    }

    /**
     * @return mixed
     */
    public function getEducationType()
    {
        return $this->educationType;
    }

    /**
     * @param mixed $educationType
     */
    public function setEducationType($educationType): void
    {
        $this->educationType = $educationType;
    }

    /**
     * @return mixed
     */
    public function getEducationInstitution()
    {
        return $this->educationInstitution;
    }

    /**
     * @param mixed $educationInstitution
     */
    public function setEducationInstitution($educationInstitution): void
    {
        $this->educationInstitution = $educationInstitution;
    }

    /**
     * @return mixed
     */
    public function getEducationSpeciality()
    {
        return $this->educationSpeciality;
    }

    /**
     * @param mixed $educationSpeciality
     */
    public function setEducationSpeciality($educationSpeciality): void
    {
        $this->educationSpeciality = $educationSpeciality;
    }

    /**
     * @return mixed
     */
    public function getEducationCity()
    {
        return $this->educationCity;
    }

    /**
     * @param mixed $educationCity
     */
    public function setEducationCity($educationCity): void
    {
        $this->educationCity = $educationCity;
    }

    /**
     * @return mixed
     */
    public function getEducationStart()
    {
        return $this->educationStart;
    }

    /**
     * @param mixed $educationStart
     */
    public function setEducationStart($educationStart): void
    {
        $this->educationStart = $educationStart;
    }

    /**
     * @return mixed
     */
    public function getEducationFinish()
    {
        return $this->educationFinish;
    }

    /**
     * @param mixed $educationFinish
     */
    public function setEducationFinish($educationFinish): void
    {
        $this->educationFinish = $educationFinish;
    }

    /**
     * @return mixed
     */
    public function getEducationDescription()
    {
        return $this->educationDescription;
    }

    /**
     * @param mixed $educationDescription
     */
    public function setEducationDescription($educationDescription): void
    {
        $this->educationDescription = $educationDescription;
    }

    /**
     * @return mixed
     */
    public function getAdditionlInfo()
    {
        return $this->additionlInfo;
    }

    /**
     * @param mixed $additionlInfo
     */
    public function setAdditionlInfo($additionlInfo): void
    {
        $this->additionlInfo = $additionlInfo;
    }

    /**
     * @return mixed
     */
    public function getisAvailable()
    {
        return $this->isAvailable;
    }

    /**
     * @param mixed $isAvailable
     */
    public function setIsAvailable($isAvailable): void
    {
        $this->isAvailable = $isAvailable;
    }
}
