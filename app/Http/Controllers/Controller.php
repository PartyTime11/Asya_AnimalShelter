<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FilterRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class Controller{
    public function index(){
        return response('');
    }

    public function error404(){
        abort(404);
    }
}
