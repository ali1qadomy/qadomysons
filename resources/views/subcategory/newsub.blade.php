<!-- Modal -->
<div class="modal fade" id="newSub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('sub_category.New Sub_Category') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('subcategory.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ trans('sub_category.Sub_Category Name English') }}:</label>
                        <input type="text" class="form-control" name="subnameEn" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ trans('sub_category.Sub_Category description English') }}:</label>
                        <input type="text" class="form-control" name="subdescEn" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ trans('sub_category.Sub_Category Name Arabic') }}:</label>
                        <input type="text" class="form-control" name="subnameAr" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ trans('sub_category.Sub_Category description Arabic') }}:</label>
                        <input type="text" class="form-control" name="subdescAr" >
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('sub_category.Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ trans('sub_category.Add Sub_Category') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
