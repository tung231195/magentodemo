<?php 
class Person {
    protected $first_name;
    protected $last_lname;

    public function __construct($first_name,$last_lname) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }
}

class PersonInfo {
     private $person;
     
     public function __construct($firstName,$lastName) {
        $this->person = new Person($first_name,$lastName);
     }

}


class PersonInfo1 {
    private $person;
    
    public function __construct(Person $person) {
       $this->person = $person;
    }

}
