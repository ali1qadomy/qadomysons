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
                    <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Product Name:</label>
                        <input type="text" class="form-control" name="uproductname" value="{{ $item->name }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Product description:</label>
                        <input type="text" class="form-control" name="uproductdesc"
                            value="{{ $item->description }}" required>
                    </div>
                    <div class="form-group">
                        <label for="Subcategory">Category Image:</label>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </div>
            </div>
        </form>
    </div>
</div>
