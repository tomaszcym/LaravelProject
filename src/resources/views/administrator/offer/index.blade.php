@extends('layouts.administrator')
@section('content')


    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Oferta
            <div>
                <a href="{{route('administrator.offer.edit')}}" class="btn btn-sm btn-info">
                    Nowa oferta <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tytuł</th>
                        <th>Wprowadzenie</th>
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
                            <td>{{$item->offer_title}}</td>
                            <td>
                                <small>{!! $item->offer_lead !!}</small>
                            </td>
                            <td>
                                @if($item->offer_status)
                                    <small>Tak</small>
                                @else
                                    <small>Nie</small>
                                @endif
                            </td>
                            <td class="text-right" style="min-width: 260px">
                                <a href="{{route('administrator.gallery.index', ['source_table' => 'offer', 'source_id' => $item->id_offer])}}"
                                   class="btn btn-outline-info btn-sm">Galerie</a>
                                <a href="{{route('administrator.offer.edit', ['id_offer' => $item->id_offer])}}"
                                   class="btn btn-info btn-sm">Edytuj</a>
                                <a href="{{route('administrator.offer.delete', ['id_offer' => $item->id_offer])}}"
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
