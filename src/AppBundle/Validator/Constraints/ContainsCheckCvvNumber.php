<?php

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContainsCheckCvvNumber extends Constraint {

    public $message = 'The string "{{ string }}" contains an illegal character. Correct post code schema is for example: 11-111';
    
}
