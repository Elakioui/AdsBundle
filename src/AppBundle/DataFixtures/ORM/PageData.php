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
use AppBundle\Entity\Page;

class PageData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

         $page1 = new Page();
         $page1->setName('Test page 1');
         $page1->setBody('body page hjjfjfjfjfjfj ');
         $page1->setDatePub(new \DateTime());


         $manager->persist($page1);
         $manager->flush();

        $this->addReference('page1', $page1);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 6; // the order in which fixtures will be loaded
    }
}
