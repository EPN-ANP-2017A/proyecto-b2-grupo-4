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
     * @ORM\Column(name="nombre", type="string", length=80, nullable=true)
     */
    private $nombre;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="equipos")
     * @ORM\JoinColumn(name="usuario_Id", referencedColumnName="id")
     */
    private $usuarios;

    /**
     * @ORM\OneToMany(targetEntity="Jugador", mappedBy="equipo")
     */
    private $jugadores;

    public function __construct()
    {
        $this->jugadores = new ArrayCollection();
    }


    /**
     * @ORM\OneToMany(targetEntity="Partido", mappedBy="local")
     */
    /**
     * @ORM\OneToMany(targetEntity="Partido", mappedBy="visitante")
     */
    private $partidos;

    /**
     * Get id
     *
     * @return int
     */


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

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set usuarios
     *
     * @param \AppBundle\Entity\Usuario $usuarios
     *
     * @return Usuario
     */
    public function setUsuarios(\AppBundle\Entity\Usuario $usuario = null)
    {
        $this->usuarios = $usuario;

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
     * Add jugadores
     *
     * @param \AppBundle\Entity\Jugador $jugadores
     *
     * @return Jugador
     */
    public function addJugadores(\AppBundle\Entity\Jugador $jugadores)
    {
        $this->jugadores[] = $jugadores;

        return $this;
    }

    /**
     * Remove jugadores
     *
     * @param \AppBundle\Entity\Jugador $jugadores
     */
    public function removeEstudiante(\AppBundle\Entity\Jugador $jugadores)
    {
        $this->jugadores->removeElement($jugadores);
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
}

