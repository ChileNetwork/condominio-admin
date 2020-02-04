<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AccessController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return redirect()->route('sistema.dashboard');
        /*if ($user->hasRole('gerente')) :
            return redirect()->route('sistema.dashboard');
        elseif ($user->hasRole(['superadministrator', 'administrator'])) :
            return redirect()->route('manage.dashboard');
        elseif ($user->hasRole(['copropietario'])) :
            return redirect()->route('usuario');
        endif;*/
    }
}
