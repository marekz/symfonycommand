<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
Use AppBundle\Validator\Constraints as AppAssert;

class CreditCard {

    /**
     * @var type 
     * @Assert\NotBlank()
     * @AppAssert\ContainsCreditCardLength
     */
    protected $cardNumber;

    /**
     * @var type 
     * @Assert\NotBlank()
     * @AppAssert\ContainsCheckCvvNumber
     */
    protected $cvvNumber;

    /**
     * @var type 
     * @Assert\NotBlank()
     */
    protected $cardType;
    
    function getCardNumber() {
        return $this->cardNumber;
    }

    function getCvvNumber() {
        return $this->cvvNumber;
    }

    function getCardType() {
        return $this->cardType;
    }

    function setCardNumber($cardNumber) {
        $this->cardNumber = $cardNumber;
    }

    function setCvvNumber($cvvNumber) {
        $this->cvvNumber = $cvvNumber;
    }

    function setCardType($cardType) {
        $this->cardType = $cardType;
    }
}
