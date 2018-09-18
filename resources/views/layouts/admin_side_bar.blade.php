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
                   
                    <li class="">
                        <a href="/admin"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">UI elements</h3><!-- /.menu-title -->
                      @permission('ROLE MANAGE')
                  
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Rbac</a>
                        <ul class="sub-menu children dropdown-menu">
                            @permission('CREATE ADMIN')
                              <li class="add_css"><i class="fa fa-table"></i><a  href="/admin">Admin</a></li>
                            @endpermission
                            @permission('CREATE ROLE')
                              <li class="add_css"><i class="fa fa-table"></i><a  href="/create_role">Create Role</a></li>
                            @endpermission
                            @permission('CREATE PERISSION')
                            <li class="add_css"><i class="fa fa-table"></i><a  href="/create_permission">Create Permission</a></li>
                            @endpermission
                            @permission('PERMISSION ROLE')
                                <li class="add_css"><i class="fa fa-table"></i><a  href="/role_permission">Role Permission</a></li>
                             @endpermission
                             @permission('USER ACCESS')   
                                <li class="add_css"><i class="fa fa-table"></i><a  href="/user_access"> User Access</a></li>
                              @endpermission  
                        </ul>
                    </li>
                    @endpermission
                    @permission('DEPARTMENT')
                    <li class="">
                        <a href="/department"> <i class="menu-icon ti-notepad"></i>DEPARTMENT </a>
                    </li>
                    @endpermission 
                    @permission('DESIGNATION')
                    <li>
                        <a href="/designation"> <i class="menu-icon ti-panel"></i>DESIGNATION </a>
                    </li>
                     @endpermission
                     @permission('EMPLOYEE')
                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>EMPLOYEE</a>
                        <ul class="sub-menu children dropdown-menu">
                             @permission('NEW EMPLOYEE')
                            <li class="add_css"><i class="fa fa-table"></i><a class="url_get" href="/employee">ADD EMPLOYEE</a></li>
                            @endpermission
                             @permission('EMPLOYEE LIST')
                            <li class="add_css"><i class="fa fa-table"></i><a  class="url_get" href="/employee/create">EMPLOYEE LIST</a></li>
                            @endpermission
                        </ul>
                     </li>
                     @endpermission

                    @permission('RECRUITMENT')
                   <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>RECRUITMENT</a>
                        <ul class="sub-menu children dropdown-menu">
                            @permission('VACANCIES')
                            <li><i class="fa fa-table"></i><a href="/vacancies">VACANCIES</a></li>
                            @endpermission
                             @permission('APPLICATIONS')
                            <li><i class="fa fa-table"></i><a href="/applications">APPLICATIONS</a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                   @permission('ATTENDACNE')
                    <li class="menu-item-has-children dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>ATTENDACNE</a>
                        <ul class="sub-menu children dropdown-menu">
                            @permission('NEW ATTENDANCE')
                            <li><i class="fa fa-table"></i><a href="/attendance">DAILY ATTENDANCE</a></li>
                             @endpermission
                            @permission('ATTENDANCE REPORT')
                            <li><i class="fa fa-table"></i><a href="/attendance/create">
                            ATTENDANCE REPORT</a></li>
                             @endpermission
                        </ul>
                    </li>
                    @endpermission
                    @permission('LEAVE')
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>LEAVE</a>
                        <ul class="sub-menu children dropdown-menu">
                            @permission('LEAVE TYPE')
                            <li><i class="fa fa-table"></i><a href="/leave_type">LEAVE TYPE</a></li>
                            @endpermission
                            @permission('NEW LEAVE')
                            <li><i class="fa fa-table"></i><a href="/leave">LEAVE</a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission 
                    @permission('PAYSLIP')
                      <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>PAYROLL</a>
                        <ul class="sub-menu children dropdown-menu">
                             @permission('CREATE PAYSLIP')
                            <li><i class="fa fa-table"></i><a href="/payslip">CREATE PAYSLIP</a></li>
                            @endpermission
                             @permission('PAYSLIP REPORT')
                            <li><i class="fa fa-table"></i><a href="/payslip/create">PAYSLIP REPORT</a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                    @permission('HOLIDAY')
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>HOLIDAY</a>
                        <ul class="sub-menu children dropdown-menu">
                             @permission('HOLIDAY LIST')
                            <li><i class="fa fa-table"></i><a href="/holiday/create">HOLIDAY LIST</a></li>
                             @endpermission
                              @permission('NEW HOLIDAY')
                            <li><i class="fa fa-table"></i><a href="/holiday">NEW HOLIDAY</a></li>
                             @endpermission
                        </ul>
                    </li>
                    @endpermission
                    @permission('TASK')
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>TASK</a>
                        <ul class="sub-menu children dropdown-menu">
                             @permission('TASK LIST')
                            <li><i class="fa fa-table"></i><a href="/task/create">TASK LIST</a></li>
                             @endpermission
                              @permission('NEW TASK')
                            <li><i class="fa fa-table"></i><a href="/task">NEW TASK</a></li>
                             @endpermission
                        </ul>
                    </li>
                   @endpermission
                      @permission('AWARD')
                     <li>
                        <a href="/award"> <i class="menu-icon ti-email"></i>AWARD </a>
                    </li>
                     @endpermission
                    @permission('EXPENSE')
                     <li>
                        <a href="/expense"> <i class="menu-icon ti-email"></i>EXPENSE </a>
                    </li>
                     @endpermission
                     @permission('NOTICE BOARD')
                     <li>
                        <a href="/notice"> <i class="menu-icon ti-email"></i>NOTICE BOARD </a>
                    </li>
                     @endpermission
                   @permission('MESSAGE')
                     <li>
                        <a href="/message"> <i class="menu-icon ti-email"></i>MESSAGE </a>
                    </li>
                     @endpermission
                  @permission('SETTINGS')
                     <li>
                        <a href="/settings"> <i class="menu-icon ti-email"></i>SETTINGS </a>
                    </li>
                     @endpermission

                     <li>
                        <a href="widgets.html"> <i class="menu-icon ti-email"></i>ACCOUNT </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>