@extends('ColumnTypes.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Просмотр шаблона поля</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('documentTemplateColumns.show', $document_template_id) }}"> Назад</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Имя</th>
            <th>Тип</th>
            <th>Классы</th>
            <th>Тип шаблона</th>
            <th>Тип вводимого поля</th>
            <th>Опции</th>
            <th>Классы для div</th>
        </tr>

        @foreach ($columnTypes as $columnType)
            <tr>
                <td>{{ $columnType->name }}</td>
                <td>{{ $columnType->type }}</td>
                <td>{{ $columnType->classes }}</td>
                <td>{{ $columnType->type_template }}</td>
                <td>{{ $columnType->type_input }}</td>
                <td>{{ $columnType->select_options }}</td>
                <td>{{ $columnType->div_row_classes }}</td>
            </tr>
        @endforeach
    </table>
@endsection
