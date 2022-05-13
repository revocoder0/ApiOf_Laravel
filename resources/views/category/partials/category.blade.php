@foreach ($categories as $key => $category)
                                        <tr id="category_id{{ $category->id }}">
                                            <td>
                                                <input type="checkbox" name="ids" value="{{ $category->id }}">
                                            </td>
                                            <td>
                                                {{ ++$key }}
                                            </td>
                                            <td>
                                                {{ $category->name }}
                                            </td>

                                            <td>
                                                {{ $category->slug }}
                                            </td>

                                            <td>
                                                {{ $category->order }}
                                            </td>

                                            <td>
                                                {{ \Carbon\Carbon::parse($category->created_at)->format('d-m-Y') }}
                                            </td>
                                            <td class="text-right">


                                                <a href="#" data-toggle="modal"
                                                    data-target="#ModalEdit{{ $category->id }}">
                                                    <button type="button" class="btn btn-primary btn-sm">{{__('Edit')}}</button>
                                                </a>
                                                <a class="btn btn-danger btn-sm del_btn" data-toggle="modal"
                                                    href="#exampleModalCenter"
                                                    data-value="{{ $category->id }}">{{__('Delete')}}</a>

                                            </td>
                                        </tr>

                                        @include('category.partials.modal.edit')
                                        @include('category.partials.modal.delete')


                                    @endforeach