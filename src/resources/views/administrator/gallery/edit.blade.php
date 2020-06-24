@extends('layouts.administrator')
@section('content')


    <form method="post">
        @csrf


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Galeria</div>
                    <div class="card-body">


                        <div class="form-group">
                            <label for="gallery_name">Nazwa</label>
                            <input id="gallery_name" name="gallery_name" type="text" placeholder="Nazwa"
                                   value="{{$item->gallery_name ?? old('gallery_name')}}"
                                   class="form-control {{ $errors->first('gallery_name') ? 'is-invalid' : '' }}">
                            @if($errors->first('gallery_name'))
                                <div class="invalid-feedback">
                                    {{$errors->first('gallery_name')}}
                                </div>
                            @endif
                        </div>

                        <hr>

                        <button type="submit" class="btn btn-primary">Zapisz</button>

                    </div>
                </div>
            </div>
        </div>


    </form>





@endsection
