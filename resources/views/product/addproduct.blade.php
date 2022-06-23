<!-- Modal -->
<div class="modal fade" id="newproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ trans('product.New Branche') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ trans('product.Product Name English') }}:</label>
                        <input type="text" class="form-control" name="productnameEn" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ trans('product.Product description English') }}:</label>
                        <input type="text" class="form-control" name="productdescEn" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ trans('product.Product Name Arabic') }}:</label>
                        <input type="text" class="form-control" name="productnameAr" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ trans('product.Product description Arabic') }}:</label>
                        <input type="text" class="form-control" name="productdescAr" required>
                    </div>
                    <div class="form-group">
                        <label for="Subcategory">{{ trans('product.Sub_Category Name') }}:</label>
                        <select class="form-control" name="ProdSubCategory">
                            @foreach ($scbCat as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                      
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile03" name="image"
                                aria-describedby="inputGroupFileAddon03" required>
                            <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('product.Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ trans('product.Add Product') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
