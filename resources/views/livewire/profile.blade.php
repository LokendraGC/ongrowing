 <div class="content container-fluid">
     <div class="page-header">
         <div class="row">
             <div class="col-sm-12">
                 <h3 class="page-title">User Details</h3>
                 <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{ route('dashboard')}}" wire:navigate>Dashboard</a></li>
                     <li class="breadcrumb-item active">User Details</li>
                 </ul>
             </div>
         </div>
     </div>
     <div class="card">
         <div class="card-body">
             <div class="row">
                 <div class="col-md-12">
                     <div class="about-info">
                         <h4>About Me</h4>
                         <div class="media mt-3">
                             <img src="{{ $user->profile ? asset('storage/' . $user->profile) : asset('assets/img/profiles/avatar-02.jpg') }}"
                                 class="mr-3" alt="...">
                             <div class="media-body">
                                 <ul>
                                     <li>
                                         <span class="title-span">Full Name : </span>
                                         <span class="info-span">{{ $user->name }}</span>
                                     </li>
                                     <li>
                                         <span class="title-span">Role : </span>
                                         <span class="info-span">{{ auth()->user()->getRoleNames()->first() }}</span>
                                     </li>

                                     @if ($user->dob)
                                         <li>
                                             <span class="title-span">DOB : </span>
                                             <span class="info-span">
                                                 {{ $user->dob }}
                                             </span>
                                         </li>
                                     @endif


                                     @if ($user->email)
                                         <li>
                                             <span class="title-span">Email : </span>
                                             <span class="info-span"><a class="__cf_email__"
                                                     data-cfemail="a3c7c2cad0dae3c4cec2cacf8dc0ccce">{{ $user->email }}</a></span>
                                         </li>
                                     @endif

                                     @if ($user->phone)
                                         <li>
                                             <span class="title-span">Phone : </span>
                                             <span class="info-span">{{ $user->phone }}</span>
                                         </li>
                                     @endif

                                     @if ($user->permanent_address)
                                         <li>
                                             <span class="title-span">Permanent Address : </span>
                                             <span class="info-span">{{ $user->permanent_address }}</span>
                                         </li>
                                     @endif
                                     @if ($user->temp_address)
                                         <li>
                                             <span class="title-span">Permanent Address : </span>
                                             <span class="info-span">{{ $user->temp_address }}</span>
                                         </li>
                                     @endif

                                     @if ($user->join_date)
                                         <li>
                                             <span class="title-span">Permanent Address : </span>
                                             <span class="info-span">{{ $user->join_date }}</span>
                                         </li>
                                     @endif

                                 </ul>
                             </div>
                         </div>

                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
