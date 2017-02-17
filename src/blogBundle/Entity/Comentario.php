<?php

namespace blogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comentario
 */
class Comentario
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $contenido;

    /**
     * @var int
     */
    private $usuarioId;

    /**
     * @var int
     */
    private $mensajeId;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     * @return Comentario
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get contenido
     *
     * @return string 
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Set usuarioId
     *
     * @param integer $usuarioId
     * @return Comentario
     */
    public function setUsuarioId($usuarioId)
    {
        $this->usuarioId = $usuarioId;

        return $this;
    }

    /**
     * Get usuarioId
     *
     * @return integer 
     */
    public function getUsuarioId()
    {
        return $this->usuarioId;
    }

    /**
     * Set mensajeId
     *
     * @param integer $mensajeId
     * @return Comentario
     */
    public function setMensajeId($mensajeId)
    {
        $this->mensajeId = $mensajeId;

        return $this;
    }

    /**
     * Get mensajeId
     *
     * @return integer 
     */
    public function getMensajeId()
    {
        return $this->mensajeId;
    }
}
