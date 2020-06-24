@extends('layouts.administrator')
@section('content')


    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Strony
            <div>
                <a href="{{route('administrator.page.edit')}}" class="btn btn-sm btn-info">
                    Nowa strona <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nazwa</th>
                        <th>Moduł</th>
                        <th>Adres</th>
                        <th>Publikuj</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 0 ?>
                    @foreach($items as $key => $item)
                        <?php $i++ ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$item->page_name}}</td>
                            <td>{{$item->page_module}}</td>
                            <td>
                                @if($item->page_status)
                                    @if($item->page_module == 'offer')
                                        <a href="{{route('offer.index')}}"
                                           target="_blank">
                                            {{$item->url}}
                                        </a>
                                    @elseif($item->page_module == 'realization')
                                        <a href="{{route('realization.index')}}"
                                           target="_blank">
                                            {{$item->url}}
                                        </a>
                                    @else
                                        <a href="{{route('page.show.'. ($item->url == '/' ? 'home' : str_replace('/', '.', $item->url)))}}"
                                           target="_blank">
                                            {{$item->url}}
                                        </a>
                                    @endif
                                @else
                                    {{$item->url}}
                                @endif
                            </td>
                            <td>
                                @if($item->page_status)
                                    <small>Tak</small>
                                @else
                                    <small>Nie</small>
                                @endif
                            </td>
                            <td class="text-right" style="min-width: 260px">
                                <a href="{{route('administrator.gallery.index', ['source_table' => 'page', 'source_id' => $item->id_page])}}"
                                   class="btn btn-outline-info btn-sm">Galerie</a>
                                <a href="{{route('administrator.field.edit', ['id_page' => $item->id_page])}}"
                                   class="btn btn-outline-info btn-sm">Teksty</a>
                                <a href="{{route('administrator.page.edit', ['id_page' => $item->id_page])}}"
                                   class="btn btn-info btn-sm">Edytuj</a>
                                <a href="{{route('administrator.page.delete', ['id_page' => $item->id_page])}}"
                                   onclick="return confirm('Na pewno chcesz usunąć ten element?')"
                                   class="btn btn-danger btn-sm">Usuń</a>
                            </td>
                        </tr>
                    @endforeach

                    @if(count($items) == 0)
                        <tr>
                            <td colspan="100">Brak stron</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>


@endsection
