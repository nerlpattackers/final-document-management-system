<!-- Modal for add new -->
<div class="modal fade add-modal" id="importDatabase" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Import Database</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/import') }}" method="POST" id="addIncomingCategory" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="container">
                        <div class="row">
                            <input class="form-control" type="file" id="file" name="file">
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

