<div class="content container-fluid">

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">All Investments</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" wire:navigate>Dashboard</a></li>
                    <li class="breadcrumb-item active">Investments</li>
                </ul>
            </div>
            <div class="col-auto text-right float-right ml-auto">
                <a href="{{ route('investment.add') }}" wire:navigate class="btn btn-outline-primary mr-2"><i
                        class="fas fa-plus"></i> Add Investment</a>

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
                                    <th>Slip</th>
                                    <th>Invest Amount</th>
                                    <th>Inevst Date</th>
                                    <th class="text-center">Remarks</th>
                                    {{-- <th class="text-right">Status</th> --}}
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($investments as $invest)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle"
                                                        src="{{ $invest->invest_proof ? asset('storage/' . $invest->invest_proof) : asset('assets/img/profiles/avatar-01.jpg') }}"
                                                        alt="User Image"></a>
                                            </h2>
                                        </td>
                                        <td>{{ $invest->invest_amount }}
                                        </td>
                                        <td>{{ $invest->invest_date }}</td>
                                        <td>
                                            {{ $invest->invest_remarks }}
                                        </td>


                                        <td class="text-center">
                                            <div class="actions">
                                                <a href="{{ route('investment.edit', $invest->id) }}" wire:navigate
                                                    class="btn btn-sm bg-success-light mr-2">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                    <button wire:click="$set('confirmingDelete', {{ $invest->id }})"
                                                        type="submit" class="btn btn-sm bg-danger-light">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
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

    @if ($confirmingDelete)
        <!-- Bootstrap Delete Confirmation Modal -->
        <div class="modal fade show" style="display: block; background-color: rgba(0,0,0,0.5);" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Are you sure?</h5>
                    </div>
                    <div class="modal-body">
                        <p>This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="$set('confirmingDelete', null)" type="button" class="btn btn-secondary">
                            Cancel
                        </button>
                        <button wire:click="confirmDelete" type="button" class="btn btn-danger">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
