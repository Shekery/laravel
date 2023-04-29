@extends('DocumentTemplateUsers.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Просмотр типа документа</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('documentTemplateUsers.create_with_id', ['document_template_id' => $document_template_id]) }}"> Добавить запись в шаблон</a>
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
            <th>Возможность мультивыбора</th>
            <th>Тип траффика</th>
            <th>Ознакомление</th>
            <th>Sign</th>
            <th>Действие</th>
        </tr>

        @foreach ($documentTemplateUsers as $documentTemplateUser)
            <tr>
                <td>{{ $documentTemplateUser->document_template_id }}</td>
                <td>{{ $documentTemplateUser->multiple_choice_select }}</td>
                <td>{{ $documentTemplateUser->type }}</td>
                <td>{{ $documentTemplateUser->know }}</td>
                <td>{{ $documentTemplateUser->sign }}</td>
                <td>
                    <form action="{{ route('documentTemplateUsers.destroy', $documentTemplateUser) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('documentTemplateUserRelations.show',['documentTemplateUserRelation' => $documentTemplateUser]) }}">Открыть</a>
                        <a class="btn btn-primary" href="{{ route('documentTemplateUsers.edit', $documentTemplateUser) }}">Изменить</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
