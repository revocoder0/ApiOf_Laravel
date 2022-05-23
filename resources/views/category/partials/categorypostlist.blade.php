@foreach ($categoryposts as $key => $post)
                                        <tr id="pid{{ $post->id }}">
                                            <td>
                                                <input type="checkbox" name="post_ids" class="checkBoxClass"
                value="{{ $post->id }}">
                                            </td>
                                            <td>
                                                {{ ++$key }}
                                            </td>
                                            <td>
                                                {{ $post->title }}
                                            </td>

                                            <td>
                                                {{ $post->category->name }}
                                            </td>
                                            <td>
                                                {{ $post->user->name }}
                                            </td>

                                            <td>
                                                {{ \Carbon\Carbon::parse($post->created_at)->format('d-m-Y') }}
                                            </td>
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