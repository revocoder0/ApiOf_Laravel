<!-- Category Edit Modal -->
<div class="modal fade" id="ModalEdit{{ $category->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLongTitle">Edit Category?
                </p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ route('category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="col-md-12 form-group">
                        <label for="Name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control"
                            value="{{ $category->name ?? old('name') }}" id="name" placeholder="Name...">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 form-group">
                        <label for="Slug" class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" id="slug"
                            value="{{ $category->slug ?? old('slug') }}" id="name" placeholder="Slug...">
                        @error('slug')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 form-group">
                        <label for="Order" class="form-label">Order</label>
                        <input type="text" name="order" class="form-control" id="order"
                            value="{{ $category->order ?? old('order') }}" id="order" placeholder="Order...">
                        @error('order')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-round ">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
{{-- End Category Edit Modal --}}
