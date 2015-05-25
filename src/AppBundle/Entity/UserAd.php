<?php

namespace AppBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * UserAd
 *
 * @ORM\Table("user_ad")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserAdRepository")
 */
class UserAd extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected  $id;



    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=120)
     * @Assert\NotBlank(message="Svp, entrer votre numéro de téléphone.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=10,
     *     max="10",
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    private $phone;

     /**
      * @var string
      * @Assert\NotBlank(message="Svp, choisir  votre status", groups={"Registration", "Profile"})
      * @Assert\Length(
      *     min=3,
      *     max="255",
      *     minMessage="The name is too short.",
      *     maxMessage="The name is too long.",
      *     groups={"Registration", "Profile"}
      * )
     * @ORM\Column(name="status", type="string", length=120)
     */
    private $status;
    /**
     * @var string
     * @ORM\Column(name="phone_displayed", type="boolean")
     */
    private $phoneDisplayed;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\City", cascade={"persist"})
     */

    private $city;


    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Ad",mappedBy="userAd")
     */
    private $ads;


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
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->ads = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


    /**
     * Add ads
     *
     * @param \AppBundle\Entity\Ad $ads
     * @return UserAd
     */
    public function addAd(\AppBundle\Entity\Ad $ads)
    {
        $this->ads[] = $ads;

        return $this;
    }

    /**
     * Remove ads
     *
     * @param \AppBundle\Entity\Ad $ads
     */
    public function removeAd(\AppBundle\Entity\Ad $ads)
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
     * Set city
     *
     * @param \AppBundle\Entity\City $city
     * @return UserAd
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

    /**
     * @return mixed
     */
    public function getPhoneDisplayed()
    {
        return $this->phoneDisplayed;
    }

    /**
     * @param mixed $phoneDisplayed
     */
    public function setPhoneDisplayed($phoneDisplayed)
    {
        $this->phoneDisplayed = $phoneDisplayed;
    }

}
