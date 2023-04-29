@extends('DocumentTemplateFiles.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Просмотр шаблона поля</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('documentTemplateFiles.create_with_id', ['document_template_id' => $document_template_id]) }}"> Добавить запись</a>
                <a class="btn btn-primary" href="{{ route('documentTemplates.show', $documentTypeId) }}"> Назад</a>
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
            <th>Код поля в шаблоне документа</th>
            <th>Подписанный договор</th>
            <th>Действие</th>
        </tr>

        @foreach ($documentTemplateFiles as $documentTemplateFile)
            <tr>
                <td>{{ $documentTemplateFile->document_template_id }}</td>
                <td>{{ $documentTemplateFile->signed_contract }}</td>
                <td>
                    <form action="{{ route('documentTemplateFiles.destroy', $documentTemplateFile) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('documentTemplateUserRelations.show',['documentTemplateUserRelation' => $documentTemplateFile]) }}">Открыть</a>
                    <a class="btn btn-primary" href="{{ route('documentTemplateFiles.edit', $documentTemplateFile) }}">Изменить</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
