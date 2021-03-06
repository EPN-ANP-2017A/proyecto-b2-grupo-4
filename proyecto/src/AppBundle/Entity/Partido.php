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
     * @ORM\ManyToOne(targetEntity="Equipo", inversedBy="equipos_locales")
     * @ORM\JoinColumn(name="equipo_local_id", referencedColumnName="id")
     */
    private $equipo_local;

    /**
     * Set equipoLocal
     *
     * @param \AppBundle\Entity\Equipo $equipoLocal
     *
     * @return Partido
     */
    public function setEquipoLocal(\AppBundle\Entity\Equipo $equipoLocal = null)
    {
        $this->equipo_local = $equipoLocal;

        return $this;
    }

    /**
     * Get equipoLocal
     *
     * @return \AppBundle\Entity\Equipo
     */
    public function getEquipoLocal()
    {
        return $this->equipo_local;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Equipo", inversedBy="equipos_visitantes")
     * @ORM\JoinColumn(name="equipo_visitante_id", referencedColumnName="id")
     */
    private $equipo_visitante;


    /**
     * Set equipoVisitante
     *
     * @param \AppBundle\Entity\Equipo $equipoVisitante
     *
     * @return Partido
     */
    public function setEquipoVisitante(\AppBundle\Entity\Equipo $equipoVisitante = null)
    {
        $this->equipo_visitante = $equipoVisitante;

        return $this;
    }

    /**
     * Get equipoVisitante
     *
     * @return \AppBundle\Entity\Equipo
     */
    public function getEquipoVisitante()
    {
        return $this->equipo_visitante;
    }

    /**
     * @ORM\OneToMany(targetEntity="Tarjetas", mappedBy="partido")
     */
    private $tarjetas;

    /**
     * Add tarjeta
     *
     * @param \AppBundle\Entity\Tarjetas $tarjeta
     *
     * @return Partido
     */
    public function addTarjeta(\AppBundle\Entity\Tarjetas $tarjeta)
    {
        $this->tarjetas[] = $tarjeta;

        return $this;
    }

    /**
     * Remove tarjeta
     *
     * @param \AppBundle\Entity\Tarjetas $tarjeta
     */
    public function removeTarjeta(\AppBundle\Entity\Tarjetas $tarjeta)
    {
        $this->tarjetas->removeElement($tarjeta);
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
     * @ORM\OneToMany(targetEntity="Goles", mappedBy="partido")
     */
    private $goles;

    public function __construct()
    {
        $this->tarjetas = new ArrayCollection();
        $this->goles = new ArrayCollection();
    }

    /**
     * Add gole
     *
     * @param \AppBundle\Entity\Goles $gole
     *
     * @return Partido
     */
    public function addGole(\AppBundle\Entity\Goles $gole)
    {
        $this->goles[] = $gole;

        return $this;
    }

    /**
     * Remove gole
     *
     * @param \AppBundle\Entity\Goles $gole
     */
    public function removeGole(\AppBundle\Entity\Goles $gole)
    {
        $this->goles->removeElement($gole);
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
