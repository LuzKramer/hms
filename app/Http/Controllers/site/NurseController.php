<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NurseController extends Controller
{

    public function board(){
        return view(view:'nurse.board');
    }
}
