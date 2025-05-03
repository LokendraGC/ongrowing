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
                    <a href="{{ route('user.create') }}" wire:navigate class="btn btn-outline-primary mr-2"><i class="fas fa-create"></i> Create</a>
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
                                    <tr>
                                        <td>PRE2209</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle"
                                                        src="assets/img/profiles/avatar-01.jpg" alt="User Image"></a>
                                                <a>Aaliyah</a>
                                            </h2>
                                        </td>
                                        <td>Mess Fees</td>
                                        <td>17 Aug 2020</td>
                                        <td class="text-center">
                                            <a href="#" wire:navigate class="badge badge-success border-0 px-4 py-2">Edit</a>
                                            <a class="badge badge-success border-0 px-3 py-2">Delete</a  >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>PRE2213</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle"
                                                        src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
                                                <a>Malynne</a>
                                            </h2>
                                        </td>
                                        <td>Class Test</td>
                                        <td>05 Aug 2020</td>
                                        <td class="text-center">
                                            <button class="badge badge-success text-white border-0 px-4 py-2">Edit</button>
                                            <button class="badge badge-success border-0 px-3 py-2">Delete</button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
