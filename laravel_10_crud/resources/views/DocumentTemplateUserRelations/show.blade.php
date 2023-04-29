@extends('DocumentTemplateUserRelations.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Просмотр фиксированного траффика</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('documentTemplateUserRelations.create_with_id', ['document_templates_user_id' => $document_templates_user_id]) }}"> Добавить запись в шаблон</a>
                <a class="btn btn-primary" href="{{ route('documentTemplateUsers.show', $document_template_id) }}"> Назад</a>
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
            <th>Код поля траффика в шаблоне</th>
            <th>Код пользователя</th>
            <th>Действие</th>
        </tr>

        @foreach ($documentTemplateUserRelations as $documentTemplateUserRelation)
            <tr>
                <td>{{ $documentTemplateUserRelation->document_templates_user_id }}</td>
                <td>{{ $documentTemplateUserRelation->user_id }}</td>
                <td>
                    <form action="{{ route('documentTemplateUserRelations.destroy', $documentTemplateUserRelation) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('documentTemplateUserRelations.edit', $documentTemplateUserRelation) }}">Изменить</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
