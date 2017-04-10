<?php
namespace woo\mapper;

require_once('woo/mapper/EventMapper.php');

class DeferredEventCollection extends \woo\mapper\EventCollection
{
    private $stmt;
    private $valueArray;
    private $run = false;

    function __construct(Mapper $mapper,\PDOStatement $stmt_handle,array $valueArray)
    {
        parent::__construct(null, $mapper);
        $this->stmt = $stmt_handle;
        $this->valueArray = $valueArray;
    }

    function notifyAccess()
    {
        if(!$this->run){
            $this->stmt->execute($this->valueArray);
            $this->raw = $this->stmt->fetchAll();
            $this->total = count($this->raw);
        }
        $this->run = true;
    }


}