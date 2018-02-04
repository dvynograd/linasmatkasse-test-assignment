<?php
namespace Linasmatkasse\TestAssignmentBundle\DataFixtures\ORM;
use Linasmatkasse\TestAssignmentBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


/**
 * Class UserFixtures
 */
class UserFixtures extends Fixture
{
    /**
     * Load
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $tom = new User('Tom');
        $tom->addDelivery($this->getReference('tom-delivery-1'));
        $tom->addDelivery($this->getReference('tom-delivery-2'));
        $dave = new User('Dave');
        $dave->addDelivery($this->getReference('dave-delivery-1'));

        $manager->persist($tom);
        $manager->persist($dave);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            DeliveryFixtures::class,
        );
    }
}