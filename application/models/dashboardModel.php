<?php

class dashboardModel extends database
{


    public function getUserRoleObject($roles)
    {
       // echo("<script>console.log('PHP: " . json_encode($roles) . "');</script>");

        $roles = join("','",$roles);

        $sql1 = "SELECT * FROM user_role WHERE title in ('$roles')";

        if ($this->Query($sql1)) {

            if ($this->rowCount() > 0) {

                $result = $this->fetchall();


                foreach (array_splice($result,1) as $row) {
                    foreach ($row as $k => $v){
                        //echo("<script>console.log('PHP: " . json_encode($k.$v) . "');</script>");
                        if($v == 1){
                            $result[0]->$k = 1;
                        }
                    }
                }

                return ['status' => 'ok', 'data' => $result[0]];
            }
        }

        return ['status' => 'error'];

    }

}

?>