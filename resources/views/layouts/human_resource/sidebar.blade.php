<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <a href="/" class="btn btn-success">
                <i class="ace-icon glyphicon glyphicon-th"></i>
            </a>

            <a href="/profile" class="btn btn-info">
                <i class="ace-icon fa fa-user"></i>
            </a>

            <a href="/setting" class="btn btn-warning">
                <i class="ace-icon fa fa-cogs"></i>
            </a>

            <a href="/logout" class="btn btn-danger">
                <i class="ace-icon fa fa-power-off"></i>
            </a>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li class="{{ Request::is('human-resource') ? 'active' : '' }}">
            <a href="/human-resource">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Inicio </span>
            </a>
        </li>
        
        <li class="{{ Request::is('human-resource/setting/*') ? 'active open' : '' }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon glyphicon glyphicon-log-out"></i>
                <span class="menu-text"> Configuración </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="{{ Request::is('human-resource/setting/employee') ? 'active' : '' }}">
                    <a href="/human-resource/setting/employee">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Trabajadores
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="{{ Request::is('human-resource/setting/position') ? 'active' : '' }}">
                    <a href="/human-resource/setting/position">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Cargo
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="{{ Request::is('human-resource/setting/parameter') ? 'active' : '' }}">
                    <a href="/human-resource/setting/parameter">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Parametros
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>