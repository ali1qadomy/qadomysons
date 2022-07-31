<!-- Modal -->
<div class="modal fade" id="updatecategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('category.Update category') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <input type="hidden" class="updatecategoryid" name="updatecategory" value="">
            <div class="modal-body">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ trans('category.category Name English') }}:</label>
                        <input type="text" class="form-control ucategoryNameEn" value="" id="updatecategorynameen" name="ucategoryNameEn" required>
                    </div>
                    <div class="form-group">
                        <label
                            for="exampleInputPassword1">{{ trans('category.category description English') }}:</label>
                        <input type="text" class="form-control ucategoryDescEn" id="updatecategorydescen" name="ucategoryDescEn" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ trans('category.category Name Arabic') }}:</label>
                        <input type="text" class="form-control ucategoryNameAr" name="ucategoryNameAr" required>
                    </div>
                    <div class="form-group">
                        <label
                            for="exampleInputPassword1">{{ trans('category.category description Arabic') }}:</label>
                        <input type="text" class="form-control ucategoryDescAr" name="ucategoryDescAr" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('category.Close') }}</button>
                <button type="submit" class="btn btn-primary updatecategoriess">{{ trans('category.Update category') }}</button>
            </div>

        </div>
    </div>
</div>
