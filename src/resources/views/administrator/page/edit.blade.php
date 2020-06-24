@extends('layouts.administrator')
@section('content')


    <form method="post">
        @csrf


        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">Właściwości</div>
                    <div class="card-body">


                        <div class="form-group">
                            <label for="page_name">Nazwa</label>
                            <input id="page_name" name="page_name" type="text" placeholder="Nazwa"
                                   value="{{$item->page_name ?? old('page_name')}}"
                                   class="form-control {{ $errors->first('page_name') ? 'is-invalid' : '' }}">
                            @if($errors->first('page_name'))
                                <div class="invalid-feedback">
                                    {{$errors->first('page_name')}}
                                </div>
                            @endif
                            <script>
                                $('input[name="page_name"]').change(function() {
                                    let page_name = $('input[name="seo_title"]').val($(this).val()).val();
                                    page_name = page_name.split(' ').join('-').toLowerCase();
                                    page_name = page_name.split('_').join('-').toLowerCase();
                                    page_name = RemoveAccents(page_name);
                                    $('input[name="url"]').val(page_name);
                                });
                            </script>
                        </div>

                        <div class="form-group">
                            <label for="page_module">Moduł</label>
                            <select name="page_module" id="page_module" class="form-control">
                                @foreach($page_modules as $key => $value)
                                    <option value="{{$key}}"
                                        @if($item != null)
                                            {{$item->page_module == $key ? 'selected' : ''}}
                                        @else
                                            {{$key == old('page_module')  ? 'selected' : ''}}
                                        @endif >
                                        {{$value}}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->first('page_module'))
                                <div class="invalid-feedback">
                                    {{$errors->first('page_module')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-check">
                            <input type="checkbox" id="page_status" name="page_status" placeholder="Status"
                                   class="form-check-input"
                                   {{ $item ? $item->page_status ? 'checked' : '' : old('page_status') != null ?? '' }}
                                   value="1">
                            <label for="page_status" class="form-check-label">Publikuj</label>
                        </div>


                        <hr>

                        <button type="submit" class="btn btn-primary">Zapisz</button>

                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">SEO</div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="url">Url</label>
                            <input id="url" name="url" type="text" placeholder="Url"
                                   value="{{$seo->url ?? old('url')}}"
                                   class="form-control {{ $errors->first('url') ? 'is-invalid' : '' }}">
                            @if($errors->first('url'))
                                <div class="invalid-feedback">
                                    {{$errors->first('url')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="seo_title">Tytuł</label>
                            <input id="seo_title" name="seo_title" type="text" placeholder="Tytuł"
                                   value="{{$seo->seo_title ?? old('seo_title')}}"
                                   class="form-control {{ $errors->first('seo_title') ? 'is-invalid' : '' }}">
                            @if($errors->first('seo_title'))
                                <div class="invalid-feedback">
                                    {{$errors->first('seo_title')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="seo_description">Opis</label>
                            <textarea name="seo_description" id="seo_description" rows="5" placeholder="Opis"
                                      class="form-control {{ $errors->first('seo_description') ? 'is-invalid' : '' }}">{{$seo->seo_description ?? old('seo_description')}}</textarea>
                            @if($errors->first('seo_description'))
                                <div class="invalid-feedback">
                                    {{$errors->first('seo_description')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="seo_tags">Tagi</label>
                            <input id="seo_tags" name="seo_tags" type="text" placeholder="Tagi"
                                   value="{{$seo->seo_tags ?? old('seo_tags')}}"
                                   class="form-control {{ $errors->first('seo_tags') ? 'is-invalid' : '' }}">
                            @if($errors->first('seo_tags'))
                                <div class="invalid-feedback">
                                    {{$errors->first('seo_tags')}}
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </form>





@endsection
