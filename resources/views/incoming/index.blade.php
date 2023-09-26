@extends('layouts.app')

@section('content')
    {{-- TITLE AND BREADCRUMBS --}}
    <div class="container-fluid mt-3 mb-3">
        <div class="row align-items-center">
            <div class="col-6">
                <h3>Incoming Documents</h3>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a href="" class="btn primary-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="lni lni-plus me-2"></i>New</a>
                @include('incoming.addCategory')
            </div>
        </div>
    </div>
    @if (session('successUpdate'))
        <div class="container-fluid">
            <div class="row">
                <div class="alert alert-success alert-dismissable d-flex justify-content-between">
                    {{ session('successUpdate') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
    {{-- DISPLAY FILE FOLDERS --}}
    <div class="container-fluid">
        <div class="row">
            @if ($incomingCategory->count() != 0)
                @foreach ($incomingCategory as $incomingCategory)
                    <div class="col-3">
                        <div class="card-style-3 mb-30 file-folder-card shadow">
                            <div class="card-content">
                                <div class="d-flex">
                                    <h4 class="mb-2 me-2">{{ $incomingCategory->name }}</h4>
                                    <a href="" class="text-reset" data-bs-toggle="modal" data-bs-target="#update{{ $incomingCategory->id }}"><i class="fas fa-pen-to-square"></i></a>
                                    @include('incoming.updateCategoryModal')
                                    {{-- <a href="" class="text-reset" data-bs-toggle="modal" data-bs-target="#delete{{ $incomingCategory->id }}"><i class="fas fa-trash"></i></a>
                                    @include('incoming.deleteCategoryModal') --}}
                                </div>
                                <p class="">
                                    {{ $documentCount[$incomingCategory->id] }} files
                                </p>
                                <a href="{{ url('/incoming_documents/' . $incomingCategory->id) }}" class="read-more mt-2">Open</a>

                            </div>
                        </div>
                    </div> 
                @endforeach
            @else
                <div class="container">
                    <div class="row">
                        <p class="text-center fs-4 mt-5">No Documents</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection