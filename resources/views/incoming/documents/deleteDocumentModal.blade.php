<!-- Modal for add new -->
<div class="modal fade add-modal" id="delete{{ $documents->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-12">
                        <h4 class="modal-title text-start" id="staticBackdropLabel">Are you sure you want to delete {{ $documents->title }}?</h4>
                    </div>
                    <div class="col-12 d-flex mt-3 justify-content-end">
                        {{-- DELETE FORM AND BTN --}}
                        <form action="{{ url('/incoming_documents/' . $documents->id . '/delete') }}" method="POST" class="text-end">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary mx-2" style="min-width:4rem !important;">Yes</button>
                        </form>
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close" style="min-width:4rem !important;">No</button>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>

