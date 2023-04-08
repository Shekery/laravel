@extends('DocumentTypes.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>How To Create CRUD Operation In Laravel 10 - Techsolutionstuff</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('DocumentTypes.create') }}"> Create New Document type</a>
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
            <th>No</th>
            <th>Name</th>
            <th>Start number</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($document_types as $document_type)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $document_type->name }}</td>
                <td>{{ $document_type->start_number }}</td>
                <td>
                    <form action="{{ route('DocumentTypes.destroy',$document_type->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('DocumentTypes.edit',$document_type->id) }}">Edit</a>
                        <a class="btn btn-info" href="{{ route('DocumentTypes.show',$document_type->id) }}">Show</a>



                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $document_types->links() !!}

@endsection
