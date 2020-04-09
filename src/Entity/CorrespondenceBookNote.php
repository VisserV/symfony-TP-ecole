<?php

namespace App\Entity;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Child", inversedBy="correspondenceBookNotes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $child;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChild(): ?Child
    {
        return $this->child;
    }

    public function setChild(?Child $child): self
    {
        $this->child = $child;

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
