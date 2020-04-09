<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CorrespondenceBookNoteRepository")
 */
class CorrespondenceBookNote
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Child", inversedBy="correspondenceBookNotes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $children;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="date")
     */
    private $sentDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $seenDate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="writtenCorrespondenceBookNotes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $writter;

    public function __construct()
    {
        $this->children = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Child[]
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function addChildren(Child $child): self
    {
        if (!$this->children->contains($child)) {
            $this->children[] = $child;
            $child->addCorrespondenceBookNote($this);
        }

        return $this;
    }

    public function removeChildren(Child $child): self
    {
        if ($this->children->contains($child)) {
            $this->children->removeElement($child);
            // set the owning side to null (unless already changed)
            if ($child->getCorrespondenceBookNotes()->contains($this)) {
                $child->removeCorrespondenceBookNote($this);
            }
        }

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getSentDate(): ?\DateTimeInterface
    {
        return $this->sentDate;
    }

    public function setSentDate(\DateTimeInterface $sentDate): self
    {
        $this->sentDate = $sentDate;

        return $this;
    }

    public function getSeenDate(): ?\DateTimeInterface
    {
        return $this->seenDate;
    }

    public function setSeenDate(?\DateTimeInterface $seenDate): self
    {
        $this->seenDate = $seenDate;

        return $this;
    }

    public function getWritter(): ?User
    {
        return $this->writter;
    }

    public function setWritter(?User $writter): self
    {
        $this->writter = $writter;

        return $this;
    }
}
