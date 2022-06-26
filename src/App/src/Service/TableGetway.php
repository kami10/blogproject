<?php

namespace App\Service;

use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\TableGateway\AbstractTableGateway;

class TableGetway extends AbstractTableGateway
{
    public $lastInsertValue;
    public $table;
    public $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function __construct(
        string|TableIdentifier $table,
        AdapterInterface       $adapter,
        //Feature\AbstractFeature|Feature\FeatureSet|Feature\AbstractFeature[] $features = null,
        ResultSetInterface     $resultSetPrototype = null,
        Sql\Sql                $sql = null
    )
//    {
//        $this->adapter = $adapter;
//    }

}