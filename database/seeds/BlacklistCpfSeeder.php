<?php

require(__DIR__.'/../../env.php');

use Phinx\Seed\AbstractSeed;

class BlacklistCpfSeeder extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
                'cpf'    => '000.000.000-74',
            ]
        ];

        $blacklistCpf = $this->table('blacklist_cpf');
		$blacklistCpf->insert($data)->save();
    }
}
