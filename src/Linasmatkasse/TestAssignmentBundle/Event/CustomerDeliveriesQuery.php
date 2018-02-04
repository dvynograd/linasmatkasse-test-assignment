<?php

namespace Linasmatkasse\TestAssignmentBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Linasmatkasse\TestAssignmentBundle\Entity\Delivery;

/**
 * CustomerDeliveriesQuery
 **/
class CustomerDeliveriesQuery extends Event
{
    const NAME = 'customer.deliveries.query';

    /**
     * @var int
     */
    private $userId;

    /**
     * @var Delivery[]
     */
    private $deliveries;

    /**
     * CustomerDeliveriesQuery constructor.
     * @param int $userId
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }


    /**
     * @param Delivery[] $deliveries
     */
    public function setDeliveries($deliveries)
    {
        $this->deliveries = $deliveries;
    }

    /**
     * @return Delivery[]
     */
    public function getDeliveries()
    {
        return $this->deliveries;
    }


}
