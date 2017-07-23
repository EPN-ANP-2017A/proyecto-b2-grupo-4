<?php

namespace AppBundle\Entity;

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
     * @ORM\Column(name="nombre", type="string", length=30, unique=true)
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario", inversedBy="equipos")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    private $equipos;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Jugador", mappedBy="equipo")
     */
    private $jugadores;


    //aqui hay algo raro
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Partido", mappedBy="equipo_local")
     */
    private $partido;

    public function __construct()
    {
        $this->jugadores = new ArrayCollection();
        $this->partido = new ArrayCollection();
    }

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Estadio", inversedBy="equipo")
     * @ORM\JoinColumn(name="estadio_id", referencedColumnName="id")
     */
    private $estadio;

    /**
     * Set equipos
     *
     * @param \AppBundle\Entity\Usuario $equipos
     *
     * @return Equipo
     */
    public function setEquipos(\AppBundle\Entity\Usuario $equipos = null)
    {
        $this->equipos = $equipos;

        return $this;
    }

    /**
     * Get equipos
     *
     * @return \AppBundle\Entity\Usuario
     */
    public function getEquipos()
    {
        return $this->equipos;
    }

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
     * Add partido
     *
     * @param \AppBundle\Entity\Partido $partido
     *
     * @return Equipo
     */
    public function addPartido(\AppBundle\Entity\Partido $partido)
    {
        $this->partido[] = $partido;

        return $this;
    }

    /**
     * Remove partido
     *
     * @param \AppBundle\Entity\Partido $partido
     */
    public function removePartido(\AppBundle\Entity\Partido $partido)
    {
        $this->partido->removeElement($partido);
    }

    /**
     * Get partido
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPartido()
    {
        return $this->partido;
    }

    /**
     * Set estadio
     *
     * @param \AppBundle\Entity\Estadio $estadio
     *
     * @return Equipo
     */
    public function setEstadio(\AppBundle\Entity\Estadio $estadio = null)
    {
        $this->estadio = $estadio;

        return $this;
    }

    /**
     * Get estadio
     *
     * @return \AppBundle\Entity\Estadio
     */
    public function getEstadio()
    {
        return $this->estadio;
    }
}
