@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 register-style">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('customer.register') }}">
                        @csrf

                        <div class="row mb-3">
                            {{ Form::label('name','Name :',['class'=>'col-md-4 col-form-label text-md-right'])}}

                            <div class="col-md-6">
                                {{ Form::text('name','',['class'=>'form-control '.($errors->has('name') ?'is-invalid':''),'placeholder'=>'Enter Your Name Here....','required'=>true])}}

                                @error('name')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            {{ Form::label('email','Email :',['class'=>'col-md-4 col-form-label text-md-right'])}}

                            <div class="col-md-6">
                                {{ Form::email('email','',['class'=>'form-control '.($errors->has('email') ?'is-invalid':''),'placeholder'=>'Enter Your Email Here....','required'=>true])}}

                                @error('email')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            {{ Form::label('password','Password :',['class'=>'col-md-4 col-form-label text-md-right'])}}

                            <div class="col-md-6">
                                {{ Form::password('password',['class'=>'form-control '.($errors->has('password') ?'is-invalid':''),'placeholder'=>'Enter Your Password Here....','required'=>true])}}

                                @error('password')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            {{ Form::label('password_confirmation','Re-Type Password :',['class'=>'col-md-4 col-form-label text-md-right'])}}

                            <div class="col-md-6">
                                {{ Form::password('password_confirmation',['class'=>'form-control '.($errors->has('password_confirmation') ?'is-invalid':''),'placeholder'=>'Enter Your Password Again Here....','required'=>true])}}

                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        

                        

                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
