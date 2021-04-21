<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class TodoController extends Controller
{
    public function index() {

    $name = request('name');
 
    return view('todo', ['type' => 'Doing homework', 'name' => $name, 'age' => request('age')]);
    }

    public function show($id) {
        return view('details', ['id' => $id]);
    }
}
