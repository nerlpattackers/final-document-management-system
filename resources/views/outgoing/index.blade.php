@extends('layouts.app')

@section('content')
    {{-- TITLE AND BREADCRUMBS --}}
    <div class="container-fluid mt-3 mb-3">
        <div class="row align-items-center">
            <div class="col-6">
                <h3>Outgoing Documents</h3>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a href="" class="btn primary-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="lni lni-plus me-2"></i>New</a>
                @include('outgoing.addCategory')
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
            @if ($outgoingCategory->count() != 0)
                @foreach ($outgoingCategory as $outgoingCategory)
                    <div class="col-3">
                        <div class="card-style-3 mb-30 file-folder-card shadow">
                            <div class="card-content">
                                <div class="d-flex">
                                    <h4 class="mb-2 me-2">{{ $outgoingCategory->name }}</h4>
                                    <a href="" class="text-reset" data-bs-toggle="modal" data-bs-target="#update{{ $outgoingCategory->id }}"><i class="fas fa-pen-to-square"></i></a>
                                    @include('outgoing.updateCategoryModal')
                                </div>
                                <p class="">
                                    {{ $documentCount[$outgoingCategory->id] }} files
                                </p>
                                <a href="{{ url('/outgoing_documents/' . $outgoingCategory->id) }}" class="read-more mt-2">Open</a>
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