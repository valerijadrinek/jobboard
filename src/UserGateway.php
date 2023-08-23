<?php 

class UserGateway {
     //connection to db
     private PDO $conn;
     public function __construct(Database $database) 
     {
         $this->conn = $database->getConnectionToDb();
       
     }

     //registration
     public function getRegistered(string $username,
                                   string $email,
                                   string $type_of_employer,
                                   string $upassword ): bool {

        //checking for username and email availabillity
        
        $que = $this->conn->query("SELECT * FROM users WHERE username='$username' OR email='$email'");
        $que->execute();
        $row = $que->rowCount();

        if ( $row !== 0 ) {

            return false;
            
        
        } else {

        
            //insert into db
            $sql = "INSERT INTO users (username, email, typeofemp, upassword) VALUES (:username, :email, :typeofemp, :upassword)";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":username", $username, PDO::PARAM_STR);
            $stmt->bindValue(":email", $email, PDO::PARAM_STR);
            $stmt->bindValue(":typeofemp", $type_of_employer, PDO::PARAM_STR);
            $stmt->bindValue(":upassword", $upassword, PDO::PARAM_STR);

            $stmt->execute();
            
            return true;

            
     }
    }



     //authentication

     public function getAuthenticated(string $email, string $userpassword)  {
        //sql & conn to db
        $sql = "SELECT * FROM users WHERE email='$email'";
        $stmt = $this->conn->query($sql);
        
        $stmt->execute();

        //fetching data & checking for rows
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
         
    
         if ($stmt->rowCount() > 0) {

            if(password_verify($userpassword, $data['upassword'])) {

                //initializing session variables 
                $_SESSION['username'] = $data['username'];
                $_SESSION['user_id'] = $data['id'];
                $_SESSION['type_of_user'] = $data['typeofemp'];
            
                header("location: ". Database::APPURL ."");
                
        
                
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
     
     //fetching user object
     public function fetchUser( int $id) : object | false {
       
        $sql = "SELECT * FROM users WHERE id='$id'";
        $stmt = $this->conn->query($sql);
        
        $stmt->execute();
        
        //fetching data & checking for row
         return $stmt->fetch(PDO::FETCH_OBJ);
 
     }


     //updating user record in db
     public function updateUser (int $id)  {

        $userRow = $this->fetchUser($id);

         //variables i directories for files
         $username = $_POST['username'];
         $email = $_POST['email'];
         $bio = $_POST['bio'];
         $facebook = $_POST['facebook'];
         $twitter = $_POST['twitter'];
         $linkedin = $_POST['linkedin'];
         $image = $_FILES['u_image']['name'];

    

         $userRow->typeofemp === "Employee" ? $title = $_POST['title'] : $title = null;
         $userRow->typeofemp === "Employee" ? $cv = $_FILES['cv']['name'] : $cv = null;
 
         $dir_imgs = dirname(__DIR__)  . '/api/users/users-images/' . basename($image);
         $dir_cvs = dirname(__DIR__) . '/api/users/users-cvs/' . basename($cv);

        
        //sql statement
        $sql = "UPDATE users SET username=:username, email=:email, title=:title, bio=:bio, facebook=:facebook, twitter=:twitter, 
        linkedin=:linkedin, u_image=:u_image, cv=:cv  WHERE id=:id";
        $stmt = $this->conn->prepare($sql);

        
        //sql bindings
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);

        if ($title == null) {
            $stmt->bindValue(":title", null , PDO::PARAM_NULL);
        } else {
            $stmt->bindValue(":title", $title, PDO::PARAM_STR);
        }
        
        $stmt->bindValue(":bio", $bio, PDO::PARAM_STR);
        $stmt->bindValue(":facebook", $facebook, PDO::PARAM_STR);
        $stmt->bindValue(":twitter", $twitter, PDO::PARAM_STR);
        $stmt->bindValue(":linkedin", $linkedin, PDO::PARAM_STR);

        if( !empty($image)) {

            unlink(dirname(__DIR__)  . '/api/users/users-images/'. $userRow->u_image);
            $stmt->bindValue(":u_image", $image, PDO::PARAM_STR);
            
        } else {

            $stmt->bindValue(":u_image", $userRow->u_image, PDO::PARAM_STR);
            
        }

        if ( $cv !== null) {

            unlink(dirname(__DIR__)  . '/api/users/users-cvs/'. $userRow->cv);
            $stmt->bindValue(":cv", $cv, PDO::PARAM_STR);
            
        } else {
             if ($userRow->typeofemp === "Company") {
                $stmt->bindValue(":cv", null, PDO::PARAM_NULL);
             }
                $stmt->bindValue(":cv", $userRow->cv, PDO::PARAM_STR);
            }

        
        
        
         $stmt->execute();
        

        //files
    if(move_uploaded_file($_FILES['u_image']['tmp_name'], $dir_imgs) OR move_uploaded_file($_FILES['cv']['tmp_name'], $dir_cvs) )  {
            header("location: ". Database::APPURL ."");
       
     } else {
        header("location: ". Database::APPURL ."profile.php?id=$id");
     }

    }


}//ending class



