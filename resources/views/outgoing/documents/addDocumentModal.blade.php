<!-- Modal for add new -->
<div class="modal fade add-modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add {{ $category->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/outgoing_documents/' . $category->name . '/add') }}" method="POST" id="addAdminOrder" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <input type="hidden" name="category_id" value="{{ $category->id }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control mb-2" id="title" name="title" required>

                                <label for="thru" class="form-label">Thru</label>
                                <input type="text" class="form-control mb-2" id="thru" name="thru">

                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control mb-2" id="subject" name="subject">

                                <label for="date_received" class="form-label">Date Received</label>
                                <input type="date" class="form-control mb-2" id="date_received" name="date_received">
                            </div>
                            <div class="col-6">
                                <label for="to" class="form-label">To</label>
                                <input type="text" class="form-control mb-2" id="to" name="to">
                                
                                <label for="from" class="form-label">From</label>
                                <input type="text" class="form-control mb-2" id="from" name="from">

                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control mb-2" id="date" name="date">

                                {{-- image upload --}}
                                <label for="formFile" class="form-label">Upload Image</label>
                                <input class="form-control" type="file" id="formFile" name="image" multiple>
                            </div>
                            <div class="col-12">
                                <label for="remarks">Remarks</label>
                                <div class="form-floating">
                                    <textarea class="form-control" id="remarks" name="remarks" style="height: 100px"></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="status" value="outgoing">
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

