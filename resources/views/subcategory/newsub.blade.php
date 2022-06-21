<!-- Modal -->
<div class="modal fade" id="newSub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Sub_Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('subcategory.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Sub_Category Name:</label>
                        <input type="text" class="form-control" name="subname" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Sub_Category description:</label>
                        <input type="text" class="form-control" name="subdesc" >
                    </div>
                    <div class="form-group">
                        <select  class="custom-select"" aria-label="Default select example" name='categorySelect' required>
                            <option selected>choose category</option>
                            @foreach ($cat as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Sub_Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
