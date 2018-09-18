<?php


use Phinx\Migration\AbstractMigration;

class CreateTableBlacklistCpf extends AbstractMigration
{
	public function up()
	{
		$this->execute("
            CREATE TABLE `blacklist_cpf` (
                `cpf` varchar(14) NOT NULL,
                `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY  (`cpf`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
        ");
	}

	public function down() {
		$this->execute("DROP TABLE IF EXISTS blacklist_cpf;");
	}
}
