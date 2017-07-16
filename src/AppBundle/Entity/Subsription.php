<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subsription
 * @ORM\Table(name="subscription")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SubsriptionRepository")
 */
class Subsription
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var int
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $user;
    
    /**
     * @var int
     * @ORM\Column(name="subscription_shipping_address_id", type="integer", nullable=true)
     */
    private $subscriptionShippingAddress;

    /**
     * @var int
     * @ORM\Column(name="subscription_billing_address_id", type="integer", nullable=true)
     */
    private $subscriptionBillingAddress; 
    
    /**
     * @var string
     * @ORM\Column(name="status", type="string", length=16, nullable=false, options={"default":"new"})
     */
    private $status;
    
    /**
     * @var int
     * @ORM\Column(name="subscription_pack_id", type="integer", nullable=false)
     */
    private $subscriptionPack;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="started_at", type="datetime", nullable=true)
     */
    private $startedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;


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
     * Set status
     *
     * @param boolean $status
     *
     * @return Subsription
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set startedAt
     *
     * @param \DateTime $startedAt
     *
     * @return Subsription
     */
    public function setStartedAt($startedAt)
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    /**
     * Get startedAt
     *
     * @return \DateTime
     */
    public function getStartedAt()
    {
        return $this->startedAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Subsription
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Subsription
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    function getUser() {
        return $this->user;
    }

    function getSubscriptionShippingAddress() {
        return $this->subscriptionShippingAddress;
    }

    function getSubscriptionBillingAddress() {
        return $this->subscriptionBillingAddress;
    }

    function getSubscriptionPack() {
        return $this->subscriptionPack;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setSubscriptionShippingAddress($subscriptionShippingAddress) {
        $this->subscriptionShippingAddress = $subscriptionShippingAddress;
    }

    function setSubscriptionBillingAddress($subscriptionBillingAddress) {
        $this->subscriptionBillingAddress = $subscriptionBillingAddress;
    }

    function setSubscriptionPack($subscriptionPack) {
        $this->subscriptionPack = $subscriptionPack;
    }


}

