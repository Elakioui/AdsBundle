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
use AppBundle\Entity\Picture;

class PictureData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $picture1 = new Picture();
        $picture1->setAlt('image 1');
        $picture1->setPath('http://www.luxury-club.fr/upload/image/location-voiture-luxe/lamborghini-aventador.jpg');


        $manager->persist($picture1);
        $manager->flush();

        $this->addReference('picture1', $picture1);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}
