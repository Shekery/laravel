@extends('DocumentTemplateUserRelations.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Изменение фиксированного траффика</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('documentTemplateUserRelations.show', $documentTemplateUserRelation->document_templates_user_id) }}"> Назад</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('documentTemplateUserRelations.update', $documentTemplateUserRelation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Код поля в шаблоне траффика:</strong>
                    <input type="number" name="document_templates_user_id" class="form-control" placeholder="Код поля в шаблоне траффика" value="{{ $documentTemplateUserRelation->document_templates_user_id }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Код пользователя:</strong>
                    <input type="text" name="user_id" class="form-control" placeholder="Код пользователя" value="{{ $documentTemplateUserRelation->user_id }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Обновить</button>
            </div>
        </div>

    </form>
@endsection
