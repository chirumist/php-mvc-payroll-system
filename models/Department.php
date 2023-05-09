<?php

use BaseClass\Model;
class Department extends Model{
    protected $table = 'department';

    protected $fillable = ['name'];

    public function getReports() {
        // $this->query('SELECT d.id AS dept_id, d.name AS dept_name, COUNT(e.id) AS total_employee, SUM(e.basic_salary) AS basic_salary, COUNT(l.id) AS total_leaves
        // FROM department d
        // LEFT JOIN employee e ON d.id = e.dept_id
        // LEFT JOIN `leave` l ON e.id = l.emp_id
        // GROUP BY d.id, d.name;
        // ');

        $this->query('SELECT d.id AS dept_id, d.name AS dept_name, COUNT(e.id) AS total_employee, SUM(e.basic_salary) AS total_salary, SUM(l.total_days) AS total_leaves, SUM(s.total) AS total_salary_paid, SUM(e.basic_salary) AS avg_salary_per_employee
            FROM department d
            LEFT JOIN employee e ON d.id = e.dept_id
            LEFT JOIN `leave` l ON e.id = l.emp_id
            LEFT JOIN salary s ON e.id = s.emp_id
            GROUP BY d.id, d.name;');

        return $this->fetchAll();
    }
}