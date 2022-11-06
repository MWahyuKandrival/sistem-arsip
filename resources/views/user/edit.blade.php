@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="/user">User</a></div>
                <div class="breadcrumb-item">Edit User</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Edit User</h4>
                        </div>
                        <div class="card-body">
                            <form action="/user/{{ $user->id }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama User</label>
                                    <input type="text"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" placeholder="Name" value="{{ $user->name }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        id="username" name="username" placeholder="Username" value="{{ $user->username }}"
                                        required>
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nip">Nip</label>
                                    <input type="text" class="form-control @error('nip') is-invalid @enderror"
                                        id="nip" name="nip" placeholder="Nip" value="{{ $user->nip }}"
                                        required>
                                    @error('nip')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Email Address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" placeholder="name@example.com"
                                        value="{{ $user->email }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Password</label>
                                    <input type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        data-toggle="password" value="{{ $user->password }}"
                                        id="password" name="password" placeholder="Password" required>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
