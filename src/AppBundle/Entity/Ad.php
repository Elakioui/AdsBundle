<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ad
 * @ORM\Table("Ad")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AdRepository")
 */
class Ad
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
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modif", type="datetime")
     */
    private $dateModif;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_pub", type="datetime")
     */
    private $datePub;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=120)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=100)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\UserAd",inversedBy="ads", cascade={"persist"})
     */
    private $userAd;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Category",inversedBy="ads",cascade={"persist"})
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Picture",mappedBy="ad")
     */
    private $pictures;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\City",inversedBy="ads")
     */
    private $city ;

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
     * Set body
     *
     * @param string $body
     * @return Ad
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

   
    /**
     * Set dateModif
     *
     * @param \DateTime $dateModif
     * @return Ad
     */
    public function setDateModif($dateModif)
    {
        $this->dateModif = $dateModif;

        return $this;
    }

    /**
     * Get dateModif
     *
     * @return \DateTime 
     */
    public function getDateModif()
    {
        return $this->dateModif;
    }

    /**
     * Set datePub
     *
     * @param \DateTime $datePub
     * @return Ad
     */
    public function setDatePub($datePub)
    {
        $this->datePub = $datePub;

        return $this;
    }

    /**
     * Get datePub
     *
     * @return \DateTime 
     */
    public function getDatePub()
    {
        return $this->datePub;
    }

    /**
     * Set prix
     *
     * @param float $prix
     * @return Ad
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Ad
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Ad
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pictures = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set userAd
     *
     * @param \AppBundle\Entity\UserAd $userAd
     * @return Ad
     */
    public function setUserAd(\AppBundle\Entity\UserAd $userAd = null)
    {
        $this->userAd = $userAd;

        return $this;
    }

    /**
     * Get userAd
     *
     * @return \AppBundle\Entity\UserAd 
     */
    public function getUserAd()
    {
        return $this->userAd;
    }

    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     * @return Ad
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add pictures
     *
     * @param \AppBundle\Entity\Picture $pictures
     * @return Ad
     */
    public function addPicture(\AppBundle\Entity\Picture $pictures)
    {
        $this->pictures[] = $pictures;

        return $this;
    }

    /**
     * Remove pictures
     *
     * @param \AppBundle\Entity\Picture $pictures
     */
    public function removePicture(\AppBundle\Entity\Picture $pictures)
    {
        $this->pictures->removeElement($pictures);
    }

    /**
     * Get pictures
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPictures()
    {
        return $this->pictures;
    }

    /**
     * Set city
     *
     * @param \AppBundle\Entity\City $city
     * @return Ad
     */
    public function setCity(\AppBundle\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \AppBundle\Entity\City 
     */
    public function getCity()
    {
        return $this->city;
    }
}
