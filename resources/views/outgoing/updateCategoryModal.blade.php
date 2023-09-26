<!-- Modal for add new -->
<div class="modal fade add-modal" id="update{{ $outgoingCategory->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Outgoing Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/outgoing_documents/update/' . $outgoingCategory->id) }}" method="POST" id="addIncomingCategory" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="container">
                        <div class="row">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control mb-2" id="name" name="name" value="{{ $outgoingCategory->name }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

