@extends('ColumnTypes.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Типы полей</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('columnTypes.create') }}"> Создать поле</a>
                <a class="btn btn-primary" href="{{ route('welcome') }}"> Назад</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Тип</th>
            <th>Классы</th>
            <th>Тип шаблона</th>
            <th>Тип input</th>
            <th>Значения</th>
            <th>Классы блоков</th>
            <th width="280px">Действия</th>
        </tr>

        @foreach ($columnTypes as $columnType)
            <tr>
                <td>{{ $columnType->id }}</td>
                <td>{{ $columnType->name }}</td>
                <td>{{ $columnType->type }}</td>
                <td>{{ $columnType->classes }}</td>
                <td>{{ $columnType->type_template }}</td>
                <td>{{ $columnType->type_input }}</td>
                <td>{{ $columnType->select_options }}</td>
                <td>{{ $columnType->div_row_classes }}</td>
                <td>
                    <form action="{{ route('columnTypes.destroy',$columnType) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('columnTypes.edit',$columnType) }}">Изменить</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
