@extends('layouts.administrator')
@section('content')


    <form method="post">
        @csrf


        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">Właściwości</div>
                    <div class="card-body">


                        <div class="form-group">
                            <label for="name">Nazwa użytkownika</label>
                            <input id="name" name="name" type="text" placeholder="Nazwa użytkownika"
                                   value="{{$item->name ?? old('name')}}"
                                   class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}">
                            @if($errors->first('name'))
                                <div class="invalid-feedback">
                                    {{$errors->first('name')}}
                                </div>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="email">Adres email</label>
                            <input id="email" name="email" type="text" placeholder="Adres email"
                                   value="{{$item->email ?? old('email')}}"
                                   class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}">
                            @if($errors->first('email'))
                                <div class="invalid-feedback">
                                    {{$errors->first('email')}}
                                </div>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="password">Hasło</label>
                            <input id="password" name="password" type="password" placeholder="Hasło"
                                   class="form-control {{ $errors->first('password') ? 'is-invalid' : '' }}">
                            @if($errors->first('password'))
                                <div class="invalid-feedback">
                                    {{$errors->first('password')}}
                                </div>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="password_confirm">Potwierdź hasło</label>
                            <input id="password_confirm" name="password_confirm" type="password" placeholder="Potwierdź hasło"
                                   class="form-control {{ $errors->first('password_confirm') ? 'is-invalid' : '' }}">
                            @if($errors->first('password_confirm'))
                                <div class="invalid-feedback">
                                    {{$errors->first('password_confirm')}}
                                </div>
                            @endif
                        </div>



                        <button type="submit" class="btn btn-primary">Zapisz</button>

                    </div>
                </div>
            </div>
        </div>


    </form>





@endsection
