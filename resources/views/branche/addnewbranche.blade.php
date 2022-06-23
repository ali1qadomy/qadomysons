<!-- Modal -->
<div class="modal fade" id="newbranche" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('branche.New Branche') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('branche.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ trans('branche.Branche Name English') }}:</label>
                        <input type="text" class="form-control" name="BrancheNameEn" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ trans('branche.Branche Name Arabic') }}:</label>
                        <input type="text" class="form-control" name="BrancheNameAr" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('branche.Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ trans('branche.Add Branche') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
