<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProduitRepository;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez renseigner un titre")
     */
    private $titre;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank(message="Veuillez renseigner un prix")
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieProduit::class, inversedBy="produits")
     * @Assert\NotBlank(message="Veuillez renseigner une catégorie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    

    /**
     * @ORM\ManyToOne(targetEntity=AdminCategorieMenus::class, inversedBy="produits")
     */
    private $categorieMenus;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

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

    public function getCategorie(): ?CategorieProduit
    {
        return $this->categorie;
    }

    public function setCategorie(?CategorieProduit $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    
    public function getCategorieMenus(): ?AdminCategorieMenus
    {
        return $this->categorieMenus;
    }

    public function setCategorieMenus(?AdminCategorieMenus $categorieMenus): self
    {
        $this->categorieMenus = $categorieMenus;

        return $this;
    }
}
