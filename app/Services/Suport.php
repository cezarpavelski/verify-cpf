<?php

namespace App\Services;

use App\Entities\HistoryVerifyCpf as HistoryVerifyCpfEntity;

class Suport
{

    public static function status(): array
    {
    	return [
    		"uptime" => self::getUptime(),
    		"qty_blacklist_cpf" => self::getCountBlacklistCpf(),
    		"qty_verify_cpf" => self::countHistoryVerifyCpf(),
		];
    }

    private static function getUptime(): string
	{
		$uptime = exec('uptime');
		return $uptime;
	}

	private static function getCountBlacklistCpf()
	{
    	return BlacklistCpf::count();
	}

	private static function countHistoryVerifyCpf(): int
	{
		$timeUp = substr(self::getUptime(), 0, 9);
		$historyEntity = new HistoryVerifyCpfEntity();
		return count($historyEntity->findWhere(
			"TIME(created_at) > CAST(NOW()-CAST(? AS TIME) AS TIME)",
			[$timeUp]
		));
	}
}
