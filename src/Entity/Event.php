<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event
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
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $endDate;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CallForPaper", mappedBy="event")
     */
    private $callForPapers;

    /**
     * @ORM\Column(type="datetime")
     */
    private $CfpStartDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $CfpEndDate;

    public function __construct()
    {
        $this->callForPapers = new ArrayCollection();
    }

    public function getId()
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return Collection|CallForPaper[]
     */
    public function getCallForPapers(): Collection
    {
        return $this->callForPapers;
    }

    public function addCallForPaper(CallForPaper $callForPaper): self
    {
        if (!$this->callForPapers->contains($callForPaper)) {
            $this->callForPapers[] = $callForPaper;
            $callForPaper->setEvent($this);
        }

        return $this;
    }

    public function removeCallForPaper(CallForPaper $callForPaper): self
    {
        if ($this->callForPapers->contains($callForPaper)) {
            $this->callForPapers->removeElement($callForPaper);
            // set the owning side to null (unless already changed)
            if ($callForPaper->getEvent() === $this) {
                $callForPaper->setEvent(null);
            }
        }

        return $this;
    }

    public function getCfpStartDate(): ?\DateTimeInterface
    {
        return $this->CfpStartDate;
    }

    public function setCfpStartDate(\DateTimeInterface $CfpStartDate): self
    {
        $this->CfpStartDate = $CfpStartDate;

        return $this;
    }

    public function getCfpEndDate(): ?\DateTimeInterface
    {
        return $this->CfpEndDate;
    }

    public function setCfpEndDate(\DateTimeInterface $CfpEndDate): self
    {
        $this->CfpEndDate = $CfpEndDate;

        return $this;
    }
}
