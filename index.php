<?php
class App {

    protected $servername;
    protected $username;
    protected $password;
    protected $dbname;
    protected $variabeIsPublic;

    public fuction_construct() {
        
        $servername= "localhost";
        $username= "root";
        $password= "badiep1";
        $dbname= "crud_db";
        
        $this->connect = new mysqli ($this->servername, $this->username,
        $this->password, $this->dbname);
        
        if ($this->connect->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            
        }
       
        $this->connect = new mysqli ($this->servername, $this->username,
        $this->password, $this->dbname);

    }
    
    public function index() {
    }
    public funtion readTable (){
        $sql ="SELECT * FROM projects";
        $result = $this->connect->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $name[] =$row['question'];
            }
            else{
                echo "0 results";
            }
            echo json_enocde($names);
        }
    
        public function_destruct(){
            $this->connect->close();
        }
    
    }



};

$app = new App();