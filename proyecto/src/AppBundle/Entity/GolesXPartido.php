<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GolesXPartido
 *
 * @ORM\Table(name="goles_x_partido")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GolesXPartidoRepository")
 */
class GolesXPartido
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
     * @ORM\Column(name="numero", type="integer")
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
     * Set numero
     *
     * @param integer $numero
     *
     * @return GolesXPartido
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
     * @ORM\ManyToOne(targetEntity="Jugador", inversedBy="goles")
     * @ORM\JoinColumn(name="jugador_id", referencedColumnName="id")
     */
    private $jugador;

    /**
     * @ORM\ManyToOne(targetEntity="Partido", inversedBy="goles")
     * @ORM\JoinColumn(name="partido_id", referencedColumnName="id")
     */
    private $partido;

    /**
     * Set jugador
     *
     * @param \AppBundle\Entity\Jugador $jugador
     *
     * @return GolesXPartido
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
     * @return GolesXPartido
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
