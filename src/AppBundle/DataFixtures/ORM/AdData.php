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
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Ad;


class AdData extends AbstractFixture implements OrderedFixtureInterface,ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        $ad1 = new  Ad();
        $ad1->setBody('annonce 1 body ');
        $ad1->setCity($this->getReference('nador'));
        $ad1->setDateModif(new \DateTime('now'));
        $ad1->setDatePub(new \DateTime('now'));
        $ad1->setUserAd($this->getReference('userAd1'));
        $ad1->setCategory($this->getReference('category1'));
        $ad1->setPrix('220');
        $ad1->setTitle('voiture super');
        $ad1->setType('Particulier');

        $manager->persist($ad1);
        $manager->flush();

        $this->addReference('ad1', $ad1);

    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 5; // the order in which fixtures will be loaded
    }
}
