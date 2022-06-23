<!-- Modal -->
<div class="modal fade" id="updatesub-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('sub_category.Update Sub_Category') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('subcategory.update', $item->id) }}">
                @csrf
                @method('put')
                <input type="hidden" name="updatesub" value="{{ $item->id }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ trans('sub_category.Sub_Category Name English') }}:</label>
                        <input type="text" class="form-control" name="usubnameEn" value="{{ $item->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ trans('sub_category.Sub_Category description English') }}:</label>
                        <input type="text" class="form-control" name="usubdescEn" value="{{ $item->description }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ trans('sub_category.Sub_Category Name Arabic') }}:</label>
                        <input type="text" class="form-control" name="usubnameAr" value="{{ $item->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ trans('sub_category.Sub_Category description Arabic') }}:</label>
                        <input type="text" class="form-control" name="usubdescAr" value="{{ $item->description }}"
                            required>
                    
                </div>
                    <div class="form-group">
                        <select class="custom-select"" aria-label="Default select example" name='ucategorySelect'
                            value="{{ $item->name }}"required>
                            <option selected>choose category</option>
                            @foreach ($cat as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('sub_category.Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ trans('sub_category.Update Sub_Category') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
