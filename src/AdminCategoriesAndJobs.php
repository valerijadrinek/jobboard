<?php
class AdminCategoriesAndJobs extends AdminGateway {

    public function __construct(Database $database) {
        parent::__construct($database);
        
    }

    //fetching all categories to display them
    public function fetchAllCategories() : array | false {
        $sql = "SELECT * FROM categories";
        $stmt = $this->conn->query($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    } 

    //show one category
    public function getCategory (int $id): object | false  {

        $sql = "SELECT * FROM categories WHERE id='$id'";
        $stmt = $this->conn->query($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);

    }

    //inserting categories
    public function createCategory( string $category_name) {

        $sql = "INSERT INTO categories (name) VALUES (:name)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":name", $category_name, PDO::PARAM_STR);
        $stmt->execute();

    }


    //updating categories
    public function updateCategory(int $category_id, string $category_name) {

        $sql = "UPDATE categories SET name=:name WHERE id='$category_id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":name", $category_name, PDO::PARAM_STR);
        $stmt->execute();

    }

    //deleting categories
    public function deleteCategory(int $id) {

        $sql = "DELETE FROM categories WHERE id='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

    }
//JOBS
   
  //fetching all jobs to display them
public function fetchAllJobs() : array | false {
    $sql = "SELECT * FROM jobs WHERE status=0";
    $stmt = $this->conn->query($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

//fetch one job by id
public function fetchJobById(int $job_id) : object | false {
    $sql = "SELECT * FROM jobs WHERE status=0 AND id='$job_id'";
    $stmt = $this->conn->query($sql);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_OBJ);
} 



//update job
public function updateStatus (int $id) {

    $sql = "UPDATE jobs SET status = 1  WHERE id='$id'";
    $stmt = $this->conn->query($sql);
    $stmt->execute();


}


//deleting job
public function deleteJob(int $id) {

    $sql = "DELETE FROM jobs WHERE id='$id'";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

}

    

    
}