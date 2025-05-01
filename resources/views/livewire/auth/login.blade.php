<div>
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="assets/img/logo-white.png" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to our dashboard</p>
                            <form wire:submit = "login">
                                @if ($errorMessage)
                                    <span class="text-sm text-danger">{{ $errorMessage }}</span>
                                @endif
                                <div class="form-group">
                                    <input wire:model = "email" class="form-control" type="email" placeholder="Email">
                                    @error('email')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input wire:model = "password" class="form-control" type="password"
                                        placeholder="Password">
                                    @error('password')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary  btn-block" type="submit">
                                        <span wire:loading.remove>Login</span>
                                        <div wire:loading>
                                            <span wire:loading>Loading...</span>
                                        </div>
                                    </button>
                                </div>
                            </form>
                            <div class="text-center forgotpass"><a href="#">Forgot Password?</a>
                            </div>
                            {{-- <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">or</span>
                            </div>
                            <div class="social-login">
                                <span>Login with</span>
                                <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a><a
                                    href="#" class="google"><i class="fab fa-google"></i></a>
                            </div> --}}
                            <div class="text-center dont-have">Don’t have an account? <a
                                    href="{{ '/' }}">Register</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
