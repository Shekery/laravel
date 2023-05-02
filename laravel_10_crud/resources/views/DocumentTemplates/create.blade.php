@extends('DocumentTemplates.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Создание записи в шаблон документа</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('documentTemplates.show', $document_type_id) }}"> Назад</a>
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

    <form action="{{ route('documentTemplates.store') }}" method="POST">
        @csrf
        <div class="row">
            <input type="hidden" name="document_type_id" value="{{$document_type_id}}">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Наименование поля:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Название">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Порядковый номер:</strong>
                    <input type="number" class="form-control" name="sort" placeholder="Стартовый номер">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Префикс имени таблицы:</strong>
                    <select class="form-control" name="prefix_table">
                        <option value="-1">Выберите</option>
                        <option value="files">files</option>
                        <option value="doc_view">doc_view</option>
                        <option value="traffic">traffic</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </div>

    </form>
@endsection
