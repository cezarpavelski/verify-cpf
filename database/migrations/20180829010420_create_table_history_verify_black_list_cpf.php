<?php


use Phinx\Migration\AbstractMigration;

class CreateTableHistoryVerifyBlackListCpf extends AbstractMigration
{
	public function up()
	{
		$this->execute("
            CREATE TABLE `history_cpf_verify` (
            	`id` int(15) NOT NULL auto_increment,
                `cpf` varchar(14) NOT NULL,
                `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY  (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
        ");
	}

	public function down() {
		$this->execute("DROP TABLE IF EXISTS history_cpf_verify;");
	}
}
