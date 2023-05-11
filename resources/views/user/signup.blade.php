@extends('layouts.main')
@section('content')
<form action="{{ route('user.save') }}" method="post">
    @csrf
    <h1>Create Account</h1>
    <table class="table table-bordered table-dark">
        <tr>
            <td><input class="form-control" type="text" name="name" placeholder="Name" id=""></td>
        </tr>
        <tr>
            <td><input class="form-control" type="email" name="email" placeholder="Email" id=""></td>
        </tr>
        <tr>
            <td><input class="form-control" type="password" name="password" placeholder="Password" id=""></td>
        </tr>
        <tr>
            <td><input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" id=""></td>
        </tr>
        <tr>
            <td><button class="btn btn-primary" type="submit">Signup</button></td>
        </tr>
    </table>
</form>
@endsection
