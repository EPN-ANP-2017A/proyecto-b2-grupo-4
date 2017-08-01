<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TarjetasXPartido
 *
 * @ORM\Table(name="tarjetas_x_partido")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TarjetasXPartidoRepository")
 */
class TarjetasXPartido
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
     * @var int
     *
     * @ORM\Column(name="tarjetas_amarillas", type="integer")
     */
    private $tarjetasAmarillas;

    /**
     * @var int
     *
     * @ORM\Column(name="tarjetas_rojas", type="integer")
     */
    private $tarjetasRojas;


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
     * Set tarjetasAmarillas
     *
     * @param integer $tarjetasAmarillas
     *
     * @return TarjetasXPartido
     */
    public function setTarjetasAmarillas($tarjetasAmarillas)
    {
        $this->tarjetasAmarillas = $tarjetasAmarillas;

        return $this;
    }

    /**
     * Get tarjetasAmarillas
     *
     * @return int
     */
    public function getTarjetasAmarillas()
    {
        return $this->tarjetasAmarillas;
    }

    /**
     * Set tarjetasRojas
     *
     * @param integer $tarjetasRojas
     *
     * @return TarjetasXPartido
     */
    public function setTarjetasRojas($tarjetasRojas)
    {
        $this->tarjetasRojas = $tarjetasRojas;

        return $this;
    }

    /**
     * Get tarjetasRojas
     *
     * @return int
     */
    public function getTarjetasRojas()
    {
        return $this->tarjetasRojas;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Jugador", inversedBy="tarjetas")
     * @ORM\JoinColumn(name="jugador_id", referencedColumnName="id")
     */
    private $jugador;

    /**
     * @ORM\ManyToOne(targetEntity="Partido", inversedBy="tarjetas")
     * @ORM\JoinColumn(name="partido_id", referencedColumnName="id")
     */
    private $partido;

    /**
     * Set jugador
     *
     * @param \AppBundle\Entity\Jugador $jugador
     *
     * @return TarjetasXPartido
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
     * @return TarjetasXPartido
     */
    public function setPartido(\AppBundle\Entity\Partido $partido = null)
    {
        $this->partido = $partido;

        return $this;
    }

    /**
     * Get partido
     *
     * @return \AppBundle\Entity\Partido
     */
    public function getPartido()
    {
        return $this->partido;
    }
}
