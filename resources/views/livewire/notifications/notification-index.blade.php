<div class="content container-fluid">

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">All Notifications</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" wire:navigate>Dashboard</a></li>
                    <li class="breadcrumb-item active">All Notifications</li>
                </ul>
            </div>
      
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>List of Notifications</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="media">
                                                <span class="avatar avatar-sm mr-4">
                                                    <img class="avatar-img rounded-circle" alt="User Image"
                                                        src="{{ $payment->user->profile ? asset('storage/' . $payment->user->profile) : asset('assets/img/profiles/avatar-03.jpg') }}">
                                                </span>
                                                <div class="media-body">
                                                    <p class="noti-details"><span
                                                            class="noti-title">{{ $payment->user->name }} has
                                                        paid <span class="noti-title">Rs. {{ $payment->amount }}</span></span>
                                                    </p>
                                                    <p class="noti-details"><span
                                                            class="notification-time">{{ $payment->pay_date }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
