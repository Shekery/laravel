@extends('Organizations.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Типы организаций</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('organizations.create') }}"> Создать организацию</a>
                <a class="btn btn-primary" href="{{ route('welcome') }}"> Назад</a>
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
            <th>ID</th>
            <th>Название</th>
            <th>Аббревиатура</th>
            <th>Действия</th>
        </tr>

        @foreach ($organizations as $organization)
            <tr>
                <td>{{ $organization->id }}</td>
                <td>{{ $organization->name }}</td>
                <td>{{ $organization->abbreviation }}</td>
                <td>
                    <form action="{{ route('organizations.destroy',$organization) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('organizations.edit',$organization) }}">Изменить</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
