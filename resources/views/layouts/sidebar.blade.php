<div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main Menu</span>
                    </li>
                    <li class="{{ request()->routeIs('dashboard') ? 'submenu active' : '' }}">
                        <a href="{{ route('dashboard') }}" wire:navigate><i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                    </li>
                    <li class="submenu {{ request()->routeIs('pay.*') ? 'active' : '' }}">
                        <a href="#"><i class="fas fa-comment-dollar"></i> <span>Payment Detail</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="{{ request()->routeIs('pay.*') ? 'display: block;' : '' }}">
                            <li><a class="{{ request()->routeIs('pay.add') ? 'active' : '' }}"
                                    href="{{ route('pay.add') }}" wire:navigate class="submenu">Pay</a></li>
                            <li><a class="{{ request()->routeIs('pay.index') ? 'active' : '' }}"
                                    href="{{ route('pay.index') }}" wire:navigate class="submenu">Transactions</a></li>
                            <li><a class="{{ request()->routeIs('pay.status') ? 'active' : '' }}"
                                    href="{{ route('pay.status') }}" wire:navigate class="submenu">All Transactions</a></li>
                        </ul>
                    </li>

                    <li class="submenu {{ request()->routeIs('expense.*') ? 'active' : '' }}">
                        <a href="#"><i class="fas fa-money-bill-wave"></i>
                            <span>Expenses</span> <span class="menu-arrow"></span></a>
                        <ul style="{{ request()->routeIs('expense.*') ? 'display: block;' : '' }}">
                            <li><a class="{{ request()->routeIs('expense.add') ? 'active' : '' }}"
                                    href="{{ route('expense.add') }}" wire:navigate class="submenu">Add Expense</a>
                            </li>
                            <li><a class="{{ request()->routeIs('expense.index') ? 'active' : '' }}"
                                    href="{{ route('expense.index') }}" wire:navigate class="submenu">All Expenses</a>
                            </li>
                        </ul>
                    </li>

                    <li class="{{ request()->routeIs('basic.calculator') ? 'submenu active' : '' }}">
                        <a href="{{ route('basic.calculator') }}" wire:navigate><i class="fas fa-calculator"></i>
                            <span>Calculator</span></a>
                    </li>
                    <li class="submenu {{ request()->routeIs('user.*') ? 'active' : '' }}">
                        <a href="#">
                            <i class="fas fa-users"></i>
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
                            @hasrole('admin')
                                <li>
                                    <a href="{{ route('user.create') }}" wire:navigate
                                        class="{{ request()->routeIs('user.create') ? 'active' : '' }}">
                                        Add User
                                    </a>
                                </li>
                            @endhasrole
                        </ul>
                    </li>


                </ul>
                </li>
                </ul>
            </div>
        </div>
    </div>
</div>
