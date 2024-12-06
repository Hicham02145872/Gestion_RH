<?php
namespace App\Controllers;

use App\Models\PayrollModel;
use App\Models\BenefitsModel;
use CodeIgniter\Controller;

class PayrollAndBenefitsController extends Controller {
    protected $payrollModel;
    protected $benefitsModel;

    public function __construct() {
        $this->payrollModel = new PayrollModel();
        $this->benefitsModel = new BenefitsModel();
    }

    public function index() {
        $data = [
            'payrolls' => $this->payrollModel->findAll(),
            'benefits' => $this->benefitsModel->findAll()
        ];

        return view('payroll_and_benefits', $data);
    }

    public function addPayroll() {
        $this->payrollModel->insert($this->request->getPost());
        return redirect()->to('/payroll-benefits');
    }

    public function addBenefit() {
        $this->benefitsModel->insert($this->request->getPost());
        return redirect()->to('/payroll-benefits');
    }
}