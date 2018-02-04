<?php

namespace Linasmatkasse\TestAssignmentBundle\Event;

use Linasmatkasse\TestAssignmentBundle\Repository\UserRepository;
use Linasmatkasse\TestAssignmentBundle\Entity\Delivery;
use Symfony\Component\Config\Definition\Exception\Exception;


class CustomerDeliveriesQueryHandler
{
    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * onCustomerDeliveriesQuery
     *
     * @param CustomerDeliveriesQuery $event
     * @return Delivery[]
     */
    public function onCustomerDeliveriesQuery(CustomerDeliveriesQuery $event)
    {
        $user = $this->repository->find($event->getUserId());
        if (!$user) {
            throw new Exception("User wasn't found");
        }
        $event->setDeliveries($user->getDeliveries());
    }
}
