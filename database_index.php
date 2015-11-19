<?php
class App {

    protected $servername;
    protected $username;
    protected $password;
    protected $dbname;
    protected $variabeIsPublic;

    public function __construct() {
        
        $this->servername= "localhost";
        $this->username= "root";
        $this->password= "badiep1";
        $this->dbname= "crud_db";

        if ($this->connect->connect_error) {
            die("Connection failed: " . $conn->connect_error);

        }

        $this->connect = new mysqli ($this->servername, $this->username,
        $this->password, $this->dbname);

    }
    
    public function index() {
    }
    
    public function readTable(){
        
        $sql = "SELECT * from faqs";
        $result = $this->connect->query($sql);
        
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    $faq['question'] = $row['question'];
                    $faq['answer'] = $row['answer'];
                    $faqs[] = $faq;
            }
            
            
        }else{
                echo "0 results";
        }
        
        // echo "<pre>"; print_r(  $name ); echo "</pre>"; exit;
        
        echo json_encode($faqs);
    }
    
        public function __destruct(){
            $this->connect->close();
        }
};

$app = new App();
$app->readTable();
?>