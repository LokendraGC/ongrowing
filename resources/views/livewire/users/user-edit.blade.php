<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Edit User</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="User.html">User</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="editUser" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>User Information</span></h5>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input wire:model="name" type="text" class="form-control">
                                    @error('name')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input wire:model="email" type="email" class="form-control">
                                    @error('email')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Temporary Address</label>
                                    <input wire:model="temp_address" type="text" class="form-control">
                                    @error('temp_address')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Permanent Address</label>
                                    <input wire:model="permanent_address" type="text" class="form-control">
                                </div>
                            </div>
                            {{-- <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control">
                                        <option>Select Role</option>
                                        <option>Admin</option>
                                        <option>User</option>
                                        <option>Others</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <div>
                                        <input wire:model="dob" type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Joining Date</label>
                                    <div>
                                        <input wire:model="join_date" type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input wire:model="phone" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>User Profile</label>
                                    <input wire:model.live="profile" type="file" class="form-control">
                                    @if (is_string($profile))
                                        <div class="position-relative d-inline-block">
                                            <img class="rounded" src="{{ asset('storage/' . $profile) }}" width="50"
                                                alt="User profile">
                                            <button type="button" wire:click.prevent="removeProfileImage"
                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                                style="border: none; cursor: pointer;">
                                                ×
                                            </button>
                                        </div>
                                    @endif



                                    @error('profile')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input wire:model="old_password" type="password" class="form-control">
                                    @error('password')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input wire:model="new_password" type="password" class="form-control">
                                    @error('password_confirmation')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <span wire:loading.remove wire:target="editUser">Update</span>
                                    <span wire:loading wire:target="editUser">Loading..</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
