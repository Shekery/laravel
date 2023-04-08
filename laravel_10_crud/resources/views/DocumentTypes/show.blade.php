@extends('DocumentTypes.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Document types</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('DocumentTypes.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $documentType->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Start number:</strong>
                {{ $documentType->start_number }}
            </div>
        </div>
    </div>
@endsection
