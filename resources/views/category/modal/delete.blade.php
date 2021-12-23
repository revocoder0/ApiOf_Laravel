<!-- Category Delete Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLongTitle">Delete Category?
                </p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to permanently remove this category?
                <form action="{{ route('category.destroy', $category) }}" method="POST" id="post_form">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="del_row" name="id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="del8j98okkli99" class="btn btn-primary btn-sm">Confirm</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
{{-- End Category Delete Modal --}}
