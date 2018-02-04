<?php

namespace Linasmatkasse\TestAssignmentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * User
 */
class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="Linasmatkasse\TestAssignmentBundle\Entity\Delivery", inversedBy="users")
     */
    private $deliveries;

    /**
     * User constructor.
     * @param $name
     */
    public function __construct($name) {
        $this->name = $name;
        $this->deliveries = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function addDelivery(Delivery $delivery)
    {
        $this->deliveries[] = $delivery;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeliveries()
    {
        return $this->deliveries;
    }
}

