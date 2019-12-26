<?php


class Teacher
{public $id;
    public $firstName;
    public $lastName;
    public $teach;
    public $classroom;

    public function __construct(string $firstName, string $lastName, string $teach, string  $classroom, int $id = null)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->teach = $teach;
        $this->classroom = $classroom;
        $this->id = $id;

    }

    public function validate(): bool
    {
        if (iconv_strlen($this->firstName) > 50 || iconv_strlen($this->firstName) < 2) {
            return false;
        }
        if (iconv_strlen($this->lastName) > 50 || iconv_strlen($this->lastName) < 2) {
            return false;
        }
        if (iconv_strlen($this->teach) > 35 || iconv_strlen($this->teach) < 2) {
            return false;
        }
        if (iconv_strlen($this->classroom) > 25 || iconv_strlen($this->classroom) <2 ){
            return false;
        }
        return true;
    }

}