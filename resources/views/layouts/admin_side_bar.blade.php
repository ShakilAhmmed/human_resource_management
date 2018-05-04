<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{asset('admin_asset/images/logo2.png')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{asset('admin_asset/images/logo2.png')}}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="/admin"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">UI elements</h3><!-- /.menu-title -->

                    <li>
                        <a href="/department"> <i class="menu-icon ti-notepad"></i>DEPARTMENT </a>
                    </li>

                    <li>
                        <a href="/designation"> <i class="menu-icon ti-panel"></i>DESIGNATION </a>
                    </li>

                   <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>EMPLOYEE</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="tables-basic.html">ADD EMPLOYEE</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">EMPLOYEE LIST</a></li>
                        </ul>
                    </li>


                   <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>RECRUITMENT</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="tables-basic.html">VACANCIES</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">APPLICATIONS</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>ATTENDACNE</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="tables-basic.html">DAILY ATTENDANCE</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">ATTENDANCE REPORT</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>LEAVE</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="/leave_type">LEAVE TYPE</a></li>
                            <li><i class="fa fa-table"></i><a href="/leave">LEAVE</a></li>
                        </ul>
                    </li>

                      <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>PAYROLL</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="tables-basic.html">CREATE PAYSLIP</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">PAYSLIP REPORT</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>HOLIDAY</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="tables-basic.html">HOLIDAY LIST</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">NEW HOLIDAY</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>TASK</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="tables-basic.html">TASK LIST</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">NEW TASK</a></li>
                        </ul>
                    </li>


                     <li>
                        <a href="widgets.html"> <i class="menu-icon ti-email"></i>AWARD </a>
                    </li>

                     <li>
                        <a href="/expense"> <i class="menu-icon ti-email"></i>EXPENSE </a>
                    </li>

                     <li>
                        <a href="widgets.html"> <i class="menu-icon ti-email"></i>NOTICE BOARD </a>
                    </li>

                     <li>
                        <a href="widgets.html"> <i class="menu-icon ti-email"></i>MESSAGE </a>
                    </li>

                     <li>
                        <a href="widgets.html"> <i class="menu-icon ti-email"></i>SETTINGS </a>
                    </li>

                     <li>
                        <a href="widgets.html"> <i class="menu-icon ti-email"></i>ACCOUNT </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>