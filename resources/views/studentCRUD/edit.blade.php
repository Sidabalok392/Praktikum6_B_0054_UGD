@extends('dashboard')

@section('content')

    <div class="d-flex justify-content-between mt-5 mb-5">
        <div>
            <h2>Edit Student</h2>
        </div>
        <div>
            <a class="btn btn-secondary" href="{{ route('students.index') }}">Back</a>
        </div>
    </div>

    @if($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('students.update',$students->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">

        <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Student First Name</strong>
                    <input type="text" name="nama_depan" class="form-control" placeholder="First Name"
                    value="<?php echo $students->nama_depan?>">
                </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="from-group">
                    <strong>Student Last Name</strong>
                    <input type="text" name="nama_belakang" class="form-control" placeholder="Last Name"
                    value="<?php echo $students->nama_belakang?>">
                </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="from-group">
                    <strong>Student Email</strong>
                    <input type="text" name="email" class="form-control" placeholder="xxxxx@example.com"
                    value="<?php echo $students->email?>">
                </div>
        </div>

        <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="from-group">
                    <strong>Student Phone Number</strong>
                    <input type="tel" name="no_telp" class="form-control" placeholder="Phone Number"
                    value="<?php echo $students->no_telp?>">
                </div>
        </div>

        <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="from-group">
                    <strong>Student Birthplace</strong>
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Birthplace"
                    value="<?php echo $students->tempat_lahir?>">
                </div>
        </div>

        <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <strong>Student Birthdate</strong>
                    <input type="date" name="tanggal_lahir" class="form-control" placeholder="dd/mm/yy"
                    value="<?php echo $students->tanggal_lahir?>">
                </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mt-5 col text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>

    </form>
    @endsection