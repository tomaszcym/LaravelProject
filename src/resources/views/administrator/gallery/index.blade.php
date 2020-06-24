@extends('layouts.administrator')
@section('content')

    <div class="panel-heading">
        Galerie strony - #{{$source_table}} #{{$source_id}}
        <div>
            <a href="{{route('administrator.gallery.edit', ['source_table' => $source_table, 'source_id' => $source_id])}}" class="btn btn-info">
                <i class="fa fa-plus mr-2"></i> Dodaj galerię</a>
        </div>
    </div>


    @foreach($items as $gallery)

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <small><b>Nazwa:</b></small> {{$gallery->gallery_name}}
                </div>
                <div>
                    <a href="{{route('administrator.gallery_item.add', ['id_gallery' => $gallery->id_gallery])}}"
                       class="btn btn-info btn-sm"><i class="fa fa-plus mr-2"></i> Dodaj zdjęcie</a>
                    <a href="{{route('administrator.gallery.delete', ['id_gallery' => $gallery->id_gallery])}}"
                       onclick="return confirm('Na pewno chcesz usunąć tę galerię?')"
                       class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Zdjęcie</th>
                        <th>Tytuł</th>
                        <th>Publikuj</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($gallery->items as $item)
                        <tr>
                            <td>
{{--                                <img src="{{asset('storage/image/'.$item->gallery_item_src)}}" alt="{{$item->gallery_item_title}}" class="thumb">--}}
                                <img src="{{ RenderImage($item->gallery_item_src, 60) }}" alt="alt" class="thumb">
                            </td>
                            <td>{{$item->gallery_item_title}}</td>
                            <td>
                                @if($item->gallery_item_status)
                                    <small>Tak</small>
                                @else
                                    <small>Nie</small>
                                @endif
{{--                                {{$item->gallery_item_status}}--}}
{{--                                <input type="checkbox"--}}
{{--                                       onchange="toggleStatus('{{route('administrator.toggle-status', ['table' => 'gallery_item', 'id' => $item->id_gallery])}}')"--}}
{{--                                    {{$item->gallery_item_status ? 'checked' : ''}}>--}}
                            </td>
                            <td class="text-right">
                                <a href="{{route('administrator.gallery_item.edit', ['id_gallery_item' => $item->id_gallery_item])}}"
                                   class="btn btn-info btn-sm">Edytuj</a>
                                <a href="{{route('administrator.gallery_item.delete', ['id_gallery_item' => $item->id_gallery_item])}}"
                                   class="btn btn-danger btn-sm">Usuń</a>
                            </td>
                        </tr>
                    @endforeach
                    @if(count($gallery->items) == 0)
                        <tr>
                            <td colspan="100">Brak zdjęć</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

    @endforeach

    @if(count($items) == 0)
        <div class="card">
            <div class="card-body">
                <p>Brak pól</p>
            </div>
        </div>
    @endif


@endsection
