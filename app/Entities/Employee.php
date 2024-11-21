<?php

namespace App\Entities;

use CodeIgniter\Entity;

class Employee extends Entity\Entity
{
    // You can define properties here that map to your database columns
    protected $id;
    protected $name;
    protected $email;
    protected $position;
    protected $department;
    protected $phone;
    protected $hire_date;
    protected $salary;
    protected $status;

    // Optionally, add methods to manipulate data if necessary
    public function getFullName()
    {
        return ucfirst($this->name);
    }

    // You can also add getter and setter methods if needed
    public function setSalary($salary)
    {
        $this->attributes['salary'] = number_format($salary, 2);
    }

    public function getSalary()
    {
        return $this->attributes['salary'];
    }
}
