<?php

namespace App\Entity;

use App\Repository\GamesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GamesRepository::class)]
class Games
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nombre = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $descripcion = null;

    #[ORM\Column(nullable: true)]
    private ?int $descargas = null;

    #[ORM\ManyToOne(inversedBy: 'juegos')]
    private ?Platforms $plataforma = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getDescargas(): ?int
    {
        return $this->descargas;
    }

    public function setDescargas(?int $descargas): static
    {
        $this->descargas = $descargas;

        return $this;
    }

    public function getPlataforma(): ?Platforms
    {
        return $this->plataforma;
    }

    public function setPlataforma(?Platforms $plataforma): static
    {
        $this->plataforma = $plataforma;

        return $this;
    }

    public function juego(string $name): string
    {
        return '¡Hola, tu juego es '. $name . '!';
    }
}
