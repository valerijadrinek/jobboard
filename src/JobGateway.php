<?php

class JobGateway {

     //connection to db
     protected PDO $conn;
     public function __construct(Database $database) 
     {
         $this->conn = $database->getConnectionToDb();
       
     }

     public function insertJobs() : void {

                    $job_title = $_POST['job_title']; 
                    $category = $_POST['category'];
                    $job_location = $_POST['job_location']; 
                    $job_model = $_POST['job_model'];
                    $job_type = $_POST['job_type'];
                    $vacancy = $_POST['vacancy'];
                    $experience = $_POST['experience'];
                    $salary = $_POST['salary'];
                    $gender = $_POST['gender'];
                    $application_deadline = $_POST['application_deadline'];
                    $job_description = $_POST['job_description'];
                    $responsibilities = $_POST['responsibilities'];
                    $education_experience = $_POST['education_experience'];
                    $other_benefits = $_POST['other_benefits'];
                    $company_email = $_POST['company_email'];
                    $company_name = $_POST['company_name'];
                    $company_id = $_POST['company_id'];
                    $company_image = $_POST['company_image'];
                    

        
            //insert into db
            $sql = "INSERT INTO jobs (job_title, category, job_location, job_model, job_type, vacancy, experience, salary, gender, application_deadline, job_description, responsibilities, education_experience, other_benefits, company_email, company_name, company_id, company_image) VALUES (:job_title, :category, :job_location, :job_model, :job_type, :vacancy, :experience, :salary, :gender, :application_deadline, :job_description, :responsibilities, :education_experience, :other_benefits, :company_email, :company_name, :company_id, :company_image)";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":job_title", $job_title, PDO::PARAM_STR);
            $stmt->bindValue(":category", $category, PDO::PARAM_STR);
            $stmt->bindValue(":job_location", $job_location, PDO::PARAM_STR);
            $stmt->bindValue(":job_model", $job_model, PDO::PARAM_STR);
            $stmt->bindValue(":job_type", $job_type, PDO::PARAM_STR);
            $stmt->bindValue(":vacancy", $vacancy, PDO::PARAM_INT);
            $stmt->bindValue(":experience", $experience, PDO::PARAM_STR);
            $stmt->bindValue(":salary", $salary, PDO::PARAM_STR);
            $stmt->bindValue(":gender", $gender, PDO::PARAM_STR);
            $stmt->bindValue(":application_deadline", $application_deadline, PDO::PARAM_STR);
            $stmt->bindValue(":job_description", $job_description, PDO::PARAM_STR);
            $stmt->bindValue(":responsibilities", $responsibilities, PDO::PARAM_STR);
            $stmt->bindValue(":education_experience", $education_experience, PDO::PARAM_STR);
            $stmt->bindValue(":other_benefits", $other_benefits, PDO::PARAM_STR);
            $stmt->bindValue(":company_email", $company_email, PDO::PARAM_STR);
            $stmt->bindValue(":company_name", $company_name, PDO::PARAM_STR);
            $stmt->bindValue(":company_id", $company_id, PDO::PARAM_INT);
            $stmt->bindValue(":company_image", $company_image, PDO::PARAM_STR);
            


