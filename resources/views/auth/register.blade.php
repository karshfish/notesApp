@extends('layouts.header')

@section('content')
<section class="vh-100 bg-image"
    style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                            {{-- ✅ Show validation errors --}}
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-outline mb-4">
                                    <input type="text"
                                        name="name"
                                        value="{{ old('name') }}"
                                        id="form3Example1cg"
                                        class="form-control form-control-lg @error('name') is-invalid @enderror" />
                                    <label class="form-label" for="form3Example1cg">Your Name</label>
                                    @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        id="form3Example3cg"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror" />
                                    <label class="form-label" for="form3Example3cg">Your Email</label>
                                    @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password"
                                        name="password"
                                        id="form3Example4cg"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror" />
                                    <label class="form-label" for="form3Example4cg">Password</label>
                                    @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password"
                                        name="password_confirmation"
                                        id="form3Example4cdg"
                                        class="form-control form-control-lg" />
                                    <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                                </div>

                                <div class="form-check d-flex justify-content-center mb-5">
                                    <input class="form-check-input me-2" type="checkbox" value="1" id="form2Example3cg" />
                                    <label class="form-check-label" for="form2Example3cg">
                                        I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                                    </label>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit"
                                        class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">
                                        Register
                                    </button>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Have already an account?
                                    <a href="" class="fw-bold text-body"><u>Login here</u></a>
                                </p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection