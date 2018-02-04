<?php
namespace Linasmatkasse\TestAssignmentBundle\DataFixtures\ORM;
use Linasmatkasse\TestAssignmentBundle\Entity\Delivery;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class UserFixtures
 */
class DeliveryFixtures extends Fixture
{
    /**
     * Load
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $deliveryForTom1 = new Delivery('Tom Delivery 1');
        $deliveryForTom2 = new Delivery('Dave Delivery 2');
        $deliveryForDave1 = new Delivery('Dave Delivery 1');

        $manager->persist($deliveryForTom1);
        $manager->persist($deliveryForTom2);
        $manager->persist($deliveryForDave1);

        $manager->flush();

        $this->addReference('tom-delivery-1', $deliveryForTom1);
        $this->addReference('tom-delivery-2', $deliveryForTom2);
        $this->addReference('dave-delivery-1', $deliveryForDave1);
    }
}