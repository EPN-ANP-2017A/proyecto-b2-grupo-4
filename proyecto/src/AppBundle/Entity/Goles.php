<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Goles
 *
 * @ORM\Table(name="goles")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GolesRepository")
 */
class Goles
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
     * @ORM\ManyToOne(targetEntity="Jugador", inversedBy="goles")
     * @ORM\JoinColumn(name="jugador_Id", referencedColumnName="id")
     */
    private $jugador;

    /**
     * @ORM\ManyToOne(targetEntity="Partido", inversedBy="goles")
     * @ORM\JoinColumn(name="partido_Id", referencedColumnName="id")
     */
    private $partido;

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
    public function setCarrera(\AppBundle\Entity\Partido $partido = null)
    {
        $this->partido = $partido;

        return $this;
    }

    /**
     * Get partido
     *
     * @return \AppBundle\Entity\Partido
     */
    public function getCarrera()
    {
        return $this->partido;
    }
}

