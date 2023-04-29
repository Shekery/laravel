@extends('ColumnTypes.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Изменение поля</h2>
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

    <form action="{{ route('columnTypes.update', $columnType->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Название:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Название" value="{{ $columnType->name }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Тип:</strong>
                    <select class="form-control" name="type">
                        <option value="-1" {{ $columnType->type === -1 ? 'selected' : '' }}>Выберите</option>
                        <option value="input" {{ $columnType->type === 'input' ? 'selected' : '' }}>input</option>
                        <option value="textarea" {{ $columnType->type === 'textarea' ? 'selected' : '' }}>textarea</option>
                        <option value="select" {{ $columnType->type === 'select' ? 'selected' : '' }}>select</option>
                        <option value="level_manager" {{ $columnType->type === 'level_manager' ? 'selected' : '' }}>level_manager</option>
                        <option value="exterior" {{ $columnType->type === 'exterior' ? 'selected' : '' }}>exterior</option>
                        <option value="label" {{ $columnType->type === 'label' ? 'selected' : '' }}>label</option>
                        <option value="checkbox_access" {{ $columnType->type === 'checkbox_access' ? 'selected' : '' }}>checkbox_access</option>
                        <option value="checkbox_access1" {{ $columnType->type === 'checkbox_access1' ? 'selected' : '' }}>checkbox_access1</option>
                        <option value="table_part" {{ $columnType->type === 'table_part' ? 'selected' : '' }}>table_part</option>
                        <option value="loading_btn" {{ $columnType->type === 'loading_btn' ? 'selected' : '' }}>loading_btn</option>
                        <option value="contracts_info" {{ $columnType->type === 'contracts_info' ? 'selected' : '' }}>contracts_info</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Классы:</strong>
                    <input type="text" name="classes" class="form-control" placeholder="Классы" value="{{ $columnType->classes }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Тип шаблона:</strong>
                    <input type="text" name="type_template" class="form-control" placeholder="Тип шаблона" value="{{ $columnType->type_template }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Тип input:</strong>
                    <select class="form-control" name="type_input">
                        <option value="-1" {{ $columnType->type_input === -1 ? 'selected' : '' }}>Выберите</option>
                        <option value="text" {{ $columnType->type_input === 'text' ? 'selected' : '' }}>text</option>
                        <option value="number" {{ $columnType->type_input === 'number' ? 'selected' : '' }}>number</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Значения:</strong>
                    <input type="text" name="select_options" class="form-control" placeholder="Значения" value="{{ $columnType->select_options }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Классы блоков:</strong>
                    <input type="text" name="div_row_classes" class="form-control" placeholder="Классы блоков" value="{{ $columnType->div_row_classes }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Обновить</button>
            </div>
        </div>

    </form>
@endsection
