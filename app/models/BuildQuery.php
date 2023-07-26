<?php
require dirname(__DIR__, 1).'/config/Database.php';
require dirname(__DIR__, 1).'/helpers/helpers.php';

class BuildQuery{
    private $fields = [];
    private $where = '';
    private $from = [];
    private $limit = '';
    private $offset = '';

    private $table='';
    private $columns='';
    private $values='';

    private $set = '';

    private $query_operation = ''; // values will be set to "SELECT", "INSERT", "UPDATE"



    public function GetResult(string $dataType){ //return user defined data type
        $db = new Database();
        $conn = $db->getConnection();
        $query = ''; 
        
        switch(strtolower($this->query_operation)){
            case 'select':
                $query = "select {$this->fields} from {$this->from} {$this->where} {$this->limit} {$this->offset}";
            break;
            case 'insert':
                $query = "insert into {$this->table} ({$this->columns}) values ({$this->values})";
            break;
            case 'update':
                $query = "update {$this->table} set {$this->set} {$this->where}";
            break;
        }
        
        try{
            $query_result = $conn->query($query);
        }catch(Exception $e){
            jsonResponse((object)[
                'status_code' => 400,
                'error_code' =>  $e->getCode()
            ]);
        }
        
        
        //format results from helpers.php
        $results = is_object($query_result)? formatQueryResult($query_result,$dataType) : $query_result;
        

        // response
        if($query_result === true || $query_result->num_rows !== 0){
            //set data types here
            switch(strtoupper($dataType)){
                case 'JSON': return json_encode($results);
                case 'ARRAY': return ($results);
                case 'BOOL': return ($results);
                default: return ($results);
            }
        }else{
            return NULL;
        }
       
    }

    

    // FORMATING QUERY
    public function From(string $table, ?string $alias = null): self {
        if ($alias === null) {
            $set = $table;
        } else {
            $set = "${table} AS ${alias}";
        }
        $this->from = $set;
        return $this;
    }

    public function Select(string ...$fields): self {
        $this->fields = implode(', ', $fields);
        $this->query_operation = 'select'; //set query operation
        return $this;
    }

    public function Where(string ...$where): self {
        $this->where = $where === [] ? '' : ' WHERE ' . implode(" AND ",$where);
        return $this;
    }

    public function Limit(int $limit = NULL) : self {
        $this->limit = $limit !== NULL? "LIMIT {$limit}" : '';
        return $this;
    }

    public function Offset(int $offset = null) : self {
        $this->offset = $offset !== NULL? "OFFSET {$offset}":'';
        return $this;
    }

    public function Insert(string $table):self{
        $this->table = $table;
        $this->query_operation = 'insert';
        return $this;
    }
    public function Columns(array $columns):self{
        $this->columns = implode(', ', $columns);
        return $this;
    }

    public function Values(array $values) : self {
        foreach($values as $value){
            $this->values .= is_int($value)? $value : "'".$value."'";
            $this->values .= ',';
        }
        $this->values = trim($this->values,',');
        return $this;
    }


    public function Update(string $table) : self {
        $this->table = $table;
        $this->query_operation = 'update';
        return $this;
    }

    public function Set(string ...$set) : self {
        $this->set = implode(',' , $set);
        return $this;
    }
}