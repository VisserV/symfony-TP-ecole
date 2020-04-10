<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChildRepository")
 */
class Child
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="date")
     */
    private $birthdate;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="children")
     * @ORM\JoinColumn(nullable=false)
     */
    private $parents;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SchoolClass", inversedBy="children")
     * @ORM\JoinColumn(nullable=false)
     */
    private $schoolClass;

    /**
     * @var $acceptedInAskedClass boolean
     * @ORM\Column(type="boolean")
     */
    private $acceptedInAskedClass;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\CorrespondenceBookNote", mappedBy="children")
     */
    private $correspondenceBookNotes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ClassPhoto", mappedBy="children")
     */
    private $classPhotos;

    public function __construct()
    {
        $this->parents = new ArrayCollection();
        $this->correspondenceBookNotes = new ArrayCollection();
        $this->classPhotos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getParents(): Collection
    {
        return $this->parents;
    }

    public function addParent(User $parent): self
    {
        if (!$this->parents->contains($parent)) {
            $this->parents[] = $parent;
            $parent->addChild($this);
        }

        return $this;
    }

    public function removeParent(User $parent): self
    {
        if ($this->parents->contains($parent)) {
            $this->parents->removeElement($parent);
            // set the owning side to null (unless already changed)
            if ($parent->getChildren()->contains($this)) {
                $parent->removeChild($this);
            }
        }

        return $this;
    }

    public function getSchoolClass(): ?SchoolClass
    {
        return $this->schoolClass;
    }

    public function setSchoolClass(?SchoolClass $schoolClass): self
    {
        $this->schoolClass = $schoolClass;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAcceptedInAskedClass(): ?bool
    {
        return $this->acceptedInAskedClass;
    }

    /**
     * @param bool $acceptedInAskedClass
     * @return Child
     */
    public function setAcceptedInAskedClass(bool $acceptedInAskedClass): self
    {
        $this->acceptedInAskedClass = $acceptedInAskedClass;
        return $this;
    }

    /**
     * @return Collection|CorrespondenceBookNote[]
     */
    public function getCorrespondenceBookNotes(): Collection
    {
        return $this->correspondenceBookNotes;
    }

    public function addCorrespondenceBookNote(CorrespondenceBookNote $correspondenceBookNote): self
    {
        if (!$this->correspondenceBookNotes->contains($correspondenceBookNote)) {
            $this->correspondenceBookNotes[] = $correspondenceBookNote;
            $correspondenceBookNote->setChild($this);
        }

        return $this;
    }

    public function removeCorrespondenceBookNote(CorrespondenceBookNote $correspondenceBookNote): self
    {
        if ($this->correspondenceBookNotes->contains($correspondenceBookNote)) {
            $this->correspondenceBookNotes->removeElement($correspondenceBookNote);
            // set the owning side to null (unless already changed)
            if ($correspondenceBookNote->getChild() === $this) {
                $correspondenceBookNote->setChild(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ClassPhoto[]
     */
    public function getClassPhotos(): Collection
    {
        return $this->classPhotos;
    }

    public function addClassPhoto(ClassPhoto $classPhoto): self
    {
        if (!$this->classPhotos->contains($classPhoto)) {
            $this->classPhotos[] = $classPhoto;
            $classPhoto->addChild($this);
        }

        return $this;
    }

    public function removeClassPhoto(ClassPhoto $classPhoto): self
    {
        if ($this->classPhotos->contains($classPhoto)) {
            $this->classPhotos->removeElement($classPhoto);
            $classPhoto->removeChild($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->firstName . ' ' . $this->name . ' (' . $this->birthdate->format('d/m/Y') . ')';
    }
}
