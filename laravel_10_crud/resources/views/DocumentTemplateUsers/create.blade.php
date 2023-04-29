@extends('DocumentTemplateUsers.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Создание записи в шаблон документа</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('documentTemplateUsers.show', $document_template_id) }}"> Назад</a>
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

    <form action="{{ route('documentTemplateUsers.store') }}" method="POST">
        @csrf
        <div class="row">
            <input type="hidden" name="document_template_id" value="{{$document_template_id}}">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Возможность мультивыбора:</strong>
                    <select class="form-control" name="multiple_choice_select">
                        <option value="-1">Выберите</option>
                        <option value="1">Да</option>
                        <option value="0">Нет</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Тип траффика:</strong>
                    <input type="text" name="type" class="form-control" placeholder="Тип траффика">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ознакомление:</strong>
                    <select class="form-control" name="know">
                        <option value="-1">Выберите</option>
                        <option value="1">Да</option>
                        <option value="0">Нет</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sign:</strong>
                    <input type="number" name="sign" class="form-control" placeholder="Sign">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </div>

    </form>
@endsection
