@extends('layouts.app')

@section('content')
    @if (session('failed')) 
        <div class="container-fluid">
            <div class="row">
                <div class="alert alert-danger alert-dismissable d-flex justify-content-between">
                    {{ session('failed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
    @if (session('success'))
        <div class="container-fluid">
            <div class="row">
                <div class="alert alert-success alert-dismissable d-flex justify-content-between">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    <div class="container-fluid p-3">
        <div class="row">
            <div class="col-12">
                <div class="card card-style-2 p-0 d-flex welcome-card">
                    <div class="container text-container text-center">
                        <h1 class="">Welcome!</h1>
                        <p class="fw-bold">KODEGO</p>
                        <p class="p3">File Management System</p>
                    </div>
                    <div class="spacer background"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
