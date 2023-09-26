<!-- Modal for add new -->
<div class="modal fade add-modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Incoming Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/incoming_documents/add') }}" method="POST" id="addIncomingCategory" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="container">
                        <div class="row">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control mb-2" id="name" name="name" required>
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

