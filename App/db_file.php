<?php
    class DtBase {

        public static function run_query($str) {

            $con = new mysqli("localhost","root","","IdeaManagement");

            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }

            if (mysqli_connect_error()) {
                $err_msg = "Failed to connect, the error message is: ".mysqli_connect_error();
                return $err_msg;
                exit();
            }

            $result = $con->query($str);
            if (!$result) {
                die($con->error);
            }

            file_put_contents( 'log.txt',var_dump($result));

                $arr = array();
                if (is_object($result)){
                    while($row = $result->fetch_array(MYSQL_ASSOC)) {
                        $arr[] = $row;
                    }
                
                    return $arr;
                } else{
                    // return $result;
                }
                
        }

    }











?>