<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark navbar-magnaprop">
    <a class="navbar-brand m-0" href="{ {route('manage.condominio')}}">
        <div class="d-flex flex-column pl-4">
            <h5 class="p-0">ChileNetwork <small>SpA.</small></h5>
            <h6 class="px-1 py-0 ">AdminCondominio <small class="bg-warning text-dark p-1">.CL</small></h6>
            
        </div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
            <div class="navbar-text pl-3 pt-1">
                <div class="d-flex flex-row">
                    <div class="d-flex flex-row">
                        <div class="d-flex flex-row pl-5">
                            @if(Request::segment(1)=='manage')
                                @if(Request::segment(2)=='dashboard')
                                    <h3 class="verde_corporativo text-left"> AdminCondominio <span class="verder_corporativo">[ Dashboard ]</span>
                                    </h3>
                                @elseif(Request::segment(2)=='condominio')
                                    @if(Request::segment(3)=='')
                                        <h3 class="verde_corporativo text-left"> AdminCondominio <!--<span class="verder_corporativo">[ Lista de Condominios ]</span>-->
                                        </h3>
                                    @else
                                        <h3 class="text-light text-left">Comunidad: <strong class="verde_corporativo">{{$condominio->nombre_cond}}</strong>
                                        </h3>
                                    @endif
                                @elseif(Request::segment(2)=='administrador')
                                    <h3 class="verde_corporativo text-left"> AdminCondominio <!--<span class="verde_corporativo">[ Lista de Administradores ]</span>-->
                                        </h3>
                                @endif
                               
                            @elseif(Request::segment(1)=='sistema')
                                <h3 class="verde_corporativo text-left"> AdminCondominio <span class="text-white">[ Dashboard ]</span>
                                </h3>
                            @elseif(Request::segment(1)=='usuario')
                                <h3 class="verde_corporativo text-left"> AdminCondominio <span class="text-white">[ Dashboard ]</span>
                                </h3>
                            @else
                                 <h3 class="bg-danger text-light text-left"> Error <span class="verde_corporativo">[sistema y/o manage not present ]</span>
                                </h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div> 
        </ul>
        @role(['gerente','superadministrator'])
        <ul class="navbar-nav pr-3">
             <li>
                <button type="button" class="btn btn-dark">
                    <span class="fa fa-envelope-open"></span>
                    <span class="badge badge-danger">3</span>
                    <span class="sr-only">unread messages</span>
                </button>
             </li>
        </ul>
        @endrole
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
                   <ul class="list-group list-group-flush">
                        <li class="list-group-item"> 
                            <h6 class="dropdown-header">Hoy {{date('d')}} {{$meses_abrev[date('n')-1]}} {{date('Y')}}</h6>
                            <a class="dropdown-item disabled" href="#" tabindex="-1" aria-disabled="true"><code class="bg-dark text-light">Rol: 
                            @if( Auth::user()->hasRole('gerente') )
                                <span>Gerente  </span>
                            @else 
                                @if( Auth::user()->hasRole('superadministrator'))
                                    <span>Superadministrator </span> 
                                @elseif(Auth::user()->hasRole('administrator'))
                                    <span>Administrador</span> 
                                @elseif(Auth::user()->hasRole('copropietario'))
                                    <span>Copropietario</span> 
                                @else
                                    <span>SIN ROL</span> 
                                @endif
                            @endif
                            </code></a>

                            @role(['superadministrator','administrator'])
                                <a class="dropdown-item" href="{ {route('manage.condominio.index')}}">Listar Mis Condominios</a>
                            @endrole
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Salir')}}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>