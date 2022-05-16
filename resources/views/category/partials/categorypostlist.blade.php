@foreach ($categoryposts as $key => $categorypost)
                                        <tr id="category_id{{ $categorypost->id }}">
                                            <td>
                                                <input type="checkbox" name="ids" value="{{ $categorypost->id }}">
                                            </td>
                                            <td>
                                                {{ ++$key }}
                                            </td>
                                            <td>
                                                {{ $categorypost->title }}
                                            </td>

                                            <td>
                                                {{ $categorypost->category->name }}
                                            </td>
                                            <td>
                                                {{ $categorypost->user->name }}
                                            </td>

                                            <td>
                                                {{ \Carbon\Carbon::parse($categorypost->created_at)->format('d-m-Y') }}
                                            </td>
                                            <td class="text-right">


                                                {{-- <a href="#" data-toggle="modal"
                                                    data-target="#ModalEdit{{ $categorypost->id }}">
                                                    <button type="button" class="btn btn-primary btn-sm">{{__('Edit')}}</button>
                                                </a>
                                                <a class="btn btn-danger btn-sm del_btn" data-toggle="modal"
                                                    href="#exampleModalCenter"
                                                    data-value="{{ $categorypost->id }}">{{__('Delete')}}</a> --}}

                                            </td>
                                        </tr>

                                        {{-- @include('post.partials.modal.edit') --}}
                                        {{-- @include('../post.partials.modal.delete') --}}


                                    @endforeach