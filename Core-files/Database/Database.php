<meta charset="utf-8">
<?php
    class Database{
        
        private static $userName = "116518-vo99786";
        private static $passWord = "niklas93";
        private static $serverName = "mysql18.citynetwork.se";
        private static $dbName = "116518-akerikollen";
        
        public function sqlQueryCreator($SearchArray){
            $sqlArray   = $SearchArray;
            $columArray = array("org_number","comp_name","visit_city","comp_type","phone");
            
            $andArray = array();
            foreach($sqlArray as $keyword){
                $orArray = array();
                foreach($columArray as $column){
                    $orArray[] = $column . " LIKE '%" . $keyword . "%'";
                }
                $andArray[] = "(" . implode($orArray, " OR ") . ")";
            }
            return implode($andArray, " OR ");
        }
        
        public function getDB($query){
            $conn = mysqli_connect(self::$serverName, self::$userName, self::$passWord, self::$dbName);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $conn->set_charset("utf8");
            $sql = "SELECT * FROM Databas WHERE $query ORDER BY paid_fair DESC";
            $result = $conn->query($sql);
            if($result){
                while ($row = $result->fetch_object()){
                    $resultArr[] = $row;
                }
            }
            else{
                return false;
            }
            mysqli_close($conn);
            return $resultArr;
        }
        
        public function getSingleDB($array){
            $conn = mysqli_connect(self::$serverName, self::$userName, self::$passWord, self::$dbName);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $conn->set_charset("utf8");
            $sql = "SELECT * FROM Databas WHERE comp_name LIKE '%".$array[0]."%' AND visit_zip LIKE '%".$array[1]."%' ";
            $result = $conn->query($sql);
            mysqli_close($conn);
            return $result->fetch_object();
        }

    }
?>