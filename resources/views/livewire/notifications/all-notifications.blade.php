<li class="nav-item dropdown noti-dropdown">
    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
        <i class="far fa-bell"></i> <span class="badge badge-pill">{{ $count }}</span>
    </a>
    <div class="dropdown-menu notifications">
        <div class="topnav-dropdown-header">
            <span class="notification-title">Notifications</span>
            {{-- <a href="javascript:void(0)" wire:click = "clearAll" class="clear-noti"> Clear All </a> --}}
        </div>
        <div class="noti-content">
            @if (!$payments->isEmpty())
                <ul class="notification-list">
                    @foreach ($payments as $payment)
                        <li class="notification-message">
                            <a href="#">
                                <div class="media">
                                    <span class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle" alt="User Image"
                                            src="{{ $payment->user->profile ? asset('storage/' . $payment->user->profile) : asset('assets/img/profiles/avatar-03.jpg') }}">
                                    </span>
                                    <div class="media-body">
                                        <p class="noti-details"><span
                                                class="noti-title">{{ $payment->user->name }}</span> has
                                            paid <span class="noti-title">Rs. {{ $payment->amount }}</span></p>
                                        <p class="noti-time"><span
                                                class="notification-time">{{ $payment->pay_date }}</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif


        </div>

        @if ($count != 0)
            <div class="topnav-dropdown-footer">
                <a href="{{ route('notification.index') }}" wire:navigate>View all Notifications</a>
            </div>
        @endif
    </div>
</li>
