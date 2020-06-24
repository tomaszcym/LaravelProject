@extends('layouts.administrator')
@section('content')


    <form method="post">
        @csrf


        <div class="row mb-4">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">Właściwości</div>
                    <div class="card-body">


                        <div class="form-group">
                            <label for="offer_title">Tytuł</label>
                            <input id="offer_title" name="offer_title" type="text" placeholder="Tytuł"
                                   value="{{$item->offer_title ?? old('offer_title')}}"
                                   class="form-control {{ $errors->first('offer_title') ? 'is-invalid' : '' }}">
                            @if($errors->first('offer_title'))
                                <div class="invalid-feedback">
                                    {{$errors->first('offer_title')}}
                                </div>
                            @endif
                            <script>
                                $('input[name="offer_title"]').change(function() {
                                    let offer_title = $('input[name="seo_title"]').val($(this).val()).val();
                                    offer_title = offer_title.split(' ').join('-').toLowerCase();
                                    offer_title = offer_title.split('_').join('-').toLowerCase();
                                    offer_title = RemoveAccents(offer_title);
                                    $('input[name="url"]').val(offer_title);
                                });
                            </script>
                        </div>


                        <div class="form-group">
                            <label for="url">Wprowadzenie</label>
                            <textarea name="offer_lead" id="offer_lead" rows="5" placeholder="Wprowadzenie"
                                      class="form-control ckeditor {{ $errors->first('offer_lead') ? 'is-invalid' : '' }}">{{$item->offer_lead ?? old('offer_lead')}}</textarea>
                            @if($errors->first('offer_lead'))
                                <div class="invalid-feedback">
                                    {{$errors->first('offer_lead')}}
                                </div>
                            @endif
                        </div>

                        <hr>


                        <div class="form-group">
                            <label for="offer_price">Cena</label>
                            <input id="offer_price" name="offer_price" type="text" placeholder="Cena"
                                   value="{{$item->offer_price ?? old('offer_price')}}"
                                   class="form-control {{ $errors->first('offer_price') ? 'is-invalid' : '' }}">
                            @if($errors->first('offer_price'))
                                <div class="invalid-feedback">
                                    {{$errors->first('offer_price')}}
                                </div>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="offer_external_url">Zewnętrzny URL</label>
                            <input id="offer_external_url" name="offer_external_url" type="text" placeholder="Zewnętrzny URL"
                                   value="{{$item->offer_external_url ?? old('offer_external_url')}}"
                                   class="form-control {{ $errors->first('offer_external_url') ? 'is-invalid' : '' }}">
                            @if($errors->first('offer_external_url'))
                                <div class="invalid-feedback">
                                    {{$errors->first('offer_external_url')}}
                                </div>
                            @endif
                        </div>




                        <div class="form-check">
                            <input type="checkbox" id="offer_status" name="offer_status" placeholder="Status"
                                   class="form-check-input"
                                   {{ $item ? $item->offer_status ? 'checked' : '' : old('offer_status') != null ?? '' }}
                                   value="1">
                            <label for="offer_status" class="form-check-label">Publikuj</label>
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


        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="url">Tekst</label>
                    <textarea name="offer_text" id="offer_text" rows="5" placeholder="Tekst"
                              class="form-control ckeditor {{ $errors->first('offer_text') ? 'is-invalid' : '' }}">{{$item->offer_text ?? old('offer_text')}}</textarea>
                    @if($errors->first('offer_text'))
                        <div class="invalid-feedback">
                            {{$errors->first('offer_text')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>


    </form>





@endsection
