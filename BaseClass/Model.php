<?php

class Model extends DB{

    protected $table;

    protected $fillable;

    private $data;

    private $column;

    private $emptyValue;

    private $columnValue;

    private $creatEmpty = [];


    public function get($column = ''){
        if (isset($column) && $column !== ''){
            $this->query('SELECT '.$column.' from '.$this->table);
        } else {
            $this->query('SELECT * from '.$this->table);
        }

        return $this->fetchAll();
    }

    public function find($column,$value){
        $this->query('SELECT * from '.$this->table.' WHERE '.$column.'='.$value);

        return $this->fetch();
    }

    public function where($column,$value,$ope = '='){
        if (is_array($column)){
            $string = 'WHERE ';
            foreach ($column as $key => $value){
                $string = $key.'='.$value.' AND ';
            }
            return $string;
        }
        return 'WHERE '.$column.$ope.$value;
    }

    public function store($data){

        $this->fillableCreateField($data);

        return $this->query('INSERT INTO '.$this->table.'('.$this->column.') Values('.$this->emptyValue.')',$this->columnValue);
    }

    protected function fillableCreateField($data){
        $keys = array_keys($data);
        $this->data = $data;
        $this->fieldLoop($keys);
        $keys = array_keys($this->data);
        $this->columnValue = array_values($this->data);
        $this->column = implode(',', $keys);
        $this->emptyValue = implode(',', $this->creatEmpty);
    }

    protected function fillableUpdateFiled($data){
        $this->fieldLoop($data,'update');
        $this->column = implode(',',$this->creatEmpty);
    }

    protected function fieldLoop($keys,$type = 'create'){
        foreach ($this->fillable as $key => $value){
            if ($type !== 'create'){
                $this->creatEmpty[$key] = $value.'='.$keys[$value];
            }else{
                $this->creatEmpty[$key] = '?';
            }
        }
    }

    public function update($data,$column,$id){
        $this->fillableUpdateFiled($data);
        return $this->query('UPDATE '.$this->table.' SET '.$this->column.' WHERE '.$column.'='.$id);
    }

    public function delete($column,$value){
        $this->query('DELETE from '.$this->table.' WHERE '.$column .'='.$value);
    }

    public function rawQuery($query){
        return self::query($query);
    }

}