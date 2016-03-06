<?php
class Crud {

    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $variabeIsPublic;

    public function __construct() {
        
        $this->servername= "localhost";
        $this->username= "root";
        $this->password= "badiep1";
        $this->dbname= "crud_db";

        $this->conn= new mysqli ($this->servername, $this->username,
        $this->password, $this->dbname);
       
        if ($this->conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);

        }

    }
    
 
    public function read(){
        
        $sql = "SELECT * from faqs"; 
        $result = $this->conn->query($sql);
        // echo "<pre>"; print_r(  $result ); echo "</pre>"; exit;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $faq['question'] = $row['question'];
                $faq['answer'] = $row['answer'];
                $faqs[] = $faq;
            }   


        }

        else{
            echo "0 results";
        }
        
       // echo "<pre>"; print_r(  $faqs ); echo "</pre>"; exit;
        
        echo json_encode($faqs);
    }
    
       
    

  
    public function insert(){
        //echo $_GET['answer'];
   
        $sql = " Insert into faqs (question,answer) values ('".$_GET["question"]."','".$_GET["answer"]."')";
            echo $sql;
    
       if ($this->conn->query($sql) === TRUE) {
            echo "New record created succesfully ";
        } 
        else {
        echo "error:" .$sql . "<br>" . $conn->error;
        }
     
           
    }
 
    public function update(){
        $sql = " Update faqs SET answer ='woh'  WHERE id=1"; 
        
                

                if ($this->conn->query($sql) === TRUE) {
                        echo "Record updated successfully";
                }                   
                else {
                        echo "Error updating record: " . $conn->error;
                }

              
        
 
    
    
    
    
    
    }
    
    public function __destruct(){
        $this->conn->close();
    }   
    
};

$crud = new Crud();




switch($_GET['action']){
        case "read": 
        $crud->read();
        break;
      

        case "update":
        $crud->update();
        break;
        
        case "delete":
        break;
        
        case "insert":
        $crud->insert();
        
        break;

}


