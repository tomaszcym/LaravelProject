@extends('layouts.administrator')
@section('content')


    <form method="post" enctype="multipart/form-data">
        @csrf


        <div class="row mb-4">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">Właściwości</div>
                    <div class="card-body">


                        <div class="form-group">
                            <label for="realization_title">Tytuł</label>
                            <input id="realization_title" name="realization_title" type="text" placeholder="Tytuł"
                                   value="{{$item->realization_title ?? old('realization_title')}}"
                                   class="form-control {{ $errors->first('realization_title') ? 'is-invalid' : '' }}">
                            @if($errors->first('realization_title'))
                                <div class="invalid-feedback">
                                    {{$errors->first('realization_title')}}
                                </div>
                            @endif
                            <script>
                                $('input[name="realization_title"]').change(function() {
                                    let realization_title = $('input[name="seo_title"]').val($(this).val()).val();
                                    realization_title = realization_title.split(' ').join('-').toLowerCase();
                                    realization_title = realization_title.split('_').join('-').toLowerCase();
                                    realization_title = RemoveAccents(realization_title);
                                    $('input[name="url"]').val(realization_title);
                                });
                            </script>
                        </div>


                        <div class="form-group">
                            <label for="url">Autor</label>
                            <textarea name="realization_lead" id="realization_lead" rows="5" placeholder="Autor"
                                      class="form-control {{ $errors->first('realization_lead') ? 'is-invalid' : '' }}">{{$item->realization_lead ?? old('realization_lead')}}</textarea>
                            @if($errors->first('realization_lead'))
                                <div class="invalid-feedback">
                                    {{$errors->first('realization_lead')}}
                                </div>
                            @endif
                        </div>

                        <hr>


                        <div class="form-check">
                            <input type="checkbox" id="realization_status" name="realization_status" placeholder="Status"
                                   class="form-check-input"
                                   {{ $item ? $item->realization_status ? 'checked' : '' : old('realization_status') != null ?? '' }}
                                   value="1">
                            <label for="realization_status" class="form-check-label">Publikuj</label>
                        </div>


                        <hr>

                        <button type="submit" class="btn btn-primary">Zapisz</button>

                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card mb-4">
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

{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        @if($item)--}}
{{--                            <p>Aktualne zdjęcie</p>--}}
{{--                            <img src="{{ RenderImage($item->realization_img, 60) }}" alt="test" class="mb-4"--}}
{{--                                 style="width: 200px;">--}}
{{--                        @endif--}}

{{--                        <div class="form-group">--}}


{{--                            <label for="realization_img">Zdjęcie</label>--}}
{{--                            <input type="file" id="realization_img" name="realization_img"--}}
{{--                                   class="form-control-file {{ $errors->first('realization_img') ? 'is-invalid' : '' }}"--}}
{{--                                   value="{{old('realization_img')}}">--}}
{{--                            @if($errors->first('realization_img'))--}}
{{--                                <div class="invalid-feedback">--}}
{{--                                    {{$errors->first('realization_img')}}--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>


        </div>


        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="url">Tekst</label>
                    <textarea name="realization_text" id="realization_text" rows="5" placeholder="Tekst"
                              class="form-control ckeditor {{ $errors->first('realization_text') ? 'is-invalid' : '' }}">{{$item->realization_text ?? old('realization_text')}}</textarea>
                    @if($errors->first('realization_text'))
                        <div class="invalid-feedback">
                            {{$errors->first('realization_text')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>


    </form>





@endsection
