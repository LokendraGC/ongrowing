<div class="content container-fluid">

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Fees Collections</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Fees Collections</li>
                </ul>
            </div>
            <div class="col-auto text-right float-right ml-auto">
                <a href="{{ route('user.create') }}" wire:navigate class="btn btn-outline-primary mr-2"><i
                        class="fas fa-create"></i> Create</a>
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
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle"
                                                        src="{{ $user->profile ? asset('storage/' . $user->profile) : asset('assets/img/profiles/avatar-03.jpg') }}"
                                                        alt="User Image"></a>
                                                <a>{{ $user->name }}</a>
                                            </h2>
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->getRoleNames()->first() }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('user.edit', $user->id) }}" wire:navigate
                                                class="badge badge-success border-0 px-4 py-2">Edit</a>
                                            <button wire:click="$set('confirmingDelete', {{ $user->id }})"
                                                type="submit"
                                                class="badge badge-success border-0 px-3 py-2">Delete</button>
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
