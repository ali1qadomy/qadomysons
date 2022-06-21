<!-- Modal -->
<div class="modal fade" id="deletebranche-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Branche</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('branche.destroy', $item->id) }}">
                @csrf
                @method('delete')
                <input type="hidden" name="deletebranche" value="{{ $item->id }}">
                <div class="modal-body">
                    you are sure to delete this branche
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete Branche</button>
                </div>
            </form>
        </div>
    </div>
</div>
