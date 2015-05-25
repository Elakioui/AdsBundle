<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table("category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=120)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ad",mappedBy="category",cascade={"persist"})
     */
    private $ads;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Picture",cascade={"persist"})
     */
    private $picture;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ads = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ads
     *
     * @param \AppBundle\Entity\ad $ads
     * @return Category
     */
    public function addAd(\AppBundle\Entity\ad $ads)
    {
        $this->ads[] = $ads;

        return $this;
    }

    /**
     * Remove ads
     *
     * @param \AppBundle\Entity\ad $ads
     */
    public function removeAd(\AppBundle\Entity\ad $ads)
    {
        $this->ads->removeElement($ads);
    }

    /**
     * Get ads
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAds()
    {
        return $this->ads;
    }

    /**
     * Set picture
     *
     * @param \AppBundle\Entity\Picture $picture
     * @return Category
     */
    public function setPicture(\AppBundle\Entity\Picture $picture = null)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return \AppBundle\Entity\Picture 
     */
    public function getPicture()
    {
        return $this->picture;
    }
}
