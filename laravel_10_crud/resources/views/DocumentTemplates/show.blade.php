@extends('DocumentTemplates.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Просмотр шаблона документа</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('documentTemplates.create_with_id', ['document_type_id' => $document_type_id]) }}"> Добавить запись в шаблон</a>
                <a class="btn btn-primary" href="{{ route('documentTypes.index') }}"> Назад</a>
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
            <th>Код типа документа</th>
            <th>Наименование поля</th>
            <th>Порядковый номер</th>
            <th>Префикс имени таблицы</th>
            <th>Действия</th>
        </tr>

        @foreach ($documentTemplates as $documentTemplate)
            <tr>
                <td>{{ $documentTemplate->document_type_id }}</td>
                <td>{{ $documentTemplate->name }}</td>
                <td>{{ $documentTemplate->sort }}</td>
                <td>{{ $documentTemplate->prefix_table }}</td>
                <td>
                    <form action="{{ route('documentTemplates.destroy', $documentTemplate) }}" method="POST">
                        @if ($documentTemplate->prefix_table == 'traffic')
                            <a class="btn btn-info" href="{{ route('documentTemplateUsers.show', ['documentTemplateUser' => $documentTemplate]) }}">Открыть</a>
                        @elseif ($documentTemplate->prefix_table == 'doc_view')
                            <a class="btn btn-info" href="{{ route('documentTemplateColumns.show', ['documentTemplateColumn' => $documentTemplate]) }}">Открыть</a>
                        @elseif ($documentTemplate->prefix_table == 'files')
                            <a class="btn btn-info" href="{{ route('documentTemplateFiles.show', ['documentTemplateFile' => $documentTemplate]) }}">Открыть</a>
                        @endif
                        <a class="btn btn-primary" href="{{ route('documentTemplates.edit', $documentTemplate) }}">Изменить</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
