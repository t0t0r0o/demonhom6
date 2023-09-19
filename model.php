<?php
class model
{

    private $conn ;
    public function __construct ()
    {
        $this->conection();
        
    }
    public function conection ()
    {

        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=info_user", "root", "Tru*ng0512");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function get_users ($id)
    {   
        if($id) {
            $sql = "SELECT id,hoten,ngaysinh,email,role FROM users ";
            $stmt = $this->conn->prepare($sql);
            // $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        return [];
    }

    public function authentication($username, $password) {
        // print_r($username);
        // exit;
        $sql = "SELECT id from users where username = '$username' and password = '$password'";
        $stmt = $this->conn->query($sql); 
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]['id'];
    }
}
?>