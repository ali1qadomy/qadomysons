<!-- Modal -->
<div class="modal fade" id="updateproduct-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('product.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="updateproduct" value="{{ $item->id }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ trans('product.Update Product') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ trans('product.Product Name English') }}:</label>
                        <input type="text" class="form-control" name="uproductnameEn" value="{{ $item->name }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ trans('product.Product description English') }}:</label>
                        <input type="text" class="form-control" name="uproductdescAr"
                            value="{{ $item->description }}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ trans('product.Product Name Arabic') }}:</label>
                        <input type="text" class="form-control" name="uproductnameEn" value="{{ $item->name }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ trans('product.Product description Arabic') }}:</label>
                        <input type="text" class="form-control" name="uproductdescAr"
                            value="{{ $item->description }}" required>
                    </div>
                    <div class="form-group">
                        <label for="Subcategory">{{ trans('product.Sub_Category Name') }}:</label>
                        <select class="form-control" name="uProdSubCategory" value="{{ $item->category_id }}"
                            required>
                            @foreach ($scbCat as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        @foreach ($item->image as $i)
                            <img src="{{ asset('images/' . $i->url) }}" alt="" class="w-25">
                        @endforeach
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile03" name="Uimage"
                                aria-describedby="inputGroupFileAddon03">
                            <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('product.Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ trans('product.Update Product') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
