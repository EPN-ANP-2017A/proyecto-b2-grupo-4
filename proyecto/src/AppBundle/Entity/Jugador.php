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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=255, unique=true)
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
     * @param string $numero
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
     * @return string
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

    /**
     * @ORM\OneToMany(targetEntity="Tarjetas", mappedBy="jugador")
     */
    private $tarjetas;

    /**
     * Add tarjeta
     *
     * @param \AppBundle\Entity\Tarjetas $tarjeta
     *
     * @return Jugador
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
     * @ORM\OneToMany(targetEntity="Goles", mappedBy="jugador")
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
     * @return Jugador
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
