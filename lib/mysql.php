<?php

class Mysql
{
    //查询表名
    private string $table;
    private mixed $where;
    public function table($table): Mysql
    {
        $this->table = $table;
        return $this;
    }

    //查询条件
    public function where($where): Mysql
    {
        $this->where = $where;
        return $this;
    }

    //返回一条数据
    public function item()
    {
        $where='';
        if (is_array($where))
        {
            foreach ($this->where as $key => $value)
            {
                $value = is_string($value)?"'" . $value . "'":$value;
                $where .="{$key} = {$value} and ";
            }
        }
        else
        {
            $where = $this->where;
        }
        $where =rtrim($where,' and ');
        $dsn = "mysql:host=127.0.0.1;dbname=xm";
        $pdo = new PDO($dsn, 'xm', 'snXKiw6wL3yz3Wc7');
        $sql = "select * from {$this->table} where {$where} limit 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return isset($res[0])?$res[0]:false;
    }
}

