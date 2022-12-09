<?php
    $pdo = new PDO('sqlite:../DB/DVDBase.db');

    //builder pattern
    interface SQLQueryBuilder
    {
        public function select(string $table, array $fields): SQLQueryBuilder;

        public function delete(string $table): SQLQueryBuilder;

        public function insert(string $table, array $fields): SQLQueryBuilder;

        public function values(array $values): SQLQueryBuilder;

        public function join(string $table, string $table2, string $field1, string $field2): SQLQueryBuilder;

        public function where(string $field, string $value, string $operator = '='): SQLQueryBuilder;

        public function getSQL(): string;
    }

    class SqlLiteQueryBuilder implements SQLQueryBuilder
    {
        protected $query;

        protected function reset(): void
        {
            $this->query = new \stdClass();
        }

        public function select(string $table, array $fields): SQLQueryBuilder
        {
            $this->reset();
            $this->query->base = "SELECT " . implode(", ", $fields) . " FROM " . $table;
            $this->query->type = 'select';

            return $this;
        }

        public function delete(string $table): SQLQueryBuilder
        {
            $this->reset();
            $this->query->base = "DELETE FROM " . $table;
            $this->query->type = 'select';

            return $this;
        }

        public function insert(string $table, array $fields): SQLQueryBuilder
        {
            $this->reset();
            $this->query->base = "INSERT INTO " . $table . " (" . implode(", ", $fields) . ")";
            $this->query->type = 'insert';

            return $this;
        }

        public function values(array $values): SQLQueryBuilder
        {
            if ($this->query->type != "insert") {
                throw new \Exception("VALUES can only be added to INSERT");
            }
            $this->query->values = "VALUES('". implode("', '", $values) ."')";

            return $this;
        }

        public function join(string $table, string $table2, string $field1, string $field2): SQLQueryBuilder
        {
            if ($this->query->type != "select") {
                throw new \Exception("JOIN can only be added to SELECT");
            }
            $this->query->join = " JOIN ". $table2 ." ON ". $table .".". $field1 ." = ". $table2 .".". $field2;

            return $this;
        }

        public function where(string $field, string $value, string $operator = '='): SQLQueryBuilder
        {
            if (!in_array($this->query->type, ['select', 'update', 'delete'])) {
                throw new \Exception("WHERE can only be added to SELECT, UPDATE OR DELETE");
            }
            $this->query->where[] = "$field $operator '$value'";

            return $this;
        }

        public function getSQL(): string
        {
            $query = $this->query;
            $sql = $query->base;
            if (!empty($query->join)) {
                $sql .= $query->join;
            }
            if (!empty($query->where)) {
                $sql .= " WHERE " . implode(' AND ', $query->where);
            }
            if (!empty($query->values)) {
                $sql .= $query->values;
            }
            $sql .= ";";
            return $sql;
        }
    };
    
    $sql = new SqlLiteQueryBuilder();
    $query = $pdo -> query($sql ->select("Users", ["*"])
                  ->getSQL());
    $rows = $query -> fetchAll(PDO::FETCH_ASSOC);
?>