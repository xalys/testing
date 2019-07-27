<?php

namespace CategoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Land
 *
 * @ORM\Table(name="land")
 * @ORM\Entity()
 */
class Land
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media",cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="photo_id", referencedColumnName="id", onDelete="SET NULL")
     * })
     */
    private $photo;


    public function __construct()
    {
    }

    public function __toString()
    {
        return (string) $this->title . "";
    }

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
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }


}
