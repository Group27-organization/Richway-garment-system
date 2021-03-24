<?php


class manageMachineModel extends database
{

    public function loadMachineTable()
    {
        if ($this->Query("SELECT * FROM predefine_machine WHERE active=1")) {

            return $this->fetchall();
        }
    }


    public function insertmachine($Data){
        if($this->Query("INSERT INTO predefine_machine(machine_ID,Name,Description,ReorderValue,ABCanalysis,Warranty,Price,active) VALUES (?,?,?,?,?,?,?,?)", $Data) ){
            return true;
        }
    }

    public function updateMachine($id){
        if($this->Query("SELECT * FROM predefine_machine WHERE machine_ID=?",[$id])){
            $row=$this->fetch();
            return $row;
        }
    }

    public function editMachine($Data){
        $updatemachineData=[
            $Data['Name'],
            $Data['Description'],
            $Data['Re-order Value'],
            $Data['ABC analysis'],
            $Data['Warranty'],
            $Data['Price'],
            $Data['hiddenID'],

        ];
        if($this->Query("UPDATE predefine_machine SET Name = ?, Description = ?,ReorderValue = ? , ABCanalysis=?, Warranty=?, Price=? WHERE machine_ID = ?",$updatemachineData)){
            return true;
        }

    }
}
?>
