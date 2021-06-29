@extends('console.layouts.non-auth')

@section('content')

<div class="account-pages my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-6 p-5">

                                <div class="mx-auto mb-5">
                                    <a href="{{ route('login.index') }}">
                                        <img src="{{ URL::asset('assets/console/images/logo.png') }}" alt="" height="24" />
                                        <h3 class="d-inline align-middle ml-1 text-logo">Gedra Tecnologia</h3>
                                    </a>
                                </div>

                                <h6 class="h5 mb-0 mt-4">Seja Bem Vindo!</h6>
                                <p class="text-muted mt-1 mb-4">Digite seu endereço de e-mail e senha para acessar o painel de administração.</p>

                                @if(session('error'))<div class="alert alert-danger">
                                    {{ session('error') }}</div><br>
                                @endif
                                
                                @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div><br>
                                @endif

                                <form action="{{ route('login.auth') }}" method="post" class="authentication-form">
                                    @csrf

                                    <div class="form-group">
                                        <label class="form-control-label">E-mail</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="mail"></i>
                                                </span>
                                            </div>
                                            <input type="email" class="form-control @if($errors->has('email')) is-invalid @endif" id="email" placeholder="hello@seventhcode.com" name="email" value="{{ old('email') }}" />

                                            @if($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <label class="form-control-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="lock"></i>
                                                </span>
                                            </div>
                                            <input type="password" class="form-control @if($errors->has('password')) is-invalid @endif" id="password" placeholder="Coloque sua senha"  name="password" />

                                            @if($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                    </div>
                                </form>

                            </div>
                            <div class="col-lg-6 d-none d-md-inline-block">
                                <div class="auth-page-sidebar">
                                    <div class="overlay"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

@endsection