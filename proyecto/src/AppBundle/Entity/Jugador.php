<?php

namespace AppBundle\Entity;

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
     * @ORM\Column(name="nombre", type="string", length=30, unique=true)
     */
    private $nombre;

    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer", unique=true)
     */
    private $numero;


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
     * Set numero
     *
     * @param integer $numero
     *
     * @return Jugador
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Equipo", inversedBy="jugadores")
     * @ORM\JoinColumn(name="equipo_id", referencedColumnName="id")
     */
    private $equipo;

//    /**
//     * @ORM\OneToMany(targetEntity="TarjetasXPatido", mappedBy="jugador")
//     */
//    private $tarjetas;

//    /**
//     * @ORM\OneToMany(targetEntity="GolesXPatido", mappedBy="jugador")
//     */
//    private $goles;
//
//
//    public function __construct()
//    {
////        $this->tarjetas = new ArrayCollection();
//        $this->goles = new ArrayCollection();
//    }


    /**
     * Set equipo
     *
     * @param \AppBundle\Entity\Equipo $equipo
     *
     * @return Jugador
     */
    public function setEquipo(\AppBundle\Entity\Equipo $equipo = null)
    {
        $this->equipo = $equipo;

        return $this;
    }

    /**
     * Get equipo
     *
     * @return \AppBundle\Entity\Equipo
     */
    public function getEquipo()
    {
        return $this->equipo;
    }
}
