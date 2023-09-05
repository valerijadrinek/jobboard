<?php
class JobApplying extends JobGateway {
    
    public function __construct(Database $database) {
        parent::__construct($database);
        
    }
     
    //applying for a job
    public function applyForJob(int $job_id) : void {

        //initializing variables
        $username = $_POST['username'];
        $email = $_POST['email'];
        $cv = $_POST['cv'];
        $employee_image = $_POST['employee_image'];
        $employee_id = $_POST['employee_id'];
        $job_id = $_POST['job_id'];
        $job_title = $_POST['job_title'];
        $company_id = $_POST['company_id'];

        //inserting into db
        $sql = "INSERT INTO job_applications (username, email, cv, employee_id, employee_image, job_id, job_title, company_id) VALUES(:username, :email, :cv, :employee_id, :employee_image, :job_id, :job_title, :company_id)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":cv", $cv, PDO::PARAM_STR);
        $stmt->bindValue(":employee_id", $employee_id, PDO::PARAM_INT);
        $stmt->bindValue(":employee_image", $employee_image, PDO::PARAM_STR);
        $stmt->bindValue(":job_id", $job_id, PDO::PARAM_INT);
        $stmt->bindValue(":job_title", $job_title, PDO::PARAM_STR);
        $stmt->bindValue(":company_id", $company_id, PDO::PARAM_INT);

        $stmt->execute();
 

    }
    
    //saving job
    

    //checking for user application for job
    public function checkUserApplication(int $employee_id,
                                          int $job_id) : int {

        $sql = "SELECT * FROM job_applications WHERE employee_id='$employee_id' AND job_id='$job_id'";
        $stmt = $this->conn->query($sql);
        $stmt->execute();

        return $stmt->rowCount();

    }




}