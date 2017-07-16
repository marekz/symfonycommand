<?php

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class ContainsCheckCvvNumberValidator extends ConstraintValidator {

    public function validate($value, Constraint $constraint) {
        if (!preg_match('/^[0-9]{4}$/', $value, $matches)) {
            $this->context->buildViolation('Błędny format. Pole przyjmuje 4 cyfry', array($value))
                    ->addViolation();
        }
    }
}