            $stmt->execute();

            
     
    }

    //fetching jobs by each company for public company profile page
    public function fetchJobsByCompany (int $id) : array | false {

        $sql = "SELECT * FROM jobs WHERE company_id = '$id' AND status=1";
        $stmt = $this->conn->query($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    
    }

    
    //fetching all jobs by status for index page
    public function fetchJobsByStatus () : array | false {

        $sql = "SELECT * FROM jobs WHERE status=1 ORDER BY created_at DESC LIMIT 20";
        $stmt = $this->conn->query($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    
    }


    //fetch job by id for single page
    public function fetchJobsByID(int $id) : object | false {

        $sql = "SELECT * FROM jobs WHERE id = '$id'";
        $stmt = $this->conn->query($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    
    }
    
    //categories
    public function fetchCategories () : array | false {

        $sql = "SELECT * FROM categories";
        $stmt = $this->conn->query($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    
    }

    public function fetchJobsByCategorie(string $name) : array | false {

        $sql = "SELECT * FROM jobs WHERE category='$name' AND status=1";
        $stmt = $this->conn->query($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }

    //get related jobs
    public function getRelatedJobs (int $id,
                                    string $category) : array | false {

            $this->fetchJobsByID($id);

            $sql = "SELECT * FROM jobs WHERE category='$category' AND status=1 AND id!='$id'";
            $stmt = $this->conn->query($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
  

    //count related jobs
    public function countRelatedJobs(int $id,
                                    string $category) : object {


        $sql = "SELECT COUNT(*) as job_count FROM jobs WHERE category='$category' AND status=1 AND id!='$id'";
        $stmt = $this->conn->query($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);

}

//count all jobs by status
public function countAllJobsByStatus () : object {

    $sql = "SELECT COUNT(*) as job_count FROM jobs WHERE status=1";
    $stmt = $this->conn->query($sql);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_OBJ);

}

//delete jobs
public function deleteJobsByID(int $id) {

    $sql = "DELETE FROM jobs WHERE id = '$id'";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

    

}

public function updateJobsByID(int $job_id) {

    //fetching jobs by id for empty inputs
    $jobs = $this->fetchJobsByID($job_id);


    //initializing variables
    $job_title = $_POST['job_title']; 
    $category = $_POST['category'];
    $job_location = $_POST['job_location']; 
    $job_model = $_POST['job_model'];
    $job_type = $_POST['job_type'];
    $vacancy = $_POST['vacancy'];
    $experience = $_POST['experience'];
    $salary = $_POST['salary'];
    $gender = $_POST['gender'];
    $application_deadline = $_POST['application_deadline'];
    $job_description = $_POST['job_description'];
    $responsibilities = $_POST['responsibilities'];
    $education_experience = $_POST['education_experience'];
    $other_benefits = $_POST['other_benefits'];
    $company_email = $_POST['company_email'];
    $company_name = $_POST['company_name'];
    $company_id = $_POST['company_id'];
    $company_image = $_POST['company_image'];

    //insert into db
    $sql = "UPDATE jobs SET job_title=:job_title, category=:category , job_location=:job_location, job_model=:job_model, job_type=:job_type, vacancy=:vacancy, experience=:experience, salary=:salary, gender=:gender, application_deadline=:application_deadline, job_description=:job_description, responsibilities=:responsibilities, education_experience=:education_experience, other_benefits=:other_benefits, company_email=:company_email, company_name=:company_name, company_id=:company_id, company_image=:company_image WHERE id='$job_id'";

    $stmt = $this->conn->prepare($sql);

    //binding parameters 
    $stmt->bindValue(":job_title", $job_title, PDO::PARAM_STR);

    if (empty($category)) {
        $stmt->bindValue(":category", $jobs->category, PDO::PARAM_STR);
    } else {
        $stmt->bindValue(":category", $category, PDO::PARAM_STR);
    }
    
    if (empty($job_location)) {
        $stmt->bindValue(":job_location", $jobs->job_location, PDO::PARAM_STR);
    } else {
        $stmt->bindValue(":job_location", $job_location, PDO::PARAM_STR);
    }

    if (empty($job_model)) {
        $stmt->bindValue(":job_model", $jobs->job_model, PDO::PARAM_STR);
    } else {
        $stmt->bindValue(":job_model", $job_model, PDO::PARAM_STR);
    }

    if (empty($job_type)) {
        $stmt->bindValue(":job_type", $jobs->job_type, PDO::PARAM_STR);
    } else {
        $stmt->bindValue(":job_type", $job_type, PDO::PARAM_STR);
    }
    $stmt->bindValue(":vacancy", $vacancy, PDO::PARAM_INT);

    if (empty($experience)) {
        $stmt->bindValue(":experience", $jobs->experience, PDO::PARAM_STR);
    } else {
        $stmt->bindValue(":experience", $experience, PDO::PARAM_STR);
    }

    if (empty($salary)) {
        $stmt->bindValue(":salary", $jobs->salary, PDO::PARAM_STR);
    } else {
        $stmt->bindValue(":salary", $salary, PDO::PARAM_STR);
    }

    if (empty($gender)) {
        $stmt->bindValue(":gender", $jobs->gender, PDO::PARAM_STR);
    } else {
        $stmt->bindValue(":gender", $gender, PDO::PARAM_STR);
    }
    $stmt->bindValue(":application_deadline", $application_deadline, PDO::PARAM_STR);
    $stmt->bindValue(":job_description", $job_description, PDO::PARAM_STR);
    $stmt->bindValue(":responsibilities", $responsibilities, PDO::PARAM_STR);
    $stmt->bindValue(":education_experience", $education_experience, PDO::PARAM_STR);
    $stmt->bindValue(":other_benefits", $other_benefits, PDO::PARAM_STR);
    $stmt->bindValue(":company_email", $company_email, PDO::PARAM_STR);
    $stmt->bindValue(":company_name", $company_name, PDO::PARAM_STR);
    $stmt->bindValue(":company_id", $company_id, PDO::PARAM_INT);
    $stmt->bindValue(":company_image", $company_image, PDO::PARAM_STR);
    


    $stmt->execute();
    

}



}




