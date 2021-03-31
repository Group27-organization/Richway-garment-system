<?php


class manageToolModel extends database
{

    public function loadToolTable()
    {

        if($this->Query("SELECT * FROM predefine_tool WHERE active=1" )){

            return $this->fetchall();
        }
    }

    public function inserttool($Data){
        if($this->Query("INSERT INTO predefine_tool(tool_ID,Name,Description,ReorderValue,ABCanalysis,price,active) VALUES (?,?,?,?,?,?,?)", $Data) ){
            return true;
        }
    }

    public function updateTool($id){
        if($this->Query("SELECT * FROM predefine_tool WHERE tool_ID=?",[$id])){
            $row=$this->fetch();
            return $row;
        }
    }

    public function editTool($Data)
    {
        $updatetoolData = [
            $Data['Name'],
            $Data['Description'],
            $Data['Re-order Value'],
            $Data['ABC analysis'],
            $Data['Price'],
            $Data['hiddenID'],

        ];
        if ($this->Query("UPDATE predefine_tool SET Name = ?, Description = ?,ReorderValue = ? , ABCanalysis=?, price=? WHERE tool_ID = ?", $updatetoolData)) {
            return true;
        }

    }
}
?>