<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FilterRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class Controller{
    public function index(){
        return csrf_token(); 
    }

    public function error404(){
        return response()->json([ 'error' => 'wrong data' ]); 
    }
}
