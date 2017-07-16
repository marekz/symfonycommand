<?php

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContainsCreditCardLength extends Constraint {

    public $message = 'Karta "{{ string }}" zawiera niewłasciwą liczbę cyfr.';
    
}
