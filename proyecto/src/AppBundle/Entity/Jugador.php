<?php

namespace AppBundle\Entity;

use ClassesWithParents\E;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Jugador
 *
 * @ORM\Table(name="jugador")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JugadorRepository")
 */
class Jugador
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
     * @ORM\Column(name="nombre", type="string", length=80, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=80, nullable=true)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="cedula", type="string", length=10, nullable=true, unique=true)
     */
    private $cedula;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="jugadores")
     * @ORM\JoinColumn(name="usuario_Id", referencedColumnName="id")
     */
    private $usuarios;

    /**
     * @ORM\ManyToOne(targetEntity="Equipo", inversedBy="jugadores")
     * @ORM\JoinColumn(name="equipo_Id", referencedColumnName="id")
     */
    private $equipo;

    /**
     * @ORM\OneToMany(targetEntity="Tarjetas", mappedBy="jugador")
     */
    private $tarjetas;

    /**
     * @ORM\OneToMany(targetEntity="Goles", mappedBy="jugador")
     */
    private $goles;

    public function __construct()
    {
        $this->tarjetas = new ArrayCollection();
        $this->goles = new ArrayCollection();
    }


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
     * Set usuarioIdusuario
     *
     * @param integer $usuarioIdusuario
     *
     * @return Jugador
     */


    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Jugador
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
     * Set apellido
     *
     * @param string $apellido
     *
     * @return Jugador
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set cedula
     *
     * @param string $cedula
     *
     * @return Jugador
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Get cedula
     *
     * @return string
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set usuarios
     *
     * @param \AppBundle\Entity\Usuario $usuarios
     *
     * @return Usuario
     */
    public function setUsuarios(\AppBundle\Entity\Usuario $usuarios = null)
    {
        $this->usuarios = $usuarios;

        return $this;
    }

    /**
     * Get usuarios
     *
     * @return \AppBundle\Entity\Usuario
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }

    /**
     * Set equipo
     *
     * @param \AppBundle\Entity\Equipo $equipo
     *
     * @return Equipo
     */
    public function setEquipo(\AppBundle\Entity\Equipo $equipo = null)
    {
        $this->equipo = $equipo;

        return $this;
    }

    /**
     * Get equipo
     *
     * @return \AppBundle\Entity\Carrera
     */
    public function getEquipo()
    {
        return $this->equipo;
    }


    /**
     * Add tarjetas
     *
     * @param \AppBundle\Entity\Tarjetas $tarjetas
     *
     * @return Tarjetas
     */
    public function addTarjetas(\AppBundle\Entity\Tarjetas $tarjetas)
    {
        $this->tarjetas[] = $tarjetas;

        return $this;
    }

    /**
     * Remove tarjetas
     *
     * @param \AppBundle\Entity\Tarjetas $tarjetas
     */
    public function removeTarjetas(\AppBundle\Entity\Tarjetas $tarjetas)
    {
        $this->tarjetas->removeElement($tarjetas);
    }

    /**
     * Get tarjetas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTarjetas()
    {
        return $this->tarjetas;
    }

    /**
     * Add goles
     *
     * @param \AppBundle\Entity\Goles $goles
     *
     * @return Goles
     */
    public function addGoles(\AppBundle\Entity\Goles $goles)
    {
        $this->goles[] = $goles;

        return $this;
    }


    /**
     * Get goles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGoles()
    {
        return $this->goles;
    }
}

