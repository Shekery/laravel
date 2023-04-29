@extends('DocumentTypes.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Типы документов</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('documentTypes.create') }}"> Создать тип документа</a>
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

        @foreach ($documentTypes as $documentType)
            <tr>
                <td>{{ $documentType->id }}</td>
                <td>{{ $documentType->name }}</td>
                <td>{{ $documentType->start_number }}</td>
                <td>{{ $documentType->type_traffic }}</td>
                <td>{{ $documentType->id_design_name_doc }}</td>
                <td>{{ $documentType->id_design_comment }}</td>
                <td>
                    {{ $documentType->organization_id }}
                    <a class="btn btn-info" style="float: right" href="{{ route('organizations.show', ['organization' => $documentType]) }}">Открыть</a>
                </td>
                <td>{{ $documentType->instruct_file }}</td>
                <td>{{ $documentType->ability_to_clone }}</td>
                <td>{{ $documentType->ability_to_work }}</td>
                <td>
                    <form action="{{ route('documentTypes.destroy',$documentType) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('documentTypes.edit',$documentType) }}">Изменить</a>
                        <a class="btn btn-info" href="{{ route('documentTemplates.show', ['documentTemplate' => $documentType]) }}">Открыть</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
