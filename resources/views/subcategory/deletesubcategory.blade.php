<!-- Modal -->
<div class="modal fade" id="deletesub-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('subCategory.destroy', $item->id) }}">
                @csrf
                @method('delete')
                <input type="hidden" name="deletesub" value="{{ $item->id }}">
                <div class="modal-body">
                    you are sure to delete this SubCategory
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete category</button>
                </div>
            </form>
        </div>
    </div>
</div>
