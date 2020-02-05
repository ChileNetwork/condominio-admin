<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Condominio;
//use App\UcoTipo;
use App\User;
use Auth;

class SistemaController extends Controller
{
    protected $meses_abrev = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];

    public function index()
    {
        /** Funcion Principal de Control Ingreso de Usuario 
         **  Login de Usuario Authenticated: 
         **  Redireccionar segun Rol (Gerente|Superadministrator|Administrator)
         ***/
        $user = Auth::user();
        if ($user->hasRole('gerente')) :
            return redirect()->route('sistema.dashboard');
        else : //if($user->hasRole(['superadministrator','administrator']))
            return redirect()->route('manage.dashboard');
        endif;
    }

    public function indexUcoTipo()
    {
        //$ucostipo_de_condominio = \App\CondominioUcostipo::where('condominio_id',$c)->get();
        return view('sistema.tipouco.index', [
            //'tipoucos' => UcoTipo::all()
        ]);
    }

    public function mostrarDashboard()
    {
        
        return view('sistema.dashboard', [
            
            'users' => User::all(),
            'meses_abrev' => $this->meses_abrev,
            //'condominios' => Condominio::all()
        ]);
    }

    public function storeUcoTipo(Request $request)
    {
        try {
            $ucos_tipo = new UcoTipo();
            $ucos_tipo->tipo_uco = $request->tipo_uco;
            $ucos_tipo->descrip_uco = $request->descrip_uco;
            $ucos_tipo->save();
        } catch (Exception $e) {
            $request->session()->flash('status_danger', $e->getMessage());
            $request->session()->flash('status_warning', 'Advertencia: No se pudo guardar el tipo de uco.');
            return redirect()->route('sistema.tipouco.index');
        }
        $request->session()->flash('status', 'Tipo de uco creado correctamente.');
        return redirect()->route('sistema.tipouco.index');
    }
}
