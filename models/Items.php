<?php

namespace app\models;

class Items extends Model
{
    protected static $fields = [
        'name',
        'text',
        'parent_id'
    ];

    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'items';
        $this->entityClass = Items::class;
    }
}