<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\FormationRepository")
 */
class Formation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Ecole", mappedBy="formation")
     */
    private $ecole;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Module", inversedBy="formation")
     * @ORM\JoinTable(name="formation_module",
     *   joinColumns={
     *     @ORM\JoinColumn(name="formation_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="module_id", referencedColumnName="id")
     *   }
     * )
     */
    private $module;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ecole = new \Doctrine\Common\Collections\ArrayCollection();
        $this->module = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Ecole[]
     */
    public function getEcole(): Collection
    {
        return $this->ecole;
    }

    public function addEcole(Ecole $ecole): self
    {
        if (!$this->ecole->contains($ecole)) {
            $this->ecole[] = $ecole;
            $ecole->addFormation($this);
        }

        return $this;
    }

    public function removeEcole(Ecole $ecole): self
    {
        if ($this->ecole->removeElement($ecole)) {
            $ecole->removeFormation($this);
        }

        return $this;
    }

    /**
     * @return Collection|Module[]
     */
    public function getModule(): Collection
    {
        return $this->module;
    }

    public function addModule(Module $module): self
    {
        if (!$this->module->contains($module)) {
            $this->module[] = $module;
        }

        return $this;
    }

    public function removeModule(Module $module): self
    {
        $this->module->removeElement($module);

        return $this;
    }

}
