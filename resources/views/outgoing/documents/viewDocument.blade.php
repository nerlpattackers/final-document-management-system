@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @if (strtolower(pathinfo($document->image, PATHINFO_EXTENSION)) == 'pdf')
                <div class="col-6 d-flex align-items-center">
                    <a href="{{ url()->previous() }}" class="text-dark back-btn"><i class="lni lni-chevron-left me-2 mt-4"></i>Back</a>
                </div>
            @else
                <div class="col-6">
                    <a href="{{ url()->previous() }}" class="text-dark back-btn"><i class="lni lni-chevron-left me-2 mt-4"></i>Back</a>
                </div>
                @if ($document->image)
                    <div class="col-6 d-flex align-items-center justify-content-end">
                        <a href="{{ $document->image }}" class="text-dark back-btn" download><i class="lni lni-download me-2 mt-4"></i>Download</a>
                    </div>
                @endif
            @endif
        </div>
    </div>

    {{-- CHECKS IF THE THE DATA HAS AN IMAGE DOWNLOADED --}}
    @if ($document->image)
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h1 class="fw-light" style="font-size:2.5rem;">{{ $document->title }}</h1>
                </div>
                <div class="col-12 d-flex justify-content-center mt-1 mb-3">
                    @if ($document->date)
                        <h5 style="font-weight:lighter;">{{ date('F j, Y', strtotime($document->date)) }}</h5>
                    @else
                        <p class="fst-italic">date not set</p>
                    @endif
                </div>
                    {{-- CHECK IF DOCUMENT HAS REMARKS --}}
                @if ($document->remarks)
                    <div class="col-12">
                        <div class="alert-box primary-alert">
                            <div class="alert">
                            <p class="text-dark">
                                <span class="fw-bold me-2">REMARKS:</span>{{ $document->remarks }}
                            </p>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-12 d-flex justify-content-center">
                    @if (strtolower(pathinfo($document->image, PATHINFO_EXTENSION)) == 'pdf')
                        <iframe src="{{ $document->image }}" class="admin-order-img" frameborder="0"></iframe>
                    @else
                        <img src="{{ $document->image }}" class="img-fluid rounded-top border" alt="">
                    @endif
                </div>
            </div>
        </div>
    @else
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <p class="mt-5" style="font-size:1.7rem">No image uploaded</p>
                </div>
            </div>
        </div>
    @endif
@endsection