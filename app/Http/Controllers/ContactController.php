<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        return view('contact',
        ['title' => 'contact',
    'nama' => 'mas wisnu',
     'kelas' => '11 pplg',
     'linkedin' => 'https://www.linkedin.com/in/wisnu-ibrahimma-f-2251b42ab/',
     'github' => 'https://github.com/wisnuibroo'
]);
    }
}
