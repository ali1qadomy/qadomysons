<!-- Modal -->
<div class="modal fade" id="updatecategory-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Branche</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('category.update',$item->id) }}">
                @csrf
                @method('put')
                <input type="hidden" name="updatecategory" value="{{ $item->id }}">
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">category Name:</label>
                            <input type="text" class="form-control" name="ucategoryName" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">category description:</label>
                            <input type="text" class="form-control" name="ucategoryDesc" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update category</button>
                </div>
            </form>
        </div>
    </div>
</div>
