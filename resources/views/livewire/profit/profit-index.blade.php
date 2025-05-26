<div class="content container-fluid">

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">All Profit</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" wire:navigate>Dashboard</a></li>
                    <li class="breadcrumb-item active">Profit</li>
                </ul>
            </div>
            <div class="col-auto text-right float-right ml-auto">
                <a href="{{ route('profit.add') }}" wire:navigate class="btn btn-outline-primary mr-2"><i
                        class="fas fa-plus"></i> Add Profit</a>

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
                                    <th>Profit Amount</th>
                                    <th>Date</th>
                                    <th class="text-center">Remarks</th>
                                    {{-- <th class="text-right">Status</th> --}}
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($profits as $profit)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle"
                                                        src="{{ $profit->profit_proof ? asset('storage/' . $profit->profit_proof) : asset('assets/img/profiles/avatar-01.jpg') }}"
                                                        alt="User Image"></a>
                                            </h2>
                                        </td>
                                        <td>{{ $profit->profit_amount }}
                                        </td>
                                        <td>{{ $profit->profit_date }}</td>
                                        <td>
                                            {{ $profit->profit_remarks }}
                                        </td>


                                        <td class="text-center">
                                            <div class="actions">
                                                <a href="{{ route('profit.edit', $profit->id) }}" wire:navigate
                                                    class="btn btn-sm bg-success-light mr-2">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                    <button wire:click="$set('confirmingDelete', {{ $profit->id }})"
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
