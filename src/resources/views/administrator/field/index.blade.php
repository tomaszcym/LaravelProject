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
                        <th>Status</th>
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
                            <td>{{$item->url}}</td>
                            <td>{{$item->page_status}}</td>
                            <td class="text-right">
                                <a href="{{route('administrator.page.edit', ['id_page' => $item->id_page])}}"
                                   class="btn btn-info btn-sm">Edytuj</a>
                                <a href="{{route('administrator.page.delete', ['id_page' => $item->id_page])}}"
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
