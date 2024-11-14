<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class EmailController extends Controller
{
    public function index()
    {
        $email = \Config\Services::email();

        $email->setTo('hichamaltit91@gmail.com');
        $email->setSubject('Test test allah allah');
        $email->setMessage('hada rah test test');

        if ($email->send()) {
            echo 'Email successfully sent';
        } else {
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
    }
}
