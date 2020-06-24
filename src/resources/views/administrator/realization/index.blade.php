@extends('layouts.administrator')
@section('content')


    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Realizacje
            <div>
                <a href="{{route('administrator.realization.edit')}}" class="btn btn-sm btn-info">
                    Nowa opinia <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tytuł</th>
                        <th>Autor</th>
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
                            <td>{{$item->realization_title}}</td>
                            <td>
                                <small>{!! $item->realization_lead !!}</small>
                            </td>
                            <td>
                                @if($item->realization_status)
                                    <small>Tak</small>
                                @else
                                    <small>Nie</small>
                                @endif
                            </td>
                            <td class="text-right" style="min-width: 260px">
{{--                                <a href="{{route('administrator.gallery.index', ['source_table' => 'realization', 'source_id' => $item->id_realization])}}"--}}
{{--                                   class="btn btn-outline-info btn-sm">Galerie</a>--}}
                                <a href="{{route('administrator.realization.edit', ['id_realization' => $item->id_realization])}}"
                                   class="btn btn-info btn-sm">Edytuj</a>
                                <a href="{{route('administrator.realization.delete', ['id_realization' => $item->id_realization])}}"
                                   onclick="return confirm('Na pewno chcesz usunąć ten element?')"
                                   class="btn btn-danger btn-sm">Usuń</a>
                            </td>
                        </tr>
                    @endforeach

                    @if(count($items) == 0)
                        <tr>
                            <td colspan="100">Brak realizacji</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>


@endsection
