<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chief
 *
 * @ORM\Table(name="chief")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ChiefRepository")
 */
class Chief
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="education", type="string", length=255, nullable=true)
     */
    private $education;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=true)
     */
    private $location;

    /**
     * @var int
     *
     * @ORM\Column(name="visitRadius", type="integer", nullable=true)
     */
    private $visitRadius;

    /**
     * @var array
     *
     * @ORM\Column(name="tags", type="array")
     */
    private $tags;

    /**
     * @var bool
     *
     * @ORM\Column(name="verified", type="boolean")
     */
    private $verified;

    /**
     * @var bool
     *
     * @ORM\Column(name="verifyRequested", type="boolean")
     */
    private $verifyRequested;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="subscriptionEndDate", type="datetime", nullable=true)
     */
    private $subscriptionEndDate;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Request", mappedBy="chief")
     */
    private $chiefRequests;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Review", mappedBy="chief")
     */
    private $reviews;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;

    /**
     * @var User
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User", mappedBy="chief")
     */
    private $user;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set education
     *
     * @param string $education
     *
     * @return Chief
     */
    public function setEducation($education)
    {
        $this->education = $education;

        return $this;
    }

    /**
     * Get education
     *
     * @return string
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Chief
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Chief
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set visitRadius
     *
     * @param integer $visitRadius
     *
     * @return Chief
     */
    public function setVisitRadius($visitRadius)
    {
        $this->visitRadius = $visitRadius;

        return $this;
    }

    /**
     * Get visitRadius
     *
     * @return int
     */
    public function getVisitRadius()
    {
        return $this->visitRadius;
    }

    /**
     * Set tags
     *
     * @param array $tags
     *
     * @return Chief
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set verified
     *
     * @param boolean $verified
     *
     * @return Chief
     */
    public function setVerified($verified)
    {
        $this->verified = $verified;

        return $this;
    }

    /**
     * Get verified
     *
     * @return bool
     */
    public function getVerified()
    {
        return $this->verified;
    }

    /**
     * Set verifyRequested
     *
     * @param boolean $verifyRequested
     *
     * @return Chief
     */
    public function setVerifyRequested($verifyRequested)
    {
        $this->verifyRequested = $verifyRequested;

        return $this;
    }

    /**
     * Get verifyRequested
     *
     * @return bool
     */
    public function getVerifyRequested()
    {
        return $this->verifyRequested;
    }

    /**
     * Set subscriptionEndDate
     *
     * @param \DateTime $subscriptionEndDate
     *
     * @return Chief
     */
    public function setSubscriptionEndDate($subscriptionEndDate)
    {
        $this->subscriptionEndDate = $subscriptionEndDate;

        return $this;
    }

    /**
     * Get subscriptionEndDate
     *
     * @return \DateTime
     */
    public function getSubscriptionEndDate()
    {
        return $this->subscriptionEndDate;
    }

    /**
     * @return array
     */
    public function getChiefRequests()
    {
        return $this->chiefRequests;
    }

    /**
     * @param array $chiefRequests
     */
    public function setChiefRequests($chiefRequests)
    {
        $this->chiefRequests = $chiefRequests;
    }

    /**
     * @return array
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    /**
     * @param array $reviews
     */
    public function setReviews($reviews)
    {
        $this->reviews = $reviews;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

}

