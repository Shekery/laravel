@extends('ColumnTypes.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Создание поля</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('columnTypes.index') }}"> Назад</a>
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

    <form action="{{ route('columnTypes.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Название:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Название">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Тип:</strong>
                    <select class="form-control" name="type">
                        <option value="-1">Выберите</option>
                        <option value="input">input</option>
                        <option value="textarea">textarea</option>
                        <option value="select">select</option>
                        <option value="level_manager">level_manager</option>
                        <option value="exterior">exterior</option>
                        <option value="label">label</option>
                        <option value="checkbox_access">checkbox_access</option>
                        <option value="checkbox_access1">checkbox_access1</option>
                        <option value="table_part">table_part</option>
                        <option value="loading_btn">loading_btn</option>
                        <option value="contracts_info">contracts_info</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Классы:</strong>
                    <input type="text" name="classes" class="form-control" placeholder="Классы">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Тип шаблона:</strong>
                    <input type="text" name="type_template" class="form-control" placeholder="Тип шаблона">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Тип input:</strong>
                    <select class="form-control" name="type_input">
                        <option value="-1">Выберите</option>
                        <option value="text">text</option>
                        <option value="number">number</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Значения:</strong>
                    <input type="text" name="select_options" class="form-control" placeholder="Значения">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Классы блоков:</strong>
                    <input type="text" name="div_row_classes" class="form-control" placeholder="Классы блоков">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </div>

    </form>
@endsection
