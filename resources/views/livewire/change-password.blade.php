 <div class="content container-fluid">
     <div class="page-header">
         <div class="row">
             <div class="col-sm-12">
                 <h3 class="page-title">Teachers Details</h3>
                 <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="teachers.html">Teachers</a></li>
                     <li class="breadcrumb-item active">Teachers Details</li>
                 </ul>
             </div>
         </div>
     </div>
     <div class="card">
         <div class="card-body">

             <div class="row mt-2">
                 <div class="col-md-12">
                     <div class="skill-info">
                         <h4>Settings</h4>
                         <form wire:submit="changePassword">
                             <div class="row mt-3">
                                 <div class="col-12 col-sm-6">
                                     <div class="form-group">
                                         <label>Username</label>
                                         <input wire:model="username" type="text" class="form-control">
                                         @error('username')
                                             <span class="text-sm text-danger">{{ $message }}</span>
                                         @enderror
                                     </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                     <div class="form-group">
                                         <label>Current Password</label>
                                         <input wire:model="current_password" type="password" class="form-control">
                                         @error('current_password')
                                             <span class="text-sm text-danger">{{ $message }}</span>
                                         @enderror
                                     </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                     <div class="form-group">
                                         <label>New Password</label>
                                         <input wire:model="new_password" type="password" class="form-control">
                                         @error('new_password')
                                             <span class="text-sm text-danger">{{ $message }}</span>
                                         @enderror
                                     </div>
                                 </div>
                                 <div class="col-12">
                                     <button type="submit" class="btn btn-primary">
                                         <span wire:loading.remove>Submit</span>
                                         <span wire:loading>Loading..</span>
                                     </button>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>

         </div>
     </div>
 </div>
