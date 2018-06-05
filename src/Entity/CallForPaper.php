<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CallForPaperRepository")
 */
class CallForPaper
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Event", inversedBy="callForPapers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $event;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Speak")
     * @ORM\JoinColumn(nullable=false)
     */
    private $speak;

    public function __construct()
    {
        $this->event = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): self
    {
        $this->event = $event;

        return $this;
    }

    public function getSpeak(): ?Speak
    {
        return $this->speak;
    }

    public function setSpeak(?Speak $speak): self
    {
        $this->speak = $speak;

        return $this;
    }

}
