
<!-- start edit -->
<div class="modal fade" id="Edit{{$social->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLongTitle">{{_('Edit Social?')}}
                </p>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ route('social.update', $social->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="col-md-12 form-group">
                        <label for="Name" class="form-label">{{__('Name')}}</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ $social->name ?? old('name') }}" placeholder="Name...">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                     <!-- start icon -->
                <div class="col-md-12">
                <label for="exampleInputPassword1">icon </label>
                <input type="file" name="image" class="form-control n-newborder">
                @include('alerts.feedback', ['field' => 'image'])
                </div>
                  <!-- end icon -->
                    <div class="col-md-12 form-group">
                        <label for="Name" class="form-label">{{__('Link')}}</label>
                        <input type="text" name="link" id="name" class="form-control"
                            value="{{ $social->link ?? old('link') }}" placeholder="Link...">
                        @error('link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                        <button type="submit" class="btn btn-primary btn-round ">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end social edit -->
