<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SubsriptionPayment
 *
 * @ORM\Table(name="subscription_payment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SubsriptionPaymentRepository")
 */
class SubsriptionPayment
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
     * @ORM\Column(name="subscription_id", type="integer", nullable=true)
     */
    private $subscription;

    /**
     * @var int
     * @ORM\Column(name="charged_amount", type="integer", nullable=false)
     */
    private $chargedAmount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

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
     * Set chargedAmount
     *
     * @param integer $chargedAmount
     *
     * @return SubsriptionPayment
     */
    public function setChargedAmount($chargedAmount)
    {
        $this->chargedAmount = $chargedAmount;

        return $this;
    }

    /**
     * Get chargedAmount
     *
     * @return int
     */
    public function getChargedAmount()
    {
        return $this->chargedAmount;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return SubsriptionPayment
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return SubsriptionPayment
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
     * @return SubsriptionPayment
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
    
    function getSubscription() {
        return $this->subscription;
    }

    function setSubscription($subscription) {
        $this->subscription = $subscription;
    }
}

