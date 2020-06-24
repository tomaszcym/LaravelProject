@extends('layouts.administrator')
@section('content')


    <form method="post">
        @csrf


        <div class="panel-heading">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i> Zapisz wszystko</button>
        </div>


        <div class="row mb-4">
            <div class="col-12 col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        Dane główne
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="url">Nazwa strony</label>
                            <input id="page_name" name="page_name" type="text" placeholder="Nazwa strony"
                                   value="{{$page_name ?? old('page_name')}}"
                                   class="form-control {{ $errors->first('page_name') ? 'is-invalid' : '' }}">
                            @if($errors->first('page_name'))
                                <div class="invalid-feedback">
                                    {{$errors->first('page_name')}}
                                </div>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="url">Właściciel strony</label>
                            <input id="page_owner" name="page_owner" type="text" placeholder="Właściciel strony"
                                   value="{{$page_owner ?? old('page_owner')}}"
                                   class="form-control {{ $errors->first('page_owner') ? 'is-invalid' : '' }}">
                            @if($errors->first('page_owner'))
                                <div class="invalid-feedback">
                                    {{$errors->first('page_owner')}}
                                </div>
                            @endif
                        </div>

                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        Linki
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="url">Facebook URL</label>
                            <input id="fb_link" name="fb_link" type="text" placeholder="Facebook URL"
                                   value="{{$fb_link ?? old('fb_link')}}"
                                   class="form-control {{ $errors->first('fb_link') ? 'is-invalid' : '' }}">
                            @if($errors->first('fb_link'))
                                <div class="invalid-feedback">
                                    {{$errors->first('fb_link')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="url">Mapa google URL</label>
                            <input id="map_link" name="map_link" type="text" placeholder="Mapa google URL"
                                   value="{{$map_link ?? old('map_link')}}"
                                   class="form-control {{ $errors->first('map_link') ? 'is-invalid' : '' }}">
                            @if($errors->first('map_link'))
                                <div class="invalid-feedback">
                                    {{$errors->first('map_link')}}
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        Kontakt
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="url">Telefon 1</label>
                            <input id="phone_1" name="phone_1" type="text" placeholder="Telefon"
                                   value="{{$phone_1 ?? old('phone_1')}}"
                                   class="form-control {{ $errors->first('phone_1') ? 'is-invalid' : '' }}">
                            @if($errors->first('phone_1'))
                                <div class="invalid-feedback">
                                    {{$errors->first('phone_1')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="url">Telefon 2</label>
                            <input id="phone_2" name="phone_2" type="text" placeholder="Telefon"
                                   value="{{$phone_2 ?? old('phone_2')}}"
                                   class="form-control {{ $errors->first('phone_2') ? 'is-invalid' : '' }}">
                            @if($errors->first('phone_2'))
                                <div class="invalid-feedback">
                                    {{$errors->first('phone_2')}}
                                </div>
                            @endif
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="url">Adres email 1</label>
                            <input id="email_1" name="email_1" type="text" placeholder="Adres email"
                                   value="{{$email_1 ?? old('email_1')}}"
                                   class="form-control {{ $errors->first('email_1') ? 'is-invalid' : '' }}">
                            @if($errors->first('email_1'))
                                <div class="invalid-feedback">
                                    {{$errors->first('email_1')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="url">Adres email 2</label>
                            <input id="email_2" name="email_2" type="text" placeholder="Adres email"
                                   value="{{$email_2 ?? old('email_2')}}"
                                   class="form-control {{ $errors->first('email_2') ? 'is-invalid' : '' }}">
                            @if($errors->first('email_2'))
                                <div class="invalid-feedback">
                                    {{$errors->first('email_2')}}
                                </div>
                            @endif
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="url">Nazwa firmy</label>
                            <input id="company_name" name="company_name" type="text" placeholder="Nazwa firmy"
                                   value="{{$company_name ?? old('company_name')}}"
                                   class="form-control {{ $errors->first('company_name') ? 'is-invalid' : '' }}">
                            @if($errors->first('company_name'))
                                <div class="invalid-feedback">
                                    {{$errors->first('company_name')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="url">NIP</label>
                            <input id="nip" name="nip" type="text" placeholder="NIP"
                                   value="{{$nip ?? old('nip')}}"
                                   class="form-control {{ $errors->first('nip') ? 'is-invalid' : '' }}">
                            @if($errors->first('nip'))
                                <div class="invalid-feedback">
                                    {{$errors->first('nip')}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Inne
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="url">Adres</label>
                            <textarea name="address" id="address" rows="5" placeholder="Adres"
                                      class="form-control ckeditor {{ $errors->first('address') ? 'is-invalid' : '' }}">{{$address ?? old('address')}}</textarea>
                            @if($errors->first('address'))
                                <div class="invalid-feedback">
                                    {{$errors->first('address')}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </form>





@endsection
