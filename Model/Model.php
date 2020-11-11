<?php


class Model
{
    protected $_db;
    protected $_sql;

    /**
     * Az adatbázis csatlakozást csinálom itt meg:
     *
     * Model constructor.
     */
    public function __construct()
    {
        $this->_db = Db::init();
    }

    /**
     * Lefuttatom az általam írt sql-t.
     *
     * @param $sql
     */
    protected function _setSql($sql)
    {
        $this->_sql = $sql;
    }

    /**
     * Lekérdezem az összes adatot. (foreach fog kelleni az adatokon végigmenni)
     *
     * @param null $data
     * @return array
     * @throws Exception
     */
    public function getAll($data = null)
    {
        if (!$this->_sql)
        {
            throw new Exception("No SQL query!");
        }

        $sth = $this->_db->prepare($this->_sql);
        $sth->execute($data);
        return $sth->fetchAll();
    }

    /**
     * Csak az első adatot adja vissza tömbben. (Mintha LIMIT 1 kerülne az sql-re.)
     *
     * @param null $data
     * @return mixed
     * @throws Exception
     */
    public function getRow($data = null)
    {
        if (!$this->_sql)
        {
            throw new Exception("No SQL query!");
        }

        $sth = $this->_db->prepare($this->_sql);
        $sth->execute($data);
        return $sth->fetch();
    }

    //TODO: tovább fejleszteni és/vagy elkülöníteni insert | update | getResult=ami csak egy adatot ad vissza fügvényekkel
}