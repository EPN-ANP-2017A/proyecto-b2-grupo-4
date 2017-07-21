<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tarjetas
 *
 * @ORM\Table(name="tarjetas")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TarjetasRepository")
 */
class Tarjetas
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
     * @ORM\ManyToOne(targetEntity="Jugador", inversedBy="tarjetas")
     * @ORM\JoinColumn(name="jugador_Id", referencedColumnName="id")
     */
    private $jugador;

    /**
     * @ORM\ManyToOne(targetEntity="Partido", inversedBy="tarjetas")
     * @ORM\JoinColumn(name="partido_Id", referencedColumnName="id")
     */
    private $partido;

    /**
     * @var bool
     *
     * @ORM\Column(name="tarjeta_amarilla", type="boolean")
     */
    private $tarjetaAmarilla;

    /**
     * @var bool
     *
     * @ORM\Column(name="tarjeta_roja", type="boolean")
     */
    private $tarjetaRoja;

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
     * Set tarjetaAmarilla
     *
     * @param boolean $tarjetaAmarilla
     *
     * @return Tarjetas
     */
    public function setTarjetaAmarilla($tarjetaAmarilla)
    {
        $this->tarjetaAmarilla = $tarjetaAmarilla;

        return $this;
    }

    /**
     * Get tarjetaAmarilla
     *
     * @return bool
     */
    public function getTarjetaAmarilla()
    {
        return $this->tarjetaAmarilla;
    }

    /**
     * Set tarjetaRoja
     *
     * @param boolean $tarjetaRoja
     *
     * @return Tarjetas
     */
    public function setTarjetaRoja($tarjetaRoja)
    {
        $this->tarjetaRoja = $tarjetaRoja;

        return $this;
    }

    /**
     * Get tarjetaRoja
     *
     * @return bool
     */
    public function getTarjetaRoja()
    {
        return $this->tarjetaRoja;
    }


    /**
     * Set jugador
     *
     * @param \AppBundle\Entity\Jugador $jugador
     *
     * @return Jugador
     */
    public function setJugador(\AppBundle\Entity\Jugador $jugador = null)
    {
        $this->jugador = $jugador;

        return $this;
    }

    /**
     * Get jugador
     *
     * @return \AppBundle\Entity\Jugador
     */
    public function getJugador()
    {
        return $this->jugador;
    }

    /**
     * Set partido
     *
     * @param \AppBundle\Entity\Partido $partido
     *
     * @return Partido
     */
    public function setPartido(\AppBundle\Entity\Jugador $partido = null)
    {
        $this->partido = $partido;

        return $this;
    }

    /**
     * Get partido
     *
     * @return \AppBundle\Entity\Partido
     */
    public function getRol()
    {
        return $this->jugador;
    }

}

