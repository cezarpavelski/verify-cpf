<?php

namespace App\Entities;

use Framework\Entities\BaseModel;

class BlacklistCpf extends BaseModel
{
    protected $table = 'blacklist_cpf';

    public $cpf;

    public function __construct($cpf = null)
    {
        $this->cpf = $cpf;
    }

}
