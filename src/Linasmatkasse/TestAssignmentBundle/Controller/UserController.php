<?php

namespace Linasmatkasse\TestAssignmentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Linasmatkasse\TestAssignmentBundle\Event\CustomerDeliveriesQuery;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\Response;


class UserController extends Controller
{
    /**
     * @Route("/users/{userId}/deliveries", name="user_deliveries", requirements={"userId"="^[1-9]\d*$"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($userId)
    {
        $this->getDoctrine();
        $event = new CustomerDeliveriesQuery($userId);
        $this->container->get('event_dispatcher')->dispatch('customer.deliveries.query', $event);

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);
        return new Response($serializer->serialize($event->getDeliveries(), 'json'));
    }
}
