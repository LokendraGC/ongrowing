<div class="content container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Profile</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="profile-header">
                <div class="row align-items-center">
                    <div class="col-auto profile-image">
                        <a href="#">
                            <img class="rounded-circle" alt="User Image"
                                src="{{ $user->profile ? asset('storage/' . $user->profile) : asset('assets/img/profiles/avatar-02.jpg') }}">
                        </a>
                    </div>
                    <div class="col ml-md-n2 profile-user-info">
                        <h4 class="user-name mb-0">{{ $user->name }}</h4>
                        <h6 class="text-muted">{{ auth()->user()->getRoleNames()->first() }}</h6>
                        <div class="user-Location"><i class="fas fa-map-marker-alt"></i> {{ $user->permanent_address }}
                        </div>
                        {{-- <div class="about-text">Lorem ipsum dolor sit amet.</div> --}}
                    </div>
                    <div class="col-auto profile-btn">
                        <a href="{{ route('edit.profile', $user->id) }}" wire:navigate class="btn btn-primary">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
                    </li> --}}
                </ul>
            </div>
            <div class="tab-content profile-tab-cont">
                <div class="tab-pane fade show active" id="per_details_tab">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>Personal Details</span>
                                        {{-- <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="far fa-edit mr-1"></i>Edit</a> --}}
                                    </h5>

                                    @if ($user->name)
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                            <p class="col-sm-9">{{ $user->name }}</p>
                                        </div>
                                    @endif

                                    @if ($user->dob)
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
                                            <p class="col-sm-9">{{ $user->dob }}</p>
                                        </div>
                                    @endif

                                    @if ($user->join_date)
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Join Date</p>
                                            <p class="col-sm-9">{{ $user->join_date }}</p>
                                        </div>
                                    @endif

                                    @if ($user->email)
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                            <p class="col-sm-9">
                                                <a href="mailto:{{ $user->email }}"
                                                    class="__cf_email__">{{ $user->email }}</a>
                                            </p>
                                        </div>
                                    @endif

                                    @if ($user->phone)
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                            <p class="col-sm-9">{{ $user->phone }}</p>
                                        </div>
                                    @endif

                                    @if ($user->permanent_address)
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Permanent Address
                                            </p>
                                            <p class="col-sm-9 mb-0">{{ $user->permanent_address }}<br></p>
                                        </div>
                                    @endif

                                    @if ($user->temp_address)
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Temporary Address
                                            </p>
                                            <p class="col-sm-9 mb-0">{{ $user->temp_address }}<br></p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                {{-- <div id="password_tab" class="tab-pane fade">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Change Password</h5>
                            <div class="row">
                                <div class="col-md-10 col-lg-6">
                                    <form>
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <button class="btn btn-primary" type="submit">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
