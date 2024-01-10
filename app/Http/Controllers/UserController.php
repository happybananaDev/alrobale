<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function getAdmin() {
        return view('user.admin');
    }

    // Handle admin login
    public function adminLogin(Request $request) {
        $formData = $request->validate([
            "username" => "required",
            "password" => "required",
        ]);

        if(auth()->attempt($formData)) {
            $request->session()->regenerate();

            return redirect("/");
        } else {
            return redirect("/admin");
        }
    }

    // Logout from admin account
    public function adminLogout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/");
    }

    // Handle send email from contact form
    public function sendMail(Request $request) {
        $formData = $request->validate([
            "name" => "required",
            "email" => "required",
            "subject" => "required",
            "msg" => "required",
        ]);

        Mail::to('info@alrobale.info')->send(new Contact(
            $formData['name'],
            $formData['email'],
            $formData['subject'],
            $formData['msg'],
        ));

        return redirect('/');
    }
}
