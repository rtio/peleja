<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpeakerRepository")
 */
class Speaker
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Speak", mappedBy="speaker", orphanRemoval=true)
     */
    private $speaks;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $bio;

    public function __construct()
    {
        $this->speaks = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Speak[]
     */
    public function getSpeaks(): Collection
    {
        return $this->speaks;
    }

    public function addSpeak(Speak $speak): self
    {
        if (!$this->speaks->contains($speak)) {
            $this->speaks[] = $speak;
            $speak->setSpeaker($this);
        }

        return $this;
    }

    public function removeSpeak(Speak $speak): self
    {
        if ($this->speaks->contains($speak)) {
            $this->speaks->removeElement($speak);
            // set the owning side to null (unless already changed)
            if ($speak->getSpeaker() === $this) {
                $speak->setSpeaker(null);
            }
        }

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }
}
