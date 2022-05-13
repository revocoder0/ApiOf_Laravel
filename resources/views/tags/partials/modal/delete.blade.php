
<!-- start delete -->
<div class="modal fade" id="Delete{{$tag->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLongTitle">{{_('Delete Tags?')}}
                </p>
            </div>
            <div class="modal-body">
            Are you sure you want to permanently remove this tages?
                <form class="row g-3" action="{{ route('tag_delete', $tag->id) }}" method="GET">
                    @csrf
                    <input type="hidden" id="del_row" name="id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                        <button type="submit" class="btn btn-danger btn-round ">{{ __('Delete') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end tags delete -->
