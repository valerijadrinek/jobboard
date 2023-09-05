<?php
class UserApplicant extends UserGateway {

    public function __construct(Database $database) {
        parent::__construct($database);
        
    }

    public function getApplicantsForJob(int $company_id, int $job_id) : array | false {

        $sql = "SELECT * FROM job_applications WHERE company_id = '$company_id' AND job_id = '$job_id'";
        $stmt = $this->conn->query($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllApplicants (int $company_id) : array | false {

        $sql = "SELECT * FROM job_applications WHERE company_id = '$company_id'";
        $stmt = $this->conn->query($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}