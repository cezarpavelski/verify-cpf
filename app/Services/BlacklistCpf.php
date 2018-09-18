<?php

namespace App\Services;

use App\Entities\BlacklistCpf as BlacklistCpfEntity;
use App\Entities\HistoryVerifyCpf as HistoryVerifyCpfEntity;
use App\Util\CpfStatus;
use App\Util\CpfValidator;
use StdClass;

class BlacklistCpf
{

    public static function add(string $cpf): StdClass
    {
		CpfValidator::validate($cpf);
        $blacklistEntity = new BlacklistCpfEntity($cpf);
        $blacklistEntity->insert();
		return self::findCpf($cpf);
    }

    public static function remove(string $cpf): StdClass
    {
		$cpfReturn = self::findCpf($cpf);
		$blacklistEntity = new BlacklistCpfEntity($cpf);
        $blacklistEntity->delete();
		return $cpfReturn;
    }

	public static function verify(string $cpf): array
	{
		CpfValidator::validate($cpf);
		$historyEntity = new HistoryVerifyCpfEntity(null, $cpf);
		$historyEntity->insert();

		return [
			"cpf" => $cpf,
			"status" => is_null(self::findCpf($cpf))? CpfStatus::FREE : CpfStatus::BLOCK,
		];
	}

	public static function listAll(): array
	{
		$blacklistEntity = new BlacklistCpfEntity();
		return $blacklistEntity->findAll();
	}

	public static function count(): int
	{
		return count(self::listAll());
	}

	public static function findCpf(string $cpf): ?StdClass
	{
		$blacklistEntity = new BlacklistCpfEntity();
		$cpf = $blacklistEntity->findWhere('cpf = ?', [$cpf]);
		return (count($cpf) > 0 ? $cpf[0] : null);
	}


}
