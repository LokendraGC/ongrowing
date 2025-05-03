<div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main Menu</span>
                    </li>
                    <li class="{{ request()->routeIs('dashboard') ? 'submenu active' : '' }}">
                        <a href="{{ route('dashboard') }}" wire:navigate><i class="fas fa-holly-berry"></i> <span>Dashboard</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-comment-dollar"></i> <span>Payment Detail</span> <span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="index.html" class="">Pay</a></li>
                            <li><a href="student-dashboard.html">Transactions</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="fees.html"><i class="fas fa-comment-dollar"></i> <span>Calculator</span></a>
                    </li>
                    <li class="submenu {{ request()->routeIs('user.*') ? 'active' : '' }}">
                        <a href="#">
                            <i class="fas fa-comment-dollar"></i>
                            <span>Users</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="{{ request()->routeIs('user.*') ? 'display: block;' : '' }}">
                            <li>
                                <a href="{{ route('user.index') }}" wire:navigate
                                    class="{{ request()->routeIs('user.index') ? 'active' : '' }}">
                                    All Users
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.create') }}" wire:navigate
                                    class="{{ request()->routeIs('user.create') ? 'active' : '' }}">
                                    Add User
                                </a>
                            </li>
                        </ul>
                    </li>


                </ul>
                </li>
                </ul>
            </div>
        </div>
    </div>
</div>
