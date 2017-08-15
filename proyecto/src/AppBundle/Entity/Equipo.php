<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Equipo
 *
 * @ORM\Table(name="equipo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EquipoRepository")
 */
class Equipo
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;


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
     * @return Equipo
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
     * @ORM\OneToMany(targetEntity="Jugador", mappedBy="equipo")
     */
    private $jugadores;

    /**
     * Add jugadore
     *
     * @param \AppBundle\Entity\Jugador $jugadore
     *
     * @return Equipo
     */
    public function addJugadore(\AppBundle\Entity\Jugador $jugadore)
    {
        $this->jugadores[] = $jugadore;

        return $this;
    }

    /**
     * Remove jugadore
     *
     * @param \AppBundle\Entity\Jugador $jugadore
     */
    public function removeJugadore(\AppBundle\Entity\Jugador $jugadore)
    {
        $this->jugadores->removeElement($jugadore);
    }

    /**
     * Get jugadores
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJugadores()
    {
        return $this->jugadores;
    }

    /**
     * @ORM\OneToMany(targetEntity="Partido", mappedBy="equipo_local")
     */
    private $equipos_locales;

    /**
     * Add equiposLocale
     *
     * @param \AppBundle\Entity\Partido $equiposLocale
     *
     * @return Equipo
     */
    public function addEquiposLocale(\AppBundle\Entity\Partido $equiposLocale)
    {
        $this->equipos_locales[] = $equiposLocale;

        return $this;
    }

    /**
     * Remove equiposLocale
     *
     * @param \AppBundle\Entity\Partido $equiposLocale
     */
    public function removeEquiposLocale(\AppBundle\Entity\Partido $equiposLocale)
    {
        $this->equipos_locales->removeElement($equiposLocale);
    }

    /**
     * Get equiposLocales
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEquiposLocales()
    {
        return $this->equipos_locales;
    }

    /**
     * @ORM\OneToMany(targetEntity="Partido", mappedBy="equipo_visitante")
     */
    private $equipos_visitantes;

    public function __construct()
    {
        $this->jugadores = new ArrayCollection();
        $this->equipos_locales = new ArrayCollection();
        $this->equipos_visitantes = new ArrayCollection();
    }

    /**
     * Add equiposVisitante
     *
     * @param \AppBundle\Entity\Partido $equiposVisitante
     *
     * @return Equipo
     */
    public function addEquiposVisitante(\AppBundle\Entity\Partido $equiposVisitante)
    {
        $this->equipos_visitantes[] = $equiposVisitante;

        return $this;
    }

    /**
     * Remove equiposVisitante
     *
     * @param \AppBundle\Entity\Partido $equiposVisitante
     */
    public function removeEquiposVisitante(\AppBundle\Entity\Partido $equiposVisitante)
    {
        $this->equipos_visitantes->removeElement($equiposVisitante);
    }

    /**
     * Get equiposVisitantes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEquiposVisitantes()
    {
        return $this->equipos_visitantes;
    }
}
