<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\Email\Email;

class ResetPasswordController extends Controller
{
    // Display the password reset request form
    public function request()
    {
        return view('reset_password_request');
    }

    // Process the password reset token request and send the email
    public function sendToken()
    {
        $model = new UserModel();
        $email = $this->request->getPost('email');

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->with('error', 'Invalid email format');
        }

        $user = $model->where('email', $email)->first();

        if ($user) {
            // Generate and store reset token
            $token = bin2hex(random_bytes(50));
            $model->update($user['id'], ['reset_token' => $token]);

            // Send reset link email
            $resetLink = base_url("reset-password/{$token}");
            $this->sendResetEmail($email, $resetLink);

            return redirect()->to('/login')->with('message', 'Password reset link sent to your email');
        } else {
            return redirect()->to('/reset-password')->with('error', 'Email not found');
        }
    }

    // Show the password reset form
    public function reset($token)
    {
        return view('reset_password_form', ['token' => $token]);
    }

    // Update the password after validation
    public function update()
    {
        $model = new UserModel();
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');

        $user = $model->where('reset_token', $token)->first();

        if ($user) {
            // Check password length
            if (strlen($password) < 8) {
                return redirect()->back()->with('error', 'Password must be at least 8 characters long');
            }

            // Update password and clear the reset token
            $model->update($user['id'], [
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'reset_token' => null
            ]);

            return redirect()->to('/login')->with('message', 'Password updated successfully');
        } else {
            return redirect()->to('/reset-password')->with('error', 'Invalid or expired token');
        }
    }

    // Send email with the reset link
    private function sendResetEmail($email, $resetLink)
    {
        $emailService = \Config\Services::email();

        $emailService->setTo($email);
        $emailService->setFrom('mehdialtit@gmail.com', 'Gestion RH');
        $emailService->setSubject('Password Reset Request');
        $emailService->setMessage("Click this link to reset your password: <a href='{$resetLink}'>Reset Password</a>");

        if (!$emailService->send()) {
            log_message('error', 'Failed to send password reset email: ' . $emailService->printDebugger(['headers']));
        }
    }
}
