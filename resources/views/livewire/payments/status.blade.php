<div class="content container-fluid">

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">All Transactions</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" wire:navigate>Dashboard</a></li>
                    <li class="breadcrumb-item active">All Transactions</li>
                </ul>
            </div>
            <div class="col-auto text-right float-right ml-auto">
                <a wire:click = "downloadAll" href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a>
                {{-- <a href="add-fees-collection.html" class="btn btn-primary"><i class="fas fa-plus"></i></a> --}}
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
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle"
                                                        src="{{ $transaction->slip ? asset('storage/' . $transaction->slip) : asset('assets/img/profiles/avatar-01.jpg') }}"
                                                        alt="User Image"></a>
                                                <a>{{ $transaction->user->name }}</a>
                                            </h2>
                                        </td>
                                        <td>{{ $transaction->pay_date }}</td>
                                        <td>{{ $transaction->amount }}</td>
                                        <td class="text-right">
                                            {{-- <span class="badge badge-success">Paid</span> --}}
                                            <div class="form-group">
                                                <select class="form-control"
                                                    wire:change="updateStatus({{ $transaction->id }}, $event.target.value)">
                                                    <option value="pending"
                                                        {{ $transaction->status == 'pending' ? 'selected' : '' }}>
                                                        Pending</option>
                                                    <option value="paid"
                                                        {{ $transaction->status == 'paid' ? 'selected' : '' }}>Paid
                                                    </option>
                                                </select>
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
