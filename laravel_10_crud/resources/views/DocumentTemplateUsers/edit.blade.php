@extends('DocumentTemplateUsers.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Изменение шаблона документа</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('documentTemplateUsers.show', $documentTemplateUser->document_template_id) }}"> Назад</a>
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

    <form action="{{ route('documentTemplateUsers.update', $documentTemplateUser->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Код поля в шаблоне документа:</strong>
                    <input type="number" name="document_template_id" class="form-control" placeholder="Тип траффика" value="{{ $documentTemplateUser->document_template_id }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Возможность мультивыбора:</strong>
                    <select class="form-control" name="multiple_choice_select">
                        <option value="-1" {{ $documentTemplateUser->multiple_choice_select === -1 ? 'selected' : '' }}>Выберите</option>
                        <option value="1" {{ $documentTemplateUser->multiple_choice_select === 1 ? 'selected' : '' }}>Да</option>
                        <option value="0" {{ $documentTemplateUser->multiple_choice_select === 0 ? 'selected' : '' }}>Нет</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Тип траффика:</strong>
                    <input type="text" name="type" class="form-control" placeholder="Тип траффика" value="{{ $documentTemplateUser->type }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ознакомление:</strong>
                    <select class="form-control" name="know">
                        <option value="-1" {{ $documentTemplateUser->know === -1 ? 'selected' : '' }}>Выберите</option>
                        <option value="1" {{ $documentTemplateUser->know === 1 ? 'selected' : '' }}>Да</option>
                        <option value="0" {{ $documentTemplateUser->know === 0 ? 'selected' : '' }}>Нет</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sign:</strong>
                    <input type="number" name="sign" class="form-control" placeholder="Sign" value="{{ $documentTemplateUser->sign }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Обновить</button>
            </div>
        </div>

    </form>
@endsection
