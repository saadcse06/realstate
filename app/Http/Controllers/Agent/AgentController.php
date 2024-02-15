<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function agent_dashboard(){
        return view('Agent.agent_dashboard');
    }
}
