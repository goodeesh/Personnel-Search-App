<?php
include("./models/person.php");
class DataHandler
{
    public function queryPersons()
    {
        $res =  $this->getDemoData();
        return $res;
    }

    public function queryPersonById($id)
    {
        foreach ($this->queryPersons() as $val) {
            if ($val[0]->id == $id) {
                // Asignar las propiedades firstname y lastname a dos variables
                list($firstName, $lastName) = array($val[0]->firstname, $val[0]->lastname);
                // Concatenar las dos variables con un espacio
                $fullName = $firstName . ' ' . $lastName;
                // Añadir el nombre completo al resultado
            }
        }
        return $fullName;
    }
    public function queryPersonByName($name)
    {
        $result = array();
        foreach ($this->queryPersons() as $val) {
            if ($val[0]->lastname == $name) {
                array_push($result, $val);
            }
        }
        return $result;
    }
    public function queryPersonByFullname($name)
    {
        foreach ($this->queryPersons() as $val) {
                // Asignar las propiedades firstname y lastname a dos variables
                list($firstName, $lastName) = array($val[0]->firstname, $val[0]->lastname);
                // Concatenar las dos variables con un espacio
                $fullName = $firstName . ' ' . $lastName;
                // Añadir el nombre completo al resultado
                if ($name == $fullName) {
                    list($email, $phone) = array($val[0]->email, $val[0]->phone);
                    $contactData = 'Email: '. $email . ' Telephone number: ' . $phone;
                    return $contactData;
                } 
        }
        return null;
    }
    public function queryPersonByFullnameDepartment($name)
    {
        foreach ($this->queryPersons() as $val) {
                // Asignar las propiedades firstname y lastname a dos variables
                list($firstName, $lastName) = array($val[0]->firstname, $val[0]->lastname);
                // Concatenar las dos variables con un espacio
                $fullName = $firstName . ' ' . $lastName;
                // Añadir el nombre completo al resultado
                if ($name == $fullName) {
                    list($department) = array($val[0]->department);
                    $departmentData = 'Department: '. $department;
                    return $departmentData;
                } 
        }
        return null;
    }
    private static function getDemoData()
    {
        $demodata = [
            [new Person(1, "Jane", "Doe", "jane.doe@fhtw.at", 1234567, "Central IT")],
            [new Person(2, "John", "Doe", "john.doe@fhtw.at", 34345654, "Help Desk")],
            [new Person(3, "baby", "Doe", "baby.doe@fhtw.at", 54545455, "Management")],
            [new Person(4, "Mike", "Smith", "mike.smith@fhtw.at", 343477778, "Faculty")],
        ];
        return $demodata;
    }
}
