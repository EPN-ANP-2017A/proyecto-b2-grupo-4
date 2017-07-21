<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\ManyToOne(targetEntity="Equipo", inversedBy="partidos")
     * @ORM\JoinColumn(name="local_Id", referencedColumnName="id")
     */
    private $local;

    /**
     * @ORM\ManyToOne(targetEntity="Equipo", inversedBy="partidos")
     * @ORM\JoinColumn(name="visitante_Id", referencedColumnName="id")
     */
    private $visitante;

    /**
     * @ORM\OneToMany(targetEntity="Goles", mappedBy="partido")
     */
    private $goles;

    /**
     * @ORM\OneToMany(targetEntity="Tarjetas", mappedBy="partido")
     */
    private $tarjetas;

    public function __construct()
    {
        $this->goles = new ArrayCollection();
        $this->tarjetas = new ArrayCollection();
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora", type="datetime")
     */
    private $hora;

    /**
     * @var string
     *
     * @ORM\Column(name="lugar", type="string", length=50)
     */
    private $lugar;


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
     * Set lugar
     *
     * @param string $lugar
     *
     * @return Partido
     */
    public function setLugar($lugar)
    {
        $this->lugar = $lugar;

        return $this;
    }

    /**
     * Get lugar
     *
     * @return string
     */
    public function getLugar()
    {
        return $this->lugar;
    }

    //Setter y guetters local

    /**
     * Set local
     *
     * @param \AppBundle\Entity\Equipo $local
     *
     * @return Equipo
     */
    public function setLocal(\AppBundle\Entity\Equipo $local = null)
    {
        $this->local = $local;

        return $this;
    }

    /**
     * Get local
     *
     * @return \AppBundle\Entity\Equipo
     */
    public function getLocal()
    {
        return $this->local;
    }

    //setters y guetters visitante

    /**
     * Set visitante
     *
     * @param \AppBundle\Entity\Equipo $visitante
     *
     * @return Equipo
     */
    public function setVisiatnte(\AppBundle\Entity\Equipo $visitante = null)
    {
        $this->visitante = $visitante;

        return $this;
    }

    /**
     * Get visitante
     *
     * @return \AppBundle\Entity\Equipo
     */
    public function getVisitante()
    {
        return $this->visitante;
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

    //Tarjetas

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
     * Get tarjetas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTarjetas()
    {
        return $this->tarjetas;
    }
}

