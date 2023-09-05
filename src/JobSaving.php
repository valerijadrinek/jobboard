<?php
class JobSaving extends JobGateway {
    public function __construct(Database $database) {
        parent::__construct($database);
        
    }

    //saving job
    public function saveJob(int $job_id) : void {

        //initializing variables
        $employee_id = $_POST['employee_id'];
        $job_id = $_POST['job_id'];

        //inserting into db
        $sql = "INSERT INTO job_save (employee_id, job_id) VALUES( :employee_id, :job_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":employee_id", $employee_id, PDO::PARAM_INT);
        $stmt->bindValue(":job_id", $job_id, PDO::PARAM_INT);

        $stmt->execute();

    }

    //deleting saved job
    public function deleteSavedJob(int $job_id, 
                                   int $employee_id) {
        

        $sql = "DELETE FROM job_save WHERE employee_id='$employee_id' AND job_id='$job_id' ";
        $stmt = $this->conn->query($sql);
        $stmt->execute();

    }

    //checking for saved job
    public function checkUserSavedJob(int $employee_id,
                                         int $job_id) : int {

        $sql = "SELECT * FROM job_save WHERE employee_id='$employee_id' AND job_id='$job_id'";
        $stmt = $this->conn->query($sql);
        $stmt->execute();

     return $stmt->rowCount();

    }

    //fetching saved jobs
    public function fetchSavedJobs(int $employee_id) : array | false {

        $sql = "SELECT * FROM jobs JOIN job_save ON jobs.id = job_save.employee_id WHERE employee_id ='$employee_id'";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }

 


}