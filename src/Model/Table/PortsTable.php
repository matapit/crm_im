<?php
// src/Model/Table/PortsTable.php

namespace App\Model\Table;

use Cake\ORM\Table;

class PortsTable extends Table
{
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
    }
}
