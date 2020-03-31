@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Incident Update') }}</div>

                <input type="hidden" name="idUser" id="idUser" value="{{ Auth::user()->id }}"/>

                <div class="card-body">

                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <table id="tb_incidents" class="display" style="width: 100%">
                        <thead>
                        <tr>
                            <th>{{__('commons.category')}}</th>
                            <th>{{__('commons.company')}}</th>
                            <th>{{__('commons.province')}}</th>
                            <th>{{__('commons.canton')}}</th>
                            <th>{{__('commons.district')}}</th>
                            <th>{{__('commons.address')}}</th>
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


    <!--FORM INCIDENT -->
    <div class="row">
        <div class="col-md-12">
            <div class="modal fade" id="modalIncident" role="dialog" aria-hidden="true">
                <div class="modal-dialog normal">
                    <div class="modal-content normal">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body normal">

                            <div class="alert alert-danger print-error-msg" style="display:none">
                                <ul></ul>
                            </div>

                            <form>
                                @csrf
                                <div class="form-group row">
                                    <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('commons.category') }}</label>

                                    <div class="col-md-6">
                                        <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="" disabled>

                                        @error('category')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="company" class="col-md-4 col-form-label text-md-right">{{ __('commons.company') }}</label>

                                    <div class="col-md-6">
                                        <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="" disabled>

                                        @error('company')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </div>
                                </div>

                                <!--Province-->
                                <div class="form-group row">
                                    <label for="province" class="col-md-4 col-form-label text-md-right">{{ __('commons.province') }}</label>

                                    <div class="col-md-6">
                                        <input id="province" type="text" class="form-control @error('province') is-invalid @enderror" name="province" value="" disabled>

                                        @error('province')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <!--canton-->
                                <div class="form-group row">
                                    <label for="canton" class="col-md-4 col-form-label text-md-right">{{ __('commons.canton') }}</label>

                                    <div class="col-md-6 canton">
                                        <input id="canton" type="text" class="form-control @error('canton') is-invalid @enderror" name="canton" value="" disabled>

                                        @error('canton')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <!--district-->
                                <div class="form-group row">
                                    <label for="district" class="col-md-4 col-form-label text-md-right">{{ __('commons.district') }}</label>

                                    <div class="col-md-6">
                                        <input id="district" type="text" class="form-control @error('district') is-invalid @enderror" name="district" value="" disabled>

                                        @error('district')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('commons.address') }}</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="" disabled>

                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="georeference" class="col-md-4 col-form-label text-md-right">{{ __('commons.georeference') }}</label>

                                    <div class="col-md-6">

                                        @error('georeference')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="images" class="col-md-4 col-form-label text-md-right">{{ __('commons.images') }}</label>

                                    <div class="col-md-6">
                                        <input id="images" type="file" accept="image/x-png,image/jpeg" class="form-control-file @error('images') is-invalid @enderror" name="images" multiple required>

                                        @error('images')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="details" class="col-md-4 col-form-label text-md-right">{{ __('commons.details') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="details" class="form-control row-cols-2 @error('details') is-invalid @enderror" name="details" value="" disabled></textarea>

                                        @error('details')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('commons.state') }}</label>

                                    <div class="col-md-6">

                                        @error('state')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button id="btnActualizar" type="button" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var _token = $('input[name="_token"]').val();
        var _user = $('input[name="idUser"]').val();
        updateData();

        function updateData(datos) {
            $("#tb_incidents body").empty();

            if (datos === undefined) {
                $.ajax({
                    url: "/loadIncidents",
                    data: {_token: _token, user: _user},
                    method: "POST",
                    success: function (data) {
                        $.each(data, function (i, row) {
                            $("#tb_incidents").append(rowPrepare(row));
                        });
                    }
                });
            }
        }

        function rowPrepare(rowData) {
            var row = "<tr>"
                + "<td>" + rowData.category + "</td>"
                + "<td>" + rowData.company + "</td>"
                + "<td>" + rowData.province + "</td>"
                + "<td>" + rowData.canton + "</td>"
                + "<td>" + rowData.district + "</td>"
                + "<td>" + rowData.address + "</td>";

            if(rowData.state=='1')
                row += "<td>Reportado</td>"
            else if(rowData.state=='2')
                row += "<td>En Proceso</td>"
            else
                row += "<td>Finalizado</td>"

            row+= "<td><button data-id='"+rowData.id+"' type='button' class='btn btn-primary ver' style='max-width:80px; max-height:30px;'>Ver</button>"
                + "</td>"
            return row += "</tr>";
        }
        /*$('#tb_incidents').DataTable({
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
                });*/

        $("#tb_incidents").delegate('.ver', 'click', function () {
            var id= $(this).attr('data-id');

            $.ajax({
                url: "/loadIncidentDetails",
                data: {_token: _token, id:  id},
                method: 'POST',
                success: function (data) {
                    $("#category").val(data.category);
                    $("#company").val(data.company);
                    $("#province").val(data.province);
                    $("#canton").val(data.canton);
                    $("#district").val(data.district);
                    $("#address").val(data.address);
                    $("#details").val(data.details);

                    $('#modalIncident').modal({
                        show: true,
                        backdrop: 'static'
                    });
                }
            });
        });
    });
    </script>
