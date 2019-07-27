<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Translate
 *
 * @ORM\Table(name="translate")
 * @ORM\Entity()
 */
class Translate
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
     * @ORM\Column(name="ru", type="text", nullable=true)
     */
    private $ru;

    /**
     * @var string
     *
     * @ORM\Column(name="en", type="text", nullable=true)
     */
    private $en;


    /**
     * @var string
     *
     * @ORM\Column(name="ky", type="text", nullable=true)
     */
    private $ky;

    /**
     * @var string
     *
     * @ORM\Column(name="attribute", type="string", length=255)
     */
    private $attribute;

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
     * Set ru
     *
     * @param string $ru
     * @return Translate
     */
    public function setRu($ru)
    {
        $this->ru = $ru;

        return $this;
    }

    /**
     * Get ru
     *
     * @return string 
     */
    public function getRu()
    {
        return $this->ru;
    }

    /**
     * Set en
     *
     * @param string $en
     * @return Translate
     */
    public function setEn($en)
    {
        $this->en = $en;

        return $this;
    }

    /**
     * Get en
     *
     * @return string 
     */
    public function getEn()
    {
        return $this->en;
    }

    /**
     * Set attribute
     *
     * @param string $attribute
     * @return Translate
     */
    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;

        return $this;
    }

    /**
     * Get attribute
     *
     * @return string 
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * @return string
     */
    public function getKy()
    {
        return $this->ky;
    }

    /**
     * @param string $ky
     */
    public function setKy($ky)
    {
        $this->ky = $ky;
    }
}
