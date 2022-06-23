<!-- Modal -->
<div class="modal fade" id="deletecategory-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('category.Delete Category') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('category.destroy', $item->id) }}">
                @csrf
                @method('delete')
                <input type="hidden" name="deletecategory" value="{{ $item->id }}">
                <div class="modal-body">
                    {{ trans('category.are you sure to delete this category') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('category.Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ trans('category.Delete Category') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
