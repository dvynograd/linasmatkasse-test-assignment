<?php

namespace Linasmatkasse\TestAssignmentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Delivery
 */
class Delivery
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="Linasmatkasse\TestAssignmentBundle\Entity\User", mappedBy="deliveries")
     */
    private $users;

    /**
     * Delivery constructor.
     * @param $description
     */
    public function __construct($description) {
        $this->description = $description;
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set description
     *
     * @param string $description
     *
     * @return Delivery
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}

