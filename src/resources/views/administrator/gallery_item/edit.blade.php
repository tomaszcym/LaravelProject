@extends('layouts.administrator')
@section('content')


    <form method="post" enctype="multipart/form-data">
        @csrf


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Galeria - zdjęcie</div>
                    <div class="card-body">

                        @if($item)
                            <p>Aktualne zdjęcie</p>
                            <img src="{{ RenderImage($item->gallery_item_src, 60) }}" alt="test" class="mb-4"
                                 style="width: 200px;">
                        @endif

                        <div class="form-group">


                            <label for="gallery_item_src">Zdjęcie</label>
                            <input type="file" id="gallery_item_src" name="gallery_item_src[]"
                                   class="form-control-file {{ $errors->first('gallery_item_src') ? 'is-invalid' : '' }}"
                                   value="{{old('gallery_item_src')}}" multiple>
                            @if($errors->first('gallery_item_src'))
                                <div class="invalid-feedback">
                                    {{$errors->first('gallery_item_src')}}
                                </div>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="gallery_item_title">Nazwa</label>
                            <input id="gallery_item_title" name="gallery_item_title" type="text" placeholder="Nazwa"
                                   value="{{$item->gallery_item_title ?? old('gallery_item_title')}}"
                                   class="form-control {{ $errors->first('gallery_item_title') ? 'is-invalid' : '' }}">
                            @if($errors->first('gallery_item_title'))
                                <div class="invalid-feedback">
                                    {{$errors->first('gallery_item_title')}}
                                </div>
                            @endif
                        </div>


                        <div class="form-check">
                            <input type="checkbox" id="gallery_item_status" name="gallery_item_status" placeholder="Status"
                                   class="form-check-input"
                                   {{ $item ? $item->gallery_item_status ? 'checked' : '' : old('gallery_item_status') != null ?? '' }}
                                   value="1">
                            <label for="gallery_item_status" class="form-check-label">Publikuj</label>
                        </div>

                        <hr>

                        <button type="submit" class="btn btn-primary">Zapisz</button>

                    </div>
                </div>
            </div>
        </div>


    </form>





@endsection
