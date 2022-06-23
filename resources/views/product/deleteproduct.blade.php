<!-- Modal -->
<div class="modal fade" id="deleteproduct-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('product.Delete Product') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('product.destroy', $item->id) }}">
                @csrf
                @method('delete')
                <input type="hidden" name="deleteproduct" value="{{ $item->id }}">
                <div class="modal-body">
                    {{ trans('product.are you sure to delete this product') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('product.Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ trans('product.Delete Product') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
