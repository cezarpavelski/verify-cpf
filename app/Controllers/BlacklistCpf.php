<?php

namespace App\Controllers;

use App\Exceptions\CpfValidatorException;
use Framework\Controllers\BaseController;
use App\Services\BlacklistCpf as BlacklistCpfServices;
use Framework\Facades\Request;

class BlacklistCpf extends BaseController
{
    public static function add(): string
    {
        try {
        	$cpf = Request::post('cpf');
			return self::renderJson([
				'cpf' => BlacklistCpfServices::add($cpf)->cpf,
			], 201);
		} catch (CpfValidatorException $e) {
			return self::renderJson(["error" => $e->getMessage()], 400);
        } catch (\PDOException $e) {
            return self::renderJson(["error" => $e->getMessage()], 500);
        }

    }

    public static function remove(string $cpf): string
    {
		try {
			return self::renderJson([
				'cpf' => BlacklistCpfServices::remove($cpf)->cpf,
			]);
		} catch (\PDOException $e) {
			return self::renderJson(["error" => $e->getMessage()], 500);
		}
    }

	public static function verify(string $cpf): string
	{
		try {
			$verify = BlacklistCpfServices::verify($cpf);
			return self::renderJson([
				'cpf' => $verify['cpf'],
				'status' => $verify['status'],
			]);
		} catch (CpfValidatorException $e) {
			return self::renderJson(["error" => $e->getMessage()], 400);
		} catch (\PDOException $e) {
			return self::renderJson(["error" => $e->getMessage()], 500);
		}
	}

	public static function viewList(): string
	{
		$cpf = BlacklistCpfServices::listAll();
		return self::render('blacklist/main.html', ['blacklistCpf' => $cpf]);
	}

	public static function viewAdd(): string
	{
		return self::render('blacklist/add.html', []);
	}

	public static function viewDel(): string
	{
		return self::render('blacklist/del.html', []);
	}

	public static function viewVerify(): string
	{
		return self::render('blacklist/verify.html', []);
	}

}
