<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diagnostico;

class ControllerLeads extends Controller
{
    public function index()
    {
        $leads = Diagnostico::orderBy('created_at', 'desc')->get();
        
        // Retorna a view plana que criamos na raiz de views
        return view('diagnosticos_lista', compact('leads'));
    }
}
