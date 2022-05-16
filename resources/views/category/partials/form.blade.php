{{-- Create Category Form --}}
<div class="card-body">
    <form class="row g-3" action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="col-md-5 form-group">
            <label for="Name" class="form-label">{{__('Name')}}</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}"
                placeholder="Name...">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-5 form-group">
            <label for="Order" class="form-label">{{__('Order')}}</label>
            <input type="text" name="order" class="form-control" id="order" value="{{ old('order') }}"
                placeholder="Order...">
            @error('order')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-2 mt-3">
            <button type="submit" class="btn btn-primary btn-round ">{{ __('Save') }}</button>
        </div>
    </form>
</div>
{{-- End Create Category Form --}}