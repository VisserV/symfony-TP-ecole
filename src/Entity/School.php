<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SchoolRepository")
 * @Vich\Uploadable
 */
class School
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="text")
     */
    private $timetable;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Address", cascade={"persist", "remove"})
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $logo;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $altLogo;

    /**
     * @Vich\UploadableField(mapping="school_image", fileNameProperty="logo")
     * @var File
     */
    private $logoFile;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $schoolImage;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $altSchoolImage;

    /**
     * @Vich\UploadableField(mapping="school_image", fileNameProperty="schoolImage")
     * @var File
     */
    private $schoolImageFile;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTimetable(): ?string
    {
        return $this->timetable;
    }

    public function setTimetable(string $timetable): self
    {
        $this->timetable = $timetable;

        return $this;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function setAddress(Address $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;
        return $this;
    }

    public function getAltLogo(): ?string
    {
        return $this->altLogo;
    }

    public function setAltLogo(string $altLogo): self
    {
        $this->altLogo = $altLogo;
        return $this;
    }

    public function getLogoFile(): ?File
    {
        return $this->logoFile;
    }

    public function setLogoFile(File $logoFile): self
    {
        $this->logoFile = $logoFile;
        return $this;
    }

    public function getSchoolImage(): ?string
    {
        return $this->schoolImage;
    }

    public function setSchoolImage(string $schoolImage): self
    {
        $this->schoolImage = $schoolImage;
        return $this;
    }

    public function getAltSchoolImage(): ?string
    {
        return $this->altSchoolImage;
    }

    public function setAltSchoolImage(string $altSchoolImage): self
    {
        $this->altSchoolImage = $altSchoolImage;
        return $this;
    }

    public function getSchoolImageFile(): ?File
    {
        return $this->schoolImageFile;
    }

    public function setSchoolImageFile(File $schoolImageFile): self
    {
        $this->schoolImageFile = $schoolImageFile;
        return $this;
    }
}
