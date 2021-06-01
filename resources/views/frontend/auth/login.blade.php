@extends('frontend.layouts.auth')

@section('content')
    <div class="col-lg-12">
        <div class="white_box mb_30">
            <div class="row justify-content-center">

                <div class="col-lg-6">
                    <!-- sign_in  -->
                    <div class="modal-content cs_modal">
                        <div class="modal-header justify-content-center theme_bg_1">
                            <h5 class="modal-title text_white">Log in</h5>
                        </div>
                        <div class="modal-body">
                            <x-forms.post :action="route('frontend.auth.login')">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" maxlength="255" required autofocus autocomplete="email" />
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="current-password" />
                                </div>
                                <button type="submit" class="btn_1 full_width text-center">Log in</button>
                                <p>Need an account? <a data-toggle="modal" data-target="#sing_up" data-dismiss="modal"  href="#"> Sign Up</a></p>
                                <div class="text-center">
                                    <a href="{{ route('frontend.auth.password.request') }}" class="pass_forget_btn">Forgot Password?</a>
                                </div>
                            </x-forms.post>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
