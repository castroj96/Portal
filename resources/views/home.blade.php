@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form id="incidentReport" action="{{ route('incidentReport') }}" method="GET" style="display: block;">
                        @csrf
                        <input type="submit" class="btn btn-info" value="{{ __('commons.reportAnIncident') }}"/>
                    </form>

                    <br>

                    <form id="incidentReport" action="{{ route('incidentUpdate') }}" method="GET" style="display: block;">
                        @csrf
                        <input type="submit" class="btn btn-primary" value="{{ __('commons.SeeMyIncidentes') }}"/>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
