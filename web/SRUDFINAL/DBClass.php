<?php
Class DBClass extends PDO
{
    protected $_fetchMode = PDO::FETCH_ASSOC;
    protected $_transactionCount = 0;

    public function  __construct($dsn, $user='', $passwd='', $options=NULL)
    {
        $driver_options = array(
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        );
        if(!empty($options)) {
            $driver_options = array_merge($driver_options, $options);
        }
        parent::__construct($dsn, $user,    $passwd, $driver_options);
    }
    private function sqli($sql, $bind = array())
    {
        $stmt = $this->prepare($sql);
        if (!$stmt) {
            $errorInfo = $this->errorInfo();
            throw new PDOException("Database error [{$errorInfo[0]}]: {$errorInfo[2]}, driver error code is $errorInfo[1]");
        }
        if(!is_array($bind)) {
            $bind = empty($bind) ? array() : array($bind);
        }
        if (!$stmt->execute($bind) || $stmt->errorCode() != '00000') {
            $errorInfo = $stmt->errorInfo();
            throw new PDOException("Database error [{$errorInfo[0]}]: {$errorInfo[2]}, driver error code is $errorInfo[1]");
        }
//        var_dump($stmt->fetchAll());
        return $stmt;
    }
    public function where($where, $andOr = 'AND')
    {
        if(is_array($where)) {
            $tmp = array();
            foreach($where as $k => $v) {
                $tmp[] = $k . '=' . $this->quote($v);
            }
            return '(' . implode(" $andOr ", $tmp) . ')';
        }
        return $where;
    }

    public function select($table, $fields = "*", $where = "", $bind = array(), $order = NULL, $limit = NULL)
    {
         $sql = "SELECT " . $fields . " FROM " . $table;
        if(!empty($where)) {
            $where = $this->where($where);
            $sql .= " WHERE " . $where;
        }
        if(!empty($order)) {
            $sql .= " ORDER BY " . $order;
        }
        if(!empty($limit)) {
            $sql .= " LIMIT " . $limit;
        }
        $stmt = $this->sqli($sql, $bind);
        return $stmt->fetchAll();
}

    public function insert($table, $data)
    {
        $fieldNames = array_keys($data);
        $sql = "INSERT INTO `$table` (" . implode($fieldNames, ", ") . ") VALUES (:" . implode($fieldNames, ", :") . ");";
        $bind = array();
        foreach($fieldNames as $field) {
            $bind[":$field"] = $data[$field];
        }
        return $this->sqli($sql, $bind);
    }

    public function delete($table, $where, $bind = array())
    {
        $sql = "DELETE FROM `$table`";
        if(!empty($where)) {
            $where = $this->where($where);
            $sql .= " WHERE " . $where;
        }
        return $this->sqli($sql, $bind);
    }

    public function update($table, $data, $where="", $bind=array())
    {
        $sql = "UPDATE `$table` SET ";
        $comma = '';
        if(!is_array($bind)) {
            $bind = empty($bind) ? array() : array($bind);
        }
        foreach($data as $k => $v) {
            $sql .= $comma . $k . " = :upd_" . $k;
            $comma = ', ';
            $bind[":upd_" . $k] = $v;
        }
        if(!empty($where)) {
            $where = $this->where($where);
            $sql .= " WHERE " . $where;
        }
        return $this->sqli($sql, $bind);
    }


}
