<div>
    <div class="header">
        <div class="header-left">
            <a href="{{ route('dashboard') }}" wire:navigate class="logo">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
            </a>
            <a href="{{ route('dashboard') }}" wire:navigate class="logo logo-small">
                <img src="{{ asset('assets/img/logo-small.png') }}" alt="Logo" width="30" height="30">
            </a>
        </div>
        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fas fa-align-left"></i>
        </a>
        <div class="top-nav-search">
            <form>
                <input type="text" class="form-control" placeholder="Search here">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
        </a>
        <ul class="nav user-menu">

            <livewire:notifications.all-notifications />


            <li class="nav-item dropdown has-arrow" wire:ignore>
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <span class="user-img"><img class="rounded-circle"
                            src="{{ auth()->user()->profile ? asset('storage/' . auth()->user()->profile) : asset('assets/img/profiles/avatar-03.jpg') }}"
                            width="31" alt="Ryan Taylor"></span>
                </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="{{ auth()->user()->profile ? asset('storage/' . auth()->user()->profile) : asset('assets/img/profiles/avatar-03.jpg') }}"
                                alt="User Image" class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                            <h6>{{ auth()->user()->name }}</h6>
                            <p class="text-muted mb-0">{{ auth()->user()->getRoleNames()->first() }}</p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="{{ route('profile', auth()->user()->id) }}" wire:navigate>My
                        Profile</a>
                    <a class="dropdown-item" href="{{ route('change.password', auth()->user()->id) }}"
                        wire:navigate>Change Password</a>
                    <livewire:auth.logout />
                </div>
            </li>
        </ul>
    </div>
</div>
