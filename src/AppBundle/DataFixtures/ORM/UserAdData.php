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
use AppBundle\Entity\UserAd;

class UserAdData extends AbstractFixture implements OrderedFixtureInterface,ContainerAwareInterface
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

        $userAd1 = new  UserAd();
        $userAd1->setName('mohamed');
        $userAd1->setEmail('el-asr@hotmail.fr');
        $userAd1->setEnabled(true);
        $userAd1->setUsername('zelakioui4');
        $userAd1->setPassword($this->container->get('security.encoder_factory')->getEncoder($userAd1)->encodePassword('zouhaire24', $userAd1->getSalt()));


        $manager->persist($userAd1);
        $manager->flush();

        $this->addReference('userAd1', $userAd1);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}
