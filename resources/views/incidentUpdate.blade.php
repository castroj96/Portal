<!--
****************************************************************
* File: register.blade.php
* Description: This view is presenting the register blade form
*
****************************************************************
*   MM/DD/YYYY  (XXX)   Description
****************************************************************
*   02/28/2020  (JCR)   Created register view
*   03/04/2020  (ASR)   Added required inputs
*   03/10/2020  (JCR)   Added ajax requests
****************************************************************
-->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Incident Update') }}</div>

                <div class="card-body">

                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <table id="incidents" class="display" style="width: 100%">
                        <thead>
                        <tr>
                            <th>{{__('commons.category')}}</th>
                            <th>{{__('commons.company')}}</th>
                            <th>{{__('commons.province')}}</th>
                            <th>{{__('commons.canton')}}</th>
                            <th>{{__('commons.district')}}</th>
                            <th>{{__('commons.address')}}</th>
                            <th>{{__('commons.details')}}</th>
                            <th>{{__('commons.state')}}</th>
                            <th>{{__('commons.actions')}}</th>
                        </tr>
                        </thead>
                        <tfoot>

                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var _token = $('input[name="_token"]').val();

        $('#incidents').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "method": "POST",
                "url": "/loadIncidents",
                "data": {_token: _token, user: 702430859},
                },
            "columns": [
                { "data": "category" },
                { "data": "company" },
                { "data": "province" },
                { "data": "canton" },
                { "data": "district" },
                { "data": "address" },
                { "data": "state" },
                { "data": "id" }
            ]
        });
    });
    </script>
