<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{

    public $users = [
        ['name' => 'Vincenzo', 'surname' => 'Lisitano', 'role' => 'CEO'],
        ['name' => 'Fatima', 'surname' => 'Essalhi', 'role' => 'Grafic Designer'],
        ['name' => 'Luca', 'surname' => 'Salcol', 'role' => 'Senior Developer'],
    ];

    public function homepage()
    {
        return view('welcome');
    }

    public function aboutUs()
    {

        return view('about-us', ['users' => $this->users]);
    }

    public function aboutUsDetail($name)
    {
        foreach ($this->users as $user) {
            if ($name == $user['name']) {
                return view('about-us-detail', ['user' => $user]);
            }
        }
    }

    public function contacts()
    {
        return view('contacts');
    }
}
