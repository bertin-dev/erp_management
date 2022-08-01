<nav class="side-navbar">

      <div class="side-navbar-wrapper">

        <!-- Sidebar Header    -->

        <div class="sidenav-header d-flex align-items-center justify-content-center">

            <!-- User Info-->

            <div class="sidenav-header-inner text-center"><a href="pages-profile.html"><img src="{{asset('img/logo.png')}} " alt="person" class="img-fluid rounded-circle"></a>

                <h2 class="h5">{{Session::get('name')}}</h2><span>{{Session::get('role')}}</span>

            </div>

            <!-- Small Brand information, appears on minimized sidebar-->

            <div class="sidenav-header-logo"><a href="index.php" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>

        </div>

        

        @if(Session::get('role') != "Agent")

        <!-- Sidebar Navigation Menus-->

        <div class="main-menu">

            <h5 class="sidenav-heading">Main</h5>

            <ul id="side-main-menu" class="side-menu list-unstyled">

                 @if(Session::get('role') != "Comptable")

                <li><a href="{{route('dashboard')}}"> <i class="icon-home"></i>Accueil</a></li>

                <li><a href="{{route('smopaye')}}"> <i class="icon-user"></i>Personnel Smopaye</a></li>

                @endif

                <li><a href="#chartsDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-user"></i>Utilisateurs e-zpass </a>

                    <ul id="chartsDropdown" class="collapse list-unstyled ">

                        <li><a href="{{route('porteur')}}">Les porteurs simples</a></li>

                        <li><a href="{{route('entreprise')}}">Les entreprises</a></li>

                    </ul>

                </li>

                @if(Session::get('role') != "Comptable")

                <li><a href="{{route('CardNoUse')}}"> <i class="fa fa-credit-card"></i>Les Cartes ez-Pass </a></li>

                @endif

                <li><a href="{{route('transactionAll1')}}"> <i class="fa fa-exchange"></i>Historique des transactions </a></li>
                <li><a href="{{route('recap')}}"><i class="fa fa-history"></i> Recapitulatif des recharges</a></li>

            </ul>

        </div>

        @if(Session::get('role') != "Comptable")

        <div class="admin-menu">

          <h5 class="sidenav-heading">Paramétres</h5>

          <ul id="side-admin-menu" class="side-menu list-unstyled"> 

            <li> <a href="{{route('getDevice')}}"> <i class="icon-picture"> </i>Appariels</a></li>

            <li> <a href="/public/categorie"><i class="fa fa-list"></i> Catégories</a></li>
            <li> <a href="{{route('getPermission')}}"> <i class="fa fa-list"> </i>Permissions</a></li>
            <li> <a href="{{route('getRole')}}"> <i class="fa fa-list"> </i>Rôles</a></li>

            <li> <a href="/public/tarif"> <i class="icon-picture"> </i>Tarifs</a></li>
            <li> <a href="{{route('getCampagne')}}"> <i class="icon-picture"> </i>Campagnes</a></li>

          </ul>

        </div>

        @endif

        @endif

      </div>

    </nav>