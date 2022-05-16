
<!-- start edit -->
<div class="modal fade" id="Edit{{$tag->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLongTitle">{{_('Edit Tags?')}}
                </p>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ route('tags.update', $tag->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="col-md-12 form-group">
                        <label for="Name" class="form-label">{{__('Name')}}</label>
                        <input type="text" name="tags" id="name" class="form-control"
                            value="{{ $tag->tags ?? old('tags') }}" placeholder="Name...">
                        @error('tags')
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
<!-- end tags edit -->
