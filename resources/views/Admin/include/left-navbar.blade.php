<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="index.html" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="menu-title">Users</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('addUser') }}">Add New</a></li>
                        <li><a href="{{ url('viewAdmin') }}">Admins</a></li>
                        <li><a href="{{ url('viewProfessional') }}">Professionals</a></li>
                        <li><a href="{{ url('viewClient') }}">Clients</a></li>
                        <li><a href="{{ url('viewPendingAccounts') }}">Pending Accounts</a></li>
                    </ul>
                </li>

                <li class="menu-title">Local Worker</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-run"></i>
                        <span>Local Worker</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('addWorker') }}">Add New</a></li>
                        <li><a href="{{ url('viewWorker') }}">View All</a></li>
                    </ul>
                </li>

                <li class="menu-title">Quries</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-question-mark"></i>
                        <span>Quiries</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Unanswered</a></li>
                        <li><a href="#">Answered</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>