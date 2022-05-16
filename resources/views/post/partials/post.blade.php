@if(count($posts) > 0)
@foreach ($posts as $key => $post)
    <tr id="pid{{ $post->id }}" class="text-center">
        <td>
            <input type="checkbox" name="post_ids" class="checkBoxClass"
                value="{{ $post->id }}">
        </td>
        <td>{{ ++$key }}</td>
        <td>
            @if (isset($post->feature))
                <div class="img-overflow">
                    <img src="{{ asset('/storage/uploads/' . $post->feature) }}"
                        style="width:40px; ">
                </div>
            @endif
        </td>
        <td>{{ Str::limit($post->title, 30) }}</td>
        <td>{{ $post->category->name }}</td>
        <td>{{ $post->user->name }}</td>
        <td>{{ Carbon\Carbon::parse($post->created_at)->format('y-M-d') }}</td>
        <td>
            <a href="{{ route('post.show', $post->id) }}"><button
                class="btn btn-secondary btn-sm">Detail</button></a>
            <a href="{{ route('post.edit', $post->id) }}"><button
                    class="btn btn-primary btn-sm">Edit</button></a>
            <a class="btn btn-danger btn-sm del_btn" data-toggle="modal"
                href="#exampleModalCenter"
                data-value="{{ $post->id }}">{{ __('Delete') }}</a>
        </td>
    </tr>
    @include('post.partials.modal.delete')

@endforeach
@else
    <tr>
        <td  colspan="10" class="text-center">Post Not Found!</td>
    </tr>
@endif
