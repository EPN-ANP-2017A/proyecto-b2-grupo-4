<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partido
 *
 * @ORM\Table(name="partido")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PartidoRepository")
 */
class Partido
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora", type="time")
     */
    private $hora;


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
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Partido
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set hora
     *
     * @param \DateTime $hora
     *
     * @return Partido
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Equipo", inversedBy="id")
     * @ORM\JoinColumn(name="equipo_local_id", referencedColumnName="id")
     */
    private $equipo_local;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Equipo", inversedBy="id")
     * @ORM\JoinColumn(name="equipo_visitante_id", referencedColumnName="id")
     */
    private $equipo_visitante;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Estadio", inversedBy="id")
     * @ORM\JoinColumn(name="estadio_id", referencedColumnName="id")
     */
    private $estadio;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Tarjetas", mappedBy="id")
     */
    private $tarjeta;

    public function __construct()
    {
        $this->tarjeta = new ArrayCollection();
    }

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Goles", mappedBy="id")
     */
    private $gol;

    public function __construct5()
    {
        $this->gol = new ArrayCollection();
    }
}

