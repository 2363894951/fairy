<?php

use JetBrains\PhpStorm\Pure;

class Mysql
{
    //查询表名
    private string $table;
    private string $filed;
    private mixed $where;
    private PDO $pdo;
    private string $order;
    private string $order_mode;

    public function __construct()//构造器
    {
        $dsn = "mysql:host=159.75.52.227;dbname=xm";
        $this->pdo = new PDO($dsn, 'xm', 'snXKiw6wL3yz3Wc7');
    }

    public function table($table): Mysql
    {
        $this->table = $table;
        return $this;
    }

    //查询字段
    public function field($field): Mysql
    {
        $this->filed = $field;
        return $this;
    }

    //查询条件
    public function where($where): Mysql
    {
        $this->where = $where;
        return $this;
    }

    //封装Sql语句
    #[Pure] private function build_sql($type, $data = null): string
    {
        $sql = '';
        if ($type == 'select') {
            $where = '';
            if (is_array($where)) {
                foreach ($this->where as $key => $value) {
                    $value = is_string($value) ? "'" . $value . "'" : $value;
                    $where .= "{$key} = {$value} and ";
                }
            } else {
                $where = $this->where;
            }
            $where = rtrim($where, ' and ');
            $sql = "select {$this->filed} from {$this->table} where {$where}";
            if (isset($this->order)) {
                $sql .= " order by {$this->order} {$this->order_mode}";
            }

        }
        if ($type == 'insert') {
            $k = '';
            $v = '';
            foreach ($data as $key => $value) {
                $k .= $key . ',';
                $value = is_string($value) ? "'$value'" : $value;
                $v .= $value . ',';
            }
            $k = rtrim($k, ',');
            $v = rtrim($v, ',');
            $sql = "insert into {$this->table}($k) value($v) ";

        }
        return $sql;
    }

    //查询结果排序
    public function order($order, $order_mode): Mysql
    {
        $this->order = $order;
        $this->order_mode = $order_mode;
        return $this;
    }

    //返回一条数据
    public function item()
    {
        $sql = $this->build_sql('select') . " limit 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return isset($res[0]) ? $res[0] : false;
    }

    //返回多条数据
    public function list($list_num = null): array
    {
        $sql = $this->build_sql('select');
        if (isset($list_num)) {
            $sql .= " limit {$list_num}";
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //插入数据
    public function insert($data):int
    {
        $sql = $this->build_sql('insert', $data);
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }

}

