<?php
class JobSearching extends JobGateway {

    public function __construct(Database $database) {
        parent::__construct($database);
        
    }

    public function searchJobs(string $job_title,
                               string $job_location, 
                               string $job_type) : array | false {

        //creating keywords
        $insert = "INSERT INTO searches (keyword) VALUES (:keyword)";
        $in_stmt= $this->conn->prepare($insert);
        $in_stmt->bindValue(":keyword", $job_title);
        $in_stmt->execute();
    
        //selecting from search inputs
        $sql = "SELECT * FROM jobs WHERE job_title LIKE '%$job_title%' AND job_location LIKE '%$job_location%' AND job_type='$job_type' AND status=1";
        $stmt = $this->conn->query($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
     }

     public function countKeywords () : array | false {
        $sql = "SELECT COUNT(keyword) AS count_keyword, keyword FROM searches GROUP BY keyword ORDER BY count_keyword DESC LIMIT 5";
        $stmt = $this->conn->query($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
     }
}