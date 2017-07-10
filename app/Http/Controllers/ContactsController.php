<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Project;
use App\ProjectCategory;
use App\ProjectStage;
use App\User;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index(){
        $data = [
            'styles'  => [
                'css/contacts-style.css'
            ],
            'scripts' => [
                'libs/bootstrap/js/bootstrap.min.js',
                'http://maps.google.com/maps/api/js?key=AIzaSyBED1xxwdz2aeMSXBDtJwItnDn7apYZjF8'
            ]
        ];

        return view('pages.contacts')->with($data);
    }
}