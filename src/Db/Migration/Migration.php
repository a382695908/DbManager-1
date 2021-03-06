<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 21/06/16
 * Time: 09:57
 */

namespace Efrogg\Db\Migration;

use Efrogg\Db\Adapters\DbAdapter;

abstract class Migration
{
    /** @var  DbAdapter */
    protected $db;


    abstract public function up();
    abstract public function down();

    /**
     * @param DbAdapter $db
     * @return Migration
     */
    public function setDb($db)
    {
        $this->db = $db;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return get_class($this);
    }

    public function isFixed()
    {
        return false;
    }

    /**
     * @param $tableName
     * @return Table
     */
    protected function table($tableName)
    {
        $table = new Table($tableName);
        $table->setDb($this->db);
        return $table;
    }
}