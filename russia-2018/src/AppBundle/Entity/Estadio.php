<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Estadio
 *
 * @ORM\Table(name="estadio")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EstadioRepository")
 */
class Estadio
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=30, unique=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=100, unique=true)
     */
    private $direccion;

    /**
     * @var bool
     *
     * @ORM\Column(name="estado", type="boolean")
     */
    private $estado;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Estadio
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Estadio
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     *
     * @return Estadio
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return bool
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Equipo", mappedBy="estadio")
     */
    private $equipos;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Partido", mappedBy="estadio")
     */
    private $partidos;

    public function __construct()
    {
        $this->equipos = new ArrayCollection();
        $this->partidos = new ArrayCollection();
    }


    /**
     * Set equipos
     *
     * @param \AppBundle\Entity\Equipo $equipos
     *
     * @return Estadio
     */
    public function setEquipos(\AppBundle\Entity\Equipo $equipos = null)
    {
        $this->equipos = $equipos;

        return $this;
    }

    /**
     * Get equipos
     *
     * @return \AppBundle\Entity\Equipo
     */
    public function getEquipos()
    {
        return $this->equipos;
    }

    /**
     * Add partido
     *
     * @param \AppBundle\Entity\Partido $partido
     *
     * @return Estadio
     */
    public function addPartido(\AppBundle\Entity\Partido $partido)
    {
        $this->partidos[] = $partido;

        return $this;
    }

    /**
     * Remove partido
     *
     * @param \AppBundle\Entity\Partido $partido
     */
    public function removePartido(\AppBundle\Entity\Partido $partido)
    {
        $this->partidos->removeElement($partido);
    }

    /**
     * Get partidos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPartidos()
    {
        return $this->partidos;
    }
}
