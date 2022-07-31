<!-- Modal -->
<div class="modal fade" id="newcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('category.new category') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ trans('category.category Name English') }}:</label>
                        <input type="text" class="nameEn form-control" name="categoryNameEn" required>
                    </div>
                    <div class="form-group">
                        <label
                            for="exampleInputPassword1">{{ trans('category.category description English') }}:</label>
                        <input type="text" class="descEn form-control" name="categoryDescEn" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ trans('category.category Name Arabic') }}:</label>
                        <input type="text" class="nameAr form-control" name="categoryNameAr" required>
                    </div>
                    <div class="form-group">
                        <label
                            for="exampleInputPassword1">{{ trans('category.category description Arabic') }}:</label>
                        <input type="text" class="descAr form-control" name="categoryDescAr" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('category.Close') }}</button>
                    <button type="submit" class="btn btn-primary savecategory">{{ trans('category.Add Category') }}</button>
                </div>

        </div>
    </div>
</div>
