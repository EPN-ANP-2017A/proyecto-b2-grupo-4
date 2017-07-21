<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsuarioRepository")
 */
class Usuario
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
     * @ORM\Column(name="cedula", type="string", length=10, nullable=true, unique=true)
     */
    private $cedula;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=50, nullable=true)
     */
    private $apellido;

    /**
     * @ORM\ManyToOne(targetEntity="Rol", inversedBy="usuarios")
     * @ORM\JoinColumn(name="rol_Id", referencedColumnName="id")
     */
    private $rol;

    /**
     * @ORM\OneToMany(targetEntity="Jugador", mappedBy="usuarios")
     */
    private $jugadores;

    /**
     * @ORM\OneToMany(targetEntity="Equipo", mappedBy="usuarios")
     */
    private $equipos;

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
     * Set cedula
     *
     * @param string $cedula
     *
     * @return Usuario
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Usuario
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
     * @return Usuario
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
     * Set rol
     *
     * @param \AppBundle\Entity\Rol $rol
     *
     * @return Rol
     */
    public function setRol(\AppBundle\Entity\Rol $rol = null)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return \AppBundle\Entity\Rol
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set jugadores
     *
     * @param \AppBundle\Entity\Jugador $jugadores
     *
     * @return Jugador
     */
    public function setJugadores(\AppBundle\Entity\Jugador $jugadores = null)
    {
        $this->jugadores = $jugadores;

        return $this;
    }

    /**
     * Get jugadores
     *
     * @return \AppBundle\Entity\Jugador
     */
    public function getJugadores()
    {
        return $this->jugadores;
    }

    /**
     * Set equipos
     *
     * @param \AppBundle\Entity\Equipo $equipos
     *
     * @return Equipo
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

}

