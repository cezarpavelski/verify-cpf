<?php

namespace Test\App\Util;

use App\Util\CpfValidator;
use Test\BaseTestCase;

class CpfValidatorTest extends BaseTestCase
{

    public function testCpfValid(): void
    {
		CpfValidator::validate('999.999.999-74');
		$this->assertTrue(true);
    }

	/**
	 * @expectedException \App\Exceptions\CpfValidatorException
	 * @expectedExceptionMessage CPF invalid! Use this format: 999.999.999-99
	 * @dataProvider dataProviderCpfInvalid
	 */
    public function testCpfInvalid(): void
    {
		CpfValidator::validate('999.999.999-7');
    }

    public function dataProviderCpfInvalid()
	{
		return [
			['999.999.999-7'],
			[' 999.999.999-74'],
			['9997'],
			[''],
			['xxxx'],
			['1'],
			['1.5'],
		];
	}
}
