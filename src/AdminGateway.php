<?php
class AdminGateway extends UserGateway {
    public function __construct(Database $database) {
        parent::__construct($database);
        
    }
  //creating new admin
    public function createAdmin(string $username,
                                string $email,
                                string $apassword ): bool {

        //checking for username and email availabillity
        
        $que = $this->conn->query("SELECT * FROM admin_data WHERE a_username='$username' OR email='$email'");
        $que->execute();
        $row = $que->rowCount();

        if ( $row !== 0 ) {

            return false;
            
        
        } else {

        
            //insert into db
            $sql = "INSERT INTO admin_data (a_username, email, apassword) VALUES (:a_username, :email, :apassword)";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":a_username", $username, PDO::PARAM_STR);
            $stmt->bindValue(":email", $email, PDO::PARAM_STR);
            $stmt->bindValue(":apassword", $apassword, PDO::PARAM_STR);

            $stmt->execute();
            
            return true;

            
     }
    }

    
    //authentication
    public function getAuthenticated(string $email, string $userpassword)  {
        //sql & conn to db
        $sql = "SELECT * FROM admin_data WHERE email='$email'";
        $stmt = $this->conn->query($sql);
        
        $stmt->execute();

        //fetching data & checking for rows
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
         
    
         if ($stmt->rowCount() > 0) {

            if(password_verify($userpassword, $data['apassword'])) {

                //initializing session variables 
                $_SESSION['admin_username'] = $data['a_username'];
                $_SESSION['admin_email'] = $data['email'];
                $_SESSION['admin_id'] = $data['id'];
                
            
                header("location: ". ImportantConstants::ADMINURL ."");
                
        
                
            } else {
                http_response_code(401);
                echo "<script>alert('Invalid user credentials');</script>";
                return false;

            }

         } else {
            http_response_code(401);
            echo "<script>alert('Invalid user credentials');</script>";
            return false;
        }


     }

     //fetching alladmins to display them in table
    public function fetchAllAdmins() : array | false {

        $sql = "SELECT * FROM admin_data";
        $stmt = $this->conn->query($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //counting Jobs
    public function countJobs() : object | false {
        $sql = "SELECT COUNT(*) AS jobsCount FROM jobs WHERE status = 0 ";
        $stmt = $this->conn->query($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    //counting categories
    public function countCategories() : object | false {
        $sql = "SELECT COUNT(*) AS categoriesCount FROM categories ";
        $stmt = $this->conn->query($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    //counting admins
    public function countAdmins() : object | false {
        $sql = "SELECT COUNT(*) AS adminsCount FROM admin_data ";
        $stmt = $this->conn->query($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

}