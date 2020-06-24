@extends('layouts.administrator')
@section('content')


    <form method="post">
        @csrf


        <div class="panel-heading">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i> Zapisz wszystko</button>
            <div>
                <a href="{{route('administrator.field.add-field', ['id_page' => $id_page, 'type' => 'input'])}}"
                   onclick="return confirm('Zapisałeś zmiany?')"
                   class="btn btn-outline-primary"><i class="fa fa-plus mr-2"></i> Dodaj pole nagłówka</a>
                <a href="{{route('administrator.field.add-field', ['id_page' => $id_page, 'type' => 'text'])}}"
                   onclick="return confirm('Zapisałeś zmiany?')"
                   class="btn btn-outline-primary"><i class="fa fa-plus mr-2"></i> Dodaj pole tekstu</a>
            </div>
        </div>


        @foreach($items as $item)
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-content-center">
                    <b>{{$item->field_name}}</b>
                    <a href="{{route('administrator.field.delete', ['id_field' => $item->id_field])}}"
                       onclick="return confirm('Na pewno chcesz usunąć ten element?')"
                       class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                </div>
                <div class="card-body">
{{--                    <div class="form-group">--}}
{{--                        <div class="d-flex justify-content-between">--}}
{{--                            <label for="field_name_{{$item->id_field}}">Nazwa</label>--}}

{{--                        </div>--}}
{{--                        <input id="field_name_{{$item->id_field}}" name="fields[{{$item->id_field}}][field_name]" type="text"--}}
{{--                               placeholder="Nazwa"--}}
{{--                               value="{{old('fields.'.$item->id_field.'.field_name') ?? $item->field_name}}"--}}
{{--                               class="form-control {{ $errors->first('fields.'.$item->id_field.'.field_name') ? 'is-invalid' : '' }}">--}}

{{--                        @if($errors->first('fields.'.$item->id_field.'.field_name'))--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                {{$errors->first('fields.'.$item->id_field.'.field_name')}}--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}

                    <div class="form-group">
                        <label for="field_value_{{$item->id_field}}">Tekst</label>
                        @if($item->field_type == 'input')
                            <input id="field_value_{{$item->id_field}}" name="fields[{{$item->id_field}}][field_value]" type="text"
                                   placeholder="Nazwa"
                                   value="{{old('fields.'.$item->id_field.'.field_value') ?? $item->field_value}}"
                                   class="form-control {{ $errors->first('fields.'.$item->id_field.'.field_value') ? 'is-invalid' : '' }}">
                            @if($errors->first('fields.'.$item->id_field.'.field_value'))
                                <div class="invalid-feedback">
                                    {{$errors->first('fields.'.$item->id_field.'.field_value')}}
                                </div>
                            @endif
                        @elseif($item->field_type == 'text')
                            <textarea name="fields[{{$item->id_field}}][field_value]" id="field_value_{{$item->id_field}}"
                                      class="form-control ckeditor {{ $errors->first('fields.'.$item->id_field.'.field_value') ? 'is-invalid' : '' }}"
                                      rows="10">{{old('fields.'.$item->id_field.'.field_value') ?? $item->field_value}}
                                </textarea>
                            @if($errors->first('fields.'.$item->id_field.'.field_value'))
                                <div class="invalid-feedback">
                                    {{$errors->first('fields.'.$item->id_field.'.field_value')}}
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>


        @endforeach

        @if(count($items) == 0)
            <div class="card mb-4">
                <div class="card-body">
                    <p>Brak pól</p>
                </div>
            </div>
        @endif


        <div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i> Zapisz wszystko</button>
        </div>


    </form>

@endsection
