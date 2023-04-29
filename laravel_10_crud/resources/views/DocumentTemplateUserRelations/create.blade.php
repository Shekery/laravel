@extends('DocumentTemplateUserRelations.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Создание записи в фиксированный траффик</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('documentTemplateUserRelations.show', $document_templates_user_id) }}"> Назад</a>
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

    <form action="{{ route('documentTemplateUserRelations.store') }}" method="POST">
        @csrf
        <div class="row">
            <input type="hidden" name="document_templates_user_id" value="{{$document_templates_user_id}}">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Код пользователя:</strong>
                    <input type="number" name="user_id" class="form-control" placeholder="Код пользователя">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </div>

    </form>
@endsection
