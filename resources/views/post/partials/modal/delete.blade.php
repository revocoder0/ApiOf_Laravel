<!-- Category Delete Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLongTitle">Delete Post?
                </p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to permanently remove this post?
                <form action="{{ route('post.destroy', $post) }}" method="POST" id="post_form">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="del_row" name="id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                        <button type="submit" class="btn btn-primary btn-round ">{{ __('Delete') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
{{-- End Category Delete Modal --}}

{{-- Js --}}
@push('js')
    <script>
        // Delete Model
        $(document).ready(function() {
            $(document).ready(function() {
                $(".del_btn").click(function() {
                    var delete_id = $(this).attr('data-value');
                    console.log(delete_id);
                    $('#del_row').val(delete_id);
                });
            });



            // Check All
            $("#checkAll").click(function(e) {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

            // Deleted Selected All
            $('#deleteAllSelectedRecord').click(function(e) {
                e.preventDefault();
                var allids = [];
                $("input:checkbox[name=ids]:checked").each(function() {
                    allids.push($(this).val());
                });

                $.ajax({
                    url: "{{ route('category.deleteCheckCategory') }}",
                    type: "DELETE",
                    data: {
                        _token: $("input[name =_token]").val(),
                        ids: allids
                    },
                    success: function(response) {
                        $.each(allids, function(key, val) {
                            $('#category_id' + val).remove();
                        });
                    }
                })
            })
        });
    </script>
@endpush

@push('js')
    <script>
        //For delete all in post
        $("#CheckAll").click(function() {
                // $(".checkBoxClass").prop('checked', $(this).prop('checked'));
                $('.checkBoxClass').not(this).prop('checked', this.checked);

            });
            $("#deleteAllSelectedPost").click(function(e) {
                e.preventDefault();
                var allpostids = [];

                $("input:checkbox[name=post_ids]:checked").each(function() {
                    allpostids.push($(this).val());
                });

                $.ajax({
                    url: "{{ route('deleteall') }}",
                    type: "DELETE",
                    data: {
                        _token: $("input[name=_token]").val(),
                        post_ids: allpostids
                    },
                    success: function(responsse) {
                        $.each(allpostids, function(key, val) {
                            $("#pid" + val).remove();
                        });
                    }
                });
            });
            //End delete all in post
    </script>
@endpush
