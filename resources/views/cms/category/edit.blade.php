@foreach ($categories as $category)
    <div class="card-body">
        <!-- Varying modal start-->
        <div class="modal fade" id="modalCategory{{ $category->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Category</h5>
                        <button class="btn" type="button" data-bs-dismiss="modal">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('categories.update', $category->id) }}"
                        enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="col-form-label" for="name">Category Name</label>
                                <input class="form-control" name="name" id="name" type="text"
                                    value="{{ old('name', $category->name) }}">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary ms-2" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Varying modal end-->
    </div>
@endforeach
