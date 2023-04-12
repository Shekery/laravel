@extends('DocumentTypes.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Типы документов</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('DocumentTypes.create') }}"> Создать тип документа</a>
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
            <th>Стартовый номер</th>
            <th>Тип трафика</th>
            <th>Код поля Тема</th>
            <th>Код поля Текст</th>
            <th>Код организации</th>
            <th>Инструкция</th>
            <th>Возможность клонировать</th>
            <th>Возможность добавить в работу</th>
            <th width="280px">Действия</th>
        </tr>

        @foreach ($DocumentTypes as $document_type)
            <tr>
                <td>{{ $document_type->id }}</td>
                <td>{{ $document_type->name }}</td>
                <td>{{ $document_type->start_number }}</td>
                <td>{{ $document_type->type_traffic }}</td>
                <td>{{ $document_type->id_design_name_doc }}</td>
                <td>{{ $document_type->id_design_comment }}</td>
                <td>{{ $document_type->code_organization }}</td>
                <td>{{ $document_type->instruct_file }}</td>
                <td>{{ $document_type->ability_to_clone }}</td>
                <td>{{ $document_type->ability_to_work }}</td>
                <td>
                    <form action="{{ route('DocumentTypes.destroy',$document_type) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('DocumentTypes.edit',$document_type) }}">Изменить</a>
                        <a class="btn btn-info" href="{{ route('DocumentTypes.show',$document_type) }}">Открыть</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
