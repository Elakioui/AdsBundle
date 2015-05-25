<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16/05/15
 * Time: 18:11
 */

namespace  AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\City;

class CityData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
       $city1 = new City();
        $city1->setName('Nador');
        $city1->setArea('Oriental');
        $city1->setZipCode('62060');

        $manager->persist($city1);
        $manager->flush();

        $this->addReference('nador', $city1);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 4; // the order in which fixtures will be loaded
    }
}
