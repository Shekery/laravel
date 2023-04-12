@extends('DocumentTypes.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Изменение типа документа</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('DocumentTypes.index') }}"> Назад</a>
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

    <form action="{{ route('DocumentTypes.update', $documentType->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Название:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Название" value="{{ $documentType->name }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Стартовый номер:</strong>
                    <input type="number" class="form-control" name="start_number" placeholder="Стартовый номер" value="{{ $documentType->start_number }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Тип трафика:</strong>
                    <select class="form-control" name="type_traffic">
                        <option selected value="-1">Выберите</option>
                        <option value="2">Последовательно</option>
                        <option value="1">Параллельно</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Код поля Тема:</strong>
                    <input type="number" class="form-control" name="id_design_name_doc" placeholder="Код поля Тема" value="{{ $documentType->id_design_name_doc }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Код поля Текст:</strong>
                    <input type="number" class="form-control" name="id_design_comment" placeholder="Код поля Текст" value="{{ $documentType->id_design_comment }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Код организации:</strong>
                    <input type="number" class="form-control" name="code_organization" placeholder="Код организации" value="{{ $documentType->code_organization }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Инструкция:</strong>
                    <input type="text" class="form-control" name="instruct_file" placeholder="Инструкция" value="{{ $documentType->instruct_file }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Возможность клонировать:</strong>
                    <select class="form-control" name="ability_to_clone">
                        <option selected value="-1">Выберите</option>
                        <option value="true">Да</option>
                        <option value="false">Нет</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Возможность добавить в работу:</strong>
                    <select class="form-control" name="ability_to_work">
                        <option selected value="-1">Выберите</option>
                        <option value="true">Да</option>
                        <option value="false">Нет</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Обновить</button>
            </div>
        </div>

    </form>
@endsection
