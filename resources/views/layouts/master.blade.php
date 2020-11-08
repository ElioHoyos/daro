<html lang="en"><!-- Mirrored from big-bang-studio.com/cosmos/dashboard-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:54:10 GMT --><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="">
    <title>DARO</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{-- <link rel="stylesheet" href="css/cosmos.min.css">
    <link rel="stylesheet" href="css/application.min.css"> --}}
  <style type="text/css"></style></head>
  <body class="layout layout-header-fixed layout-left-sidebar-fixed layout-desktop">
      @php
          $usertype = "";
          $year = date("Y");
          if(\Auth::user()->Tipo == 1)
          {
              $usertype = "Administrador";
          }else if(\Auth::user()->Tipo == 2)
          {
            $usertype = "Invitado";
          }

      @endphp
    <div class="site-overlay"></div>
    <div class="site-header">
      <nav class="navbar navbar-default">
        <div class="navbar-header">
          <a class="navbar-brand" href="index-2.html">
            <img src="img/logo.png" alt="" height="25">
            <span>DARO</span>
          </a>
          <button class="navbar-toggler left-sidebar-toggle pull-left visible-xs" type="button">
            <span class="hamburger"></span>
          </button>
          <button class="navbar-toggler right-sidebar-toggle pull-right visible-xs-block" type="button">
            <i class="zmdi zmdi-long-arrow-left"></i>
            <div class="dot bg-danger"></div>
          </button>
          <button class="navbar-toggler pull-right visible-xs-block" type="button" data-toggle="collapse" data-target="#navbar">
            <span class="more"></span>
          </button>
        </div>
        <div class="navbar-collapsible">
          <div id="navbar" class="navbar-collapse collapse">
            <button class="navbar-toggler left-sidebar-collapse pull-left hidden-xs" type="button">
              <span class="hamburger"></span>
            </button>
            <button class="navbar-toggler right-sidebar-toggle pull-right hidden-xs" type="button">
              <i class="zmdi zmdi-long-arrow-left"></i>
              <div class="dot bg-danger"></div>
            </button>
            <ul class="nav navbar-nav">
              <li class="visible-xs-block">
                <div class="nav-avatar">
                  <img class="img-circle" src="img/avatars/1.jpg" alt="" width="48" height="48">
                </div>
                <h4 class="navbar-text text-center">Welcome!</h4>
              </li>
            </ul>
            {{-- <form class="navbar-form navbar-left">
              <div class="navbar-search-group">
                <input type="text" class="form-control" placeholder="Search">
                <button type="submit" class="btn btn-default">
                  <i class="zmdi zmdi-search"></i>
                </button>
              </div>
            </form> --}}
            <ul class="nav navbar-nav navbar-right">
              <li class="nav-table dropdown visible-xs-block">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <span class="nav-cell nav-icon">
                    <i class="zmdi zmdi-account-o"></i>
                  </span>
                  <span class="hidden-md-up m-l-15">Account</span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="#">Perfil</a></li>
                  <li><a href="#">Settings</a></li>
                  <li><a href="#">Help</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form></li>
                </ul>
              </li>
              <li class="nav-table dropdown">
                {{-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <span class="nav-cell nav-icon">
                    <i class="zmdi zmdi-apps"></i>
                  </span>
                  <span class="hidden-md-up m-l-15">Applications</span>
                </a> --}}
                {{-- <div class="dropdown-menu dropdown-apps custom-dropdown">
                  <div class="a-area">
                    <div class="row gutter-xs">
                      <div class="col-xs-4">
                        <div class="a-item">
                          <a href="#">
                            <div class="ai-icon">
                              <img class="img-responsive" src="img/brands/dropbox.png" alt="">
                            </div>
                            <div class="ai-title">Dropbox</div>
                          </a>
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <div class="a-item">
                          <a href="#">
                            <div class="ai-icon">
                              <img class="img-responsive" src="img/brands/github.png" alt="">
                            </div>
                            <div class="ai-title">Github</div>
                          </a>
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <div class="a-item">
                          <a href="#">
                            <div class="ai-icon">
                              <img class="img-responsive" src="img/brands/wordpress.png" alt="">
                            </div>
                            <div class="ai-title">Wordpress</div>
                          </a>
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <div class="a-item">
                          <a href="#">
                            <div class="ai-icon">
                              <img class="img-responsive" src="img/brands/gmail.png" alt="">
                            </div>
                            <div class="ai-title">Gmail</div>
                          </a>
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <div class="a-item">
                          <a href="#">
                            <div class="ai-icon">
                              <img class="img-responsive" src="img/brands/drive.png" alt="">
                            </div>
                            <div class="ai-title">Drive</div>
                          </a>
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <div class="a-item">
                          <a href="#">
                            <div class="ai-icon">
                              <img class="img-responsive" src="img/brands/dribbble.png" alt="">
                            </div>
                            <div class="ai-title">Dribbble</div>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="dropdown-footer">
                    <a href="#">View all apps</a>
                  </div>
                </div> --}}
              </li>
              {{-- <li class="nav-table dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <span class="nav-cell nav-icon">
                    <i class="zmdi zmdi-notifications-none"></i>
                  </span>
                  <span class="hidden-md-up m-l-15">Notifications</span>
                  <span class="label label-success">3</span>
                </a>
                <div class="dropdown-menu custom-dropdown dropdown-notifications dropdown-menu-right">
                  <div class="dropdown-header">
                    <span>Notifications</span>
                    <a href="#" class="text-primary">Mark all as read</a>
                  </div>
                  <div class="n-items">
                    <div class="custom-scrollable-wrapper" style="position: relative; overflow: hidden; width: 100%; height: 100%;"><div class="custom-scrollbar" style="overflow: hidden; width: 100%; height: 100%;">
                      <div class="n-item">
                        <div class="ni-img">
                          <img class="img-circle" src="img/avatars/1.jpg" alt="" width="40" height="40">
                        </div>
                        <div class="ni-text"><a href="#">John Doe</a> is now following <a href="#">Kate Morris</a>.</div>
                        <div class="ni-time">10 min</div>
                      </div>
                      <div class="n-item">
                        <div class="ni-img">
                          <img class="img-circle" src="img/avatars/2.jpg" alt="" width="40" height="40">
                        </div>
                        <div class="ni-text"><a href="#">Alexander Olsen</a> liked post <a href="#">Getting Started with SASS</a>.</div>
                        <div class="ni-time">40 min</div>
                      </div>
                      <div class="n-item">
                        <div class="ni-img">
                          <img class="img-circle" src="img/avatars/3.jpg" alt="" width="40" height="40">
                        </div>
                        <div class="ni-text"><a href="#">Linda Davis</a> commented post <a href="#">How to use Bower</a>.</div>
                        <div class="ni-time">3 hours</div>
                      </div>
                      <div class="n-item">
                        <div class="ni-img">
                          <img class="img-circle" src="img/avatars/4.jpg" alt="" width="40" height="40">
                        </div>
                        <div class="ni-text"><a href="#">John Doe</a> is now following <a href="#">Kate Morris</a>.</div>
                        <div class="ni-time">10 min</div>
                      </div>
                      <div class="n-item">
                        <div class="ni-img">
                          <img class="img-circle" src="img/avatars/5.jpg" alt="" width="40" height="40">
                        </div>
                        <div class="ni-text"><a href="#">Alexander Olsen</a> liked post <a href="#">Getting Started with SASS</a>.</div>
                        <div class="ni-time">40 min</div>
                      </div>
                      <div class="n-item">
                        <div class="ni-img">
                          <img class="img-circle" src="img/avatars/6.jpg" alt="" width="40" height="40">
                        </div>
                        <div class="ni-text"><a href="#">Linda Davis</a> commented post <a href="#">How to use Bower</a>.</div>
                        <div class="ni-time">3 hours</div>
                      </div>
                    </div><div class="custom-scrollbar-bar" style="background: rgb(0, 0, 0); width: 4px; position: absolute; top: 0px; opacity: 0.2; display: none; border-radius: 7px; z-index: 99; right: 4px;"></div><div class="custom-scrollbar-rail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 4px;"></div></div>
                  </div>
                  <div class="dropdown-footer">
                    <a href="#">View all notifications</a>
                  </div>
                </div>
              </li> --}}
              {{-- <li class="nav-table dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <span class="nav-cell nav-icon">
                    <i class="zmdi zmdi-email-open"></i>
                  </span>
                  <span class="hidden-md-up m-l-15">Messages</span>
                  <span class="label label-warning">7</span>
                </a>
                <div class="dropdown-menu custom-dropdown dropdown-messages dropdown-menu-right">
                  <div class="dropdown-header">
                    <span>Recent messages</span>
                    <a href="#" class="text-primary">New Message</a>
                  </div>
                  <div class="m-items">
                    <div class="custom-scrollable-wrapper" style="position: relative; overflow: hidden; width: 100%; height: 100%;"><div class="custom-scrollbar" style="overflow: hidden; width: 100%; height: 100%;">
                      <div class="m-item">
                        <a href="#">
                          <div class="mi-icon bg-warning">
                            <i class="zmdi zmdi-upload"></i>
                          </div>
                          <div class="mi-time">10 min</div>
                          <div class="mi-title">Upload status</div>
                          <div class="mi-text text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                        </a>
                      </div>
                      <div class="m-item">
                        <a href="#">
                          <div class="mi-icon bg-success">
                            <i class="zmdi zmdi-money"></i>
                          </div>
                          <div class="mi-time">40 min</div>
                          <div class="mi-title">Income</div>
                          <div class="mi-text text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                        </a>
                      </div>
                      <div class="m-item">
                        <a href="#">
                          <div class="mi-icon bg-primary">
                            <i class="zmdi zmdi-alert-triangle"></i>
                          </div>
                          <div class="mi-time">3 hours</div>
                          <div class="mi-title">New task</div>
                          <div class="mi-text text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                        </a>
                      </div>
                      <div class="m-item">
                        <a href="#">
                          <div class="mi-icon bg-warning">
                            <i class="zmdi zmdi-upload"></i>
                          </div>
                          <div class="mi-time">10 min</div>
                          <div class="mi-title">Upload status</div>
                          <div class="mi-text text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                        </a>
                      </div>
                      <div class="m-item">
                        <a href="#">
                          <div class="mi-icon bg-success">
                            <i class="zmdi zmdi-money"></i>
                          </div>
                          <div class="mi-time">40 min</div>
                          <div class="mi-title">Income</div>
                          <div class="mi-text text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                        </a>
                      </div>
                      <div class="m-item">
                        <a href="#">
                          <div class="mi-icon bg-primary">
                            <i class="zmdi zmdi-alert-triangle"></i>
                          </div>
                          <div class="mi-time">3 hours</div>
                          <div class="mi-title">New task</div>
                          <div class="mi-text text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                        </a>
                      </div>
                    </div><div class="custom-scrollbar-bar" style="background: rgb(0, 0, 0); width: 4px; position: absolute; top: 0px; opacity: 0.2; display: none; border-radius: 7px; z-index: 99; right: 4px;"></div><div class="custom-scrollbar-rail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 4px;"></div></div>
                  </div>
                  <div class="dropdown-footer">
                    <a href="#">View all messages</a>
                  </div>
                </div>
              </li> --}}
              <li class="nav-table dropdown hidden-sm-down">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <span class="nav-cell p-r-10">
                    <img class="img-circle" src="img/avatars/1.jpg" alt="" width="32" height="32">
                  </span>
                  <span class="nav-cell">{{$usertype}}
                    <span class="caret"></span>
                  </span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="#">
                      <i class="zmdi zmdi-account-o m-r-10"></i> Profile</a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="zmdi zmdi-settings m-r-10"></i> Settings</a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="zmdi zmdi-help-outline m-r-10"></i> Help</a>
                  </li>
                  <li role="separator" class="divider"></li>
                  <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      <i class="zmdi zmdi-power m-r-10"></i>  {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    {{-- <a href="#">
                      <i class="zmdi zmdi-power m-r-10"></i> Logout</a> --}}
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <div class="site-main" id="app">
      <div class="site-left-sidebar">
        <div class="sidebar-backdrop"></div>
        <div class="custom-scrollable-wrapper" style="position: relative; overflow: hidden; width: 100%; height: 100%;"><div class="custom-scrollbar" style="overflow: hidden; width: 100%; height: 100%;">
          <ul class="sidebar-menu">
            <li class="menu-subtitle">
            
            <li>
              <a href="home">
                <span class="menu-icon">
                  <i class="zmdi zmdi-home"></i>
                </span>
                <span class="menu-text">Home</span>
              </a>
            </li>
           
            <li class="menu-title">Configuraciones</li>
            <li class="with-sub">
              <a href="#" aria-haspopup="true">
                <span class="menu-icon">
                  <i class="zmdi zmdi-cofig"></i>
                </span>
                <span class="menu-text">Página</span>
              </a>
              <ul class="sidebar-submenu collapse" aria-expanded="false">
                <li class="menu-subtitle">Página principal</li>
                <li><a href="#">Catálogo</a></li>
                <li><a href="#">Productos</a></li>
                <li><a href="mision">Misión / Visión</a></li>
                <li><a href="#">Usuarios</a></li>
              </ul>
            </li>
            <li class="with-sub">
              <a href="#" aria-haspopup="true">
                <span class="menu-icon">
                  <i class="zmdi zmdi-pin"></i>
                </span>
                <span class="menu-text">Almacén</span>
              </a>
              <ul class="sidebar-submenu collapse" aria-expanded="false">
                <li class="menu-subtitle">Categorias</li>
                <li><a href="maps-vector.html">Productos</a></li>
              </ul>
            </li>
            <li class="menu-title">Ventas</li>
            <li class="with-sub">
                <a href="#" aria-haspopup="true">
                <span class="menu-icon">
                    <i class="zmdi zmdi-pin"></i>
                </span>
                <span class="menu-text">Ventas</span>
            </a>
            <ul class="sidebar-submenu collapse" aria-expanded="false">
                <li class="menu-subtitle">Ingresos</li>
                <li><a href="maps-vector.html">Egresos</a></li>
                <li><a href="maps-vector.html">Reporte</a></li>
            </ul>
            </li>
            
        </div><div class="custom-scrollbar-bar" style="background: rgb(0, 0, 0); width: 4px; position: absolute; top: 0px; opacity: 0.2; display: none; border-radius: 7px; z-index: 99; right: 4px; height: 381.417px;"></div><div class="custom-scrollbar-rail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 4px;"></div></div>
      </div>
      
      <div class="site-content" >
        @yield('content')
      </div>
      <div class="site-footer">
        {{$year}} © DARO todos los derechos reservados 
      </div>
    </div>
    <script src="js/vendor.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="js/cosmos.min.js"></script>
    <script src="js/application.min.js"></script>
    <script src="js/dashboard-3.min.js"></script><div class="flotTip" style="display: none; position: absolute;"></div>
  

<!-- Mirrored from big-bang-studio.com/cosmos/dashboard-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:54:13 GMT -->
</body></html>