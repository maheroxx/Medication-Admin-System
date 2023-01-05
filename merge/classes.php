<?php

class User {
    public $id;
    public $name;
    public $surname;
    public $phone;
    public $nric;	
    public $email;
    public $username;
    public $acctype;
    public $password;
	
    public function __construct($id, $name, $surname, $phone, $nric, $email, $username, $acctype, $password) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname; 
        $this->phone = $phone;
        $this->nric = $nric;		
        $this->email = $email;
        $this->username = $username;
        $this->acctype = $acctype;
        $this->password = $password;
    }
	
    public static function login($conn, $acctype, $username, $password) {
        $acctype = $conn->real_escape_string($acctype);
        $username = $conn->real_escape_string($username);
        $password = $conn->real_escape_string($password);

        $stmt = $conn->prepare
        ("	
            SELECT id, name, surname, phone, nric, email, username, acctype, password
            FROM user
            WHERE acctype = ?
            AND username = ? 
            AND password = ?
        ");
        $stmt->bind_param("sss", $acctype, $username, $password);
        $stmt->execute();
        $stmt->bind_result($id, $name, $surname, $phone, $nric, $email, $username, $acctype, $password);
        
        if ($stmt->fetch()) 
            return new self($id, $name, $surname, $phone, $nric, $email, $username, $acctype, $password);
        else
            return null;
    }

    public static function getFilterAdmin($conn, $name, $surname, $email, $acctype, $id) {
        $name = $conn->real_escape_string($name);
        $surname = $conn->real_escape_string($surname);
        $email = $conn->real_escape_string($email);
        $acctype = $conn->real_escape_string($acctype);
        $id = $conn->real_escape_string($id);

        $stmt = $conn->prepare
        ("
            SELECT name, surname, email, acctype, id
            FROM user
            WHERE name LIKE '%$name%'
            AND surname LIKE '%$surname%'
            AND email LIKE '%$email%'
            AND acctype LIKE '%$acctype%'
            AND id LIKE '%$id%'
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        $count = mysqli_num_rows($result);
        if ($count > 0)
            return $result;
        else
            return null;
    }
	
    public function insertUser($conn) {     
        $stmt = $conn->prepare("INSERT INTO user (name, surname, phone, nric, email, username, acctype, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $this->name, $this->surname, $this->phone, $this->nric, $this->email, $this->username, $this->acctype, $this->password);
        return $stmt->execute();
    }
}

class Doctor {
    public $id;
    public $name;
    public $surname;
    public $nric;
    public $dob;
    public $age;
    public $email;
    public $phone;	
    public $address;
    public $bloodgroup;
    public $gender;
    public $username;
    public $acctype;
    public $password;
	
    public function __construct($id, $name, $surname, $nric, $dob, $age, $email, $phone, $address, $bloodgroup, $gender, $username, $acctype, $password) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname; 
        $this->nric = $nric;
        $this->dob = $dob;
        $this->age = $age;
        $this->email = $email;		
        $this->phone = $phone;
        $this->address = $address;
        $this->bloodgroup = $bloodgroup;
        $this->gender = $gender;
        $this->username = $username;
        $this->acctype = $acctype;
        $this->password = $password;
    }
	
    public static function login($conn, $acctype, $username, $password) {
        $acctype = $conn->real_escape_string($acctype);
        $username = $conn->real_escape_string($username);
        $password = $conn->real_escape_string($password);

        $stmt = $conn->prepare
        ("	
            SELECT id, name, surname, nric, dob, age, email, phone, address, bloodgroup, gender, username, acctype, password
            FROM doctor
            WHERE acctype = ?
            AND username = ? 
            AND password = ?
        ");
        $stmt->bind_param("sss", $acctype, $username, $password);
        $stmt->execute();
        $stmt->bind_result($id, $name, $surname, $nric, $dob, $age, $email, $phone, $address, $bloodgroup, $gender, $username, $acctype, $password);
        
        if ($stmt->fetch()) 
            return new self($id, $name, $surname, $nric, $dob, $age, $email, $phone, $address, $bloodgroup, $gender, $username, $acctype, $password);
        else
            return null;
    }
	
    public static function getFilterDoctor($conn, $name, $surname, $email, $acctype, $gender, $id) {
        $name = $conn->real_escape_string($name);
        $surname = $conn->real_escape_string($surname);
        $email = $conn->real_escape_string($email);
        $acctype = $conn->real_escape_string($acctype);
        $gender = $conn->real_escape_string($gender);
        $id = $conn->real_escape_string($id);

        $stmt = $conn->prepare
        ("
            SELECT name, surname, email, acctype, gender, id
            FROM doctor
            WHERE name LIKE '%$name%'
            AND surname LIKE '%$surname%'
            AND email LIKE '%$email%'
            AND acctype LIKE '%$acctype%'
            AND gender LIKE '%$gender%'
            AND id LIKE '%$id%'
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        $count = mysqli_num_rows($result);
        if ($count > 0)
            return $result;
        else
            return null;
    }
}

class Nurse {
    public $id;
    public $name;
    public $surname;
    public $nric;
    public $dob;
    public $age;
    public $email;
    public $phone;	
    public $address;
    public $bloodgroup;
    public $gender;
    public $username;
    public $acctype;
    public $password;
	
    public function __construct($id, $name, $surname, $nric, $dob, $age, $email, $phone, $address, $bloodgroup, $gender, $username, $acctype, $password) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname; 
        $this->nric = $nric;
        $this->dob = $dob;
        $this->age = $age;
        $this->email = $email;		
        $this->phone = $phone;
        $this->address = $address;
        $this->bloodgroup = $bloodgroup;
        $this->gender = $gender;
        $this->username = $username;
        $this->acctype = $acctype;
        $this->password = $password;
    }
	
    public static function login($conn, $acctype, $username, $password) {
        $acctype = $conn->real_escape_string($acctype);
        $username = $conn->real_escape_string($username);
        $password = $conn->real_escape_string($password);

        $stmt = $conn->prepare
        ("	
            SELECT id, name, surname, nric, dob, age, email, phone, address, bloodgroup, gender, username, acctype, password
            FROM nurse
            WHERE acctype = ?
            AND username = ? 
            AND password = ?
        ");
        $stmt->bind_param("sss", $acctype, $username, $password);
        $stmt->execute();
        $stmt->bind_result($id, $name, $surname, $nric, $dob, $age, $email, $phone, $address, $bloodgroup, $gender, $username, $acctype, $password);
        
        if ($stmt->fetch()) 
            return new self($id, $name, $surname, $nric, $dob, $age, $email, $phone, $address, $bloodgroup, $gender, $username, $acctype, $password);
        else
            return null;
    }
	
    public static function getFilterNurse($conn, $name, $surname, $email, $acctype, $gender, $id) {
        $name = $conn->real_escape_string($name);
        $surname = $conn->real_escape_string($surname);
        $email = $conn->real_escape_string($email);
        $acctype = $conn->real_escape_string($acctype);
        $gender = $conn->real_escape_string($gender);
        $id = $conn->real_escape_string($id);

        $stmt = $conn->prepare
        ("
            SELECT name, surname, email, acctype, gender, id
            FROM nurse
            WHERE name LIKE '%$name%'
            AND surname LIKE '%$surname%'
            AND email LIKE '%$email%'
            AND acctype LIKE '%$acctype%'
            AND gender LIKE '%$gender%'
            AND id LIKE '%$id%'
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        $count = mysqli_num_rows($result);
        if ($count > 0)
            return $result;
        else
            return null;
    }
}
?>



    <!-- 
	
	
	public function insertDoctor($conn) {     
        $stmt = $conn->prepare("INSERT INTO doctor (name, surname, nric, dob, age, email, phone, address, bloodgroup, gender, username, acctype, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssssss", $this->name, $this->surname, $this->nric, $this->dob, $this->age, $this->email, $this->phone, $this->address, $this->bloodgroup, $this->gender, $this->username, $this->acctype, $this->password);
        return $stmt->execute();
    }
	
    public static function deleteDoctor($id) {
        $id = $conn->real_escape_string($id);

        $stmt = $conn->prepare("DELETE FROM doctor WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function insertNurse($conn) {     
        $stmt = $conn->prepare("INSERT INTO nurse (name, surname, nric, dob, age, email, phone, address, bloodgroup, gender, username, acctype, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssssss", $this->name, $this->surname, $this->nric, $this->dob, $this->age, $this->email, $this->phone, $this->address, $this->bloodgroup, $this->gender, $this->username, $this->acctype, $this->password);
        return $stmt->execute();
    }	
	
    public static function deleteNurse($id) {
        $id = $conn->real_escape_string($id);

        $stmt = $conn->prepare("DELETE FROM nurse WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }	
	-->