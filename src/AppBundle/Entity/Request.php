<?php

namespace AppBundle\Entity;

use AppBundle\Enum\RequestStatus;
use Doctrine\ORM\Mapping as ORM;

/**
 * Request
 *
 * @ORM\Table(name="request")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RequestRepository")
 */
class Request
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
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="requests")
     */
    private $client;

    /**
     * @var Chief
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Chief", inversedBy="chiefRequests")
     */
    private $chief;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="arrivalDateTime", type="datetime", nullable=true)
     */
    private $arrivalDateTime;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="text")
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="requestType", type="integer")
     */
    private $requestType;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Comment", mappedBy="request")
     */
    private $comments;

    /**
     * @var Review
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Review", mappedBy="request")
     */
    private $review;

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
     * Set arrivalDateTime
     *
     * @param \DateTime $arrivalDateTime
     *
     * @return Request
     */
    public function setArrivalDateTime($arrivalDateTime)
    {
        $this->arrivalDateTime = $arrivalDateTime;

        return $this;
    }

    /**
     * Get arrivalDateTime
     *
     * @return \DateTime
     */
    public function getArrivalDateTime()
    {
        return $this->arrivalDateTime;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Request
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
     * Set description
     *
     * @param string $description
     *
     * @return Request
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
     * Set requestType
     *
     * @param integer $requestType
     *
     * @return Request
     */
    public function setRequestType($requestType)
    {
        $this->requestType = $requestType;

        return $this;
    }

    /**
     * Get requestType
     *
     * @return int
     */
    public function getRequestType()
    {
        return $this->requestType;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Request
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return User
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param User $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return Chief
     */
    public function getChief()
    {
        return $this->chief;
    }

    /**
     * @param Chief $chief
     */
    public function setChief($chief)
    {
        $this->chief = $chief;
    }

    /**
     * @return array
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param array $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return Review
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * @param Review $review
     */
    public function setReview($review)
    {
        $this->review = $review;
    }

    public function getStatusString()
    {
        return RequestStatus::intToStatus($this->getStatus());
    }
}

