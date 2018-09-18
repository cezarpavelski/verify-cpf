<?php

namespace App\Entities;

use Framework\Entities\BaseModel;

class HistoryVerifyCpf extends BaseModel
{
    protected $table = 'history_cpf_verify';

    public $id;
    public $cpf;

    public function __construct($id = null, $cpf = null)
    {
        $this->id = $id;
        $this->cpf = $cpf;
    }

}
