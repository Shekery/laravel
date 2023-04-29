@extends('DocumentTemplateFiles.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Создание шаблона поля</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('documentTemplateFiles.show', $document_template_id) }}"> Назад</a>
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

    <form action="{{ route('documentTemplateFiles.store') }}" method="POST">
        @csrf
        <div class="row">
            <input type="hidden" name="document_template_id" value="{{$document_template_id}}">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Подписанный договор:</strong>
                    <select class="form-control" name="signed_contract">
                        <option value="-1">Выберите</option>
                        <option value="1">Да</option>
                        <option value="0">Нет</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </div>

    </form>
@endsection
