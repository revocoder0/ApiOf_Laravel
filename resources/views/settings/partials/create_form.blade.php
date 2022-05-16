<form method="POST" action="{{ route('storesetting') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @include('alerts.success')
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col-md-12 pr-1">
                                    <div class="form-group">
                                        <label for="title">{{ __(' Title') }}</label>
                                        <input type="text" name="title" class="form-control" placeholder="Title">
                                        @include('alerts.feedback', ['field' => 'title'])
                                    </div>

                                    <div class="form-group">
                                        <label for="email">{{ __(' Email address') }}</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>

                                    <label>Logo</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group text-center btn btn-dark btn-sm">
                                                <input type="file" name="logo" id="image" class="inputfile"
                                                    onchange="previewLogo(event)" autofocus />
                                            
                                                <label for="file">Choose file </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <img id="logo" width="80"><br>
                                        </div>
                                    </div>

                                    <label>Cover Photo</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group text-center btn btn-dark btn-sm">
                                                <input type="file" name="coverphoto" id="image" class="inputfile"
                                                    onchange="previewImage(event)" autofocus />
                                                <label for="file">Choose file</label>
        
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <img id="output" width="100"><br>
                                        </div>
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="description">{{ __(' Description') }}</label>
                                        <textarea name="description" id="description" rows="5" class="form-control"
                                            placeholder="write description"></textarea>
                                        @include('alerts.feedback', ['field' => 'description'])
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-primary btn-round">{{ __('Save') }}</button>
                            </div>
                        </form>