<?php

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class ContainsCreditCardLengthValidator extends ConstraintValidator {

    public function validate($value, Constraint $constraint) {
        if (!preg_match('/^[0-9]{13,16}$/', $value, $matches)) {
            $this->context->buildViolation('Błędny format danych. Formularz przyjmuje 13, 15 lub 16 cyfr', array($value))
                    ->addViolation();
        }
    }
}
