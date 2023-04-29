@extends('Organizations.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Организация</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('documentTypes.index') }}"> Назад</a>
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
            <th>Имя</th>
            <th>Аббревиатура</th>
        </tr>

        @foreach ($organizations as $organization)
            <tr>
                <td>{{ $organization->id }}</td>
                <td>{{ $organization->name }}</td>
                <td>{{ $organization->abbreviation }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('documentTemplateUserRelations.show',['documentTemplateUserRelation' => $organization]) }}">Открыть</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
