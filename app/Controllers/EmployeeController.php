<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use CodeIgniter\Controller;

class EmployeeController extends Controller
{
    protected $employeeModel;

    public function __construct()
    {
        // Load the Employee model
        $this->employeeModel = new EmployeeModel();
    }

    // Display all employees
    public function index()
    {
        // Fetch all employees from the model
        $data['employees'] = $this->employeeModel->findAll();
        
        // Load the employee management view and pass the data
        return view('gestion_employee', $data);
    }

    // Show a form to create a new employee (if needed for non-modal form)
    public function create()
    {
        return view('gestion_employee/create');
    }

    // Store a new employee in the database
    public function add()
    {
        // Get the form data
        $data = $this->request->getPost();

        // Validate form data (you can customize the validation rules)
        if ($this->validate([
            'name'      => 'required|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'position'  => 'required|max_length[50]',
            'phone'     => 'permit_empty|max_length[20]',
            'status'    => 'permit_empty|max_length[20]',
        ])) {
            // Insert the employee into the database
            $this->employeeModel->insert($data);
            
            // Redirect to the employee list page with success message
            return redirect()->to('/gestion_employee')->with('success', 'Employee added successfully.');
        } else {
            // If validation fails, return back with validation errors
            return redirect()->back()->withInput()->with('error', 'Failed to add employee.');
        }
    }

    // Show a specific employee
    public function show($id)
    {
        // Get the employee by ID
        $data['employee'] = $this->employeeModel->find($id);

        // Check if employee exists, otherwise show 404
        if (!$data['employee']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Employee not found');
        }

        return view('gestion_employee/show', $data);
    }

    // Show a form to edit an employee (if needed)
    public function edit($id)
    {
        $data['employee'] = $this->employeeModel->find($id);

        if (!$data['employee']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Employee not found');
        }

        return view('edit', $data);
    }

    // Update an employee's details
    public function update($id)
    {
        $data = $this->request->getPost();

        if ($this->employeeModel->update($id, $data)) {
            return redirect()->to('/gestion_employee')->with('success', 'Employee updated successfully.');
        }

        return redirect()->back()->with('error', 'Failed to update employee.');
    }

    // Delete an employee
    public function delete($id)
    {
        if ($this->employeeModel->delete($id)) {
            return redirect()->to('/gestion_employee')->with('success', 'Employee deleted successfully.');
        }

        return redirect()->back()->with('error', 'Failed to delete employee.');
    }
}
