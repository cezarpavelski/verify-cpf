<?php

namespace App\Util;

use App\Exceptions\CpfValidatorException;

class CpfValidator
{

    public static function validate(string $cpf): void
    {
		if(!preg_match("/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/", $cpf)) {
			throw new CpfValidatorException('CPF invalid! Use this format: 999.999.999-99');
		}
    }

}
