@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('commons.reportAnIncident') }}</div>

                <div class="card-body">

                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>

                    <form id="ReportAnIncident">
                        @csrf
                        <div class="form-group row">
                                <label for="id"class="col-md-4 col-form-label text-md-right">{{ __('commons.id') }}</label>
                                <div class="col-md-6">
                                    <input id="id" type="number" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ Auth::user()->id }}" required disabled>

                                    @error('id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="name"class="col-md-4 col-form-label text-md-right">{{ __('commons.fullName') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }} {{ Auth::user()->lastName1 }}" required disabled>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('commons.category') }}</label>

                            <div class="col-md-6">
                                <select id="category" name="category" class="form-control @error('category') is-invalid @enderror">
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>

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
                                <select id="company" name="company" class="form-control @error('company') is-invalid @enderror">
                                    @foreach($companies as $comp)
                                        <option value="{{$comp->id}}">{{$comp->name}}</option>
                                    @endforeach
                                </select>

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
                                <select id="province" name="province" class="form-control @error('province') is-invalid @enderror">
                                   @foreach($provinces as $prov)
                                        <option value="{{$prov->id}}">{{$prov->name}}</option>
                                    @endforeach
                                </select>

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
                                <select id="canton" name="canton" class="form-control @error('canton') is-invalid @enderror" disabled>
                                </select>

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
                                <select id="district" name="district" class="form-control @error('district') is-invalid @enderror" disabled>
                                </select>

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
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

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
                                <p id="location"></p>
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
                                <textarea id="details" class="form-control row-cols-2 @error('details') is-invalid @enderror" name="details" value="{{ old('details') }}" required autocomplete="details" autofocus></textarea>

                                @error('details')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary btn-submit" id="btn-submit" name="btn-submit">
                                    {{ __('commons.register') }}
                                </button>
                            </div>
                        </div>

                    </form>
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
        var location = document.getElementById("location");

        getLocation();

        $("#province").on('click change',function(e){
            e.preventDefault();

            var province = $('select[name="province"]').val();

            $.ajax({
                url: '/incidentCanton',
                method: "POST",
                data:{_token: _token, province: province},
                success: function(data)
                {
                    clearSelect("#canton");
                    clearSelect("#district");
                    populateSelect(data,"#canton");
                }
            })
        });

        $("#canton").on('click change',function(e){
            e.preventDefault();

            var canton = $('select[name="canton"]').val();

            $.ajax({
                url: '/incidentDistrict',
                method: "POST",
                data:{_token: _token, canton: canton},
                success: function(data)
                {
                    clearSelect("#district");
                    populateSelect(data,"#district");
                }
            })
        });

        $("#btn-submit").on('click', function(e){
            e.preventDefault();

            form = new FormData();
            form.append('_token',_token);
            form.append('user',$('input[name="id"]').val());
            form.append('category',$('select[name="category"]').val());
            form.append('company',$('select[name="company"]').val());
            form.append('province',$('select[name="province"]').val());
            form.append('canton',$('select[name="canton"]').val());
            form.append('district',$('select[name="district"]').val());
            form.append('address', $('input[name="address"]').val());
            form.append('latitude', 0.01);
            form.append('longitude', 0.02);
            form.append('pictures', Object.values($('#images')[0].files));
            form.append('details', $("textarea[name='details']").val());

            $.ajax({
                url: '/registerIncidentReport',
                method: "POST",
                data: form,
                contentType: false, //si no se desactiva el contentType los datos correctamente en el servidor
                processData: false,
                success: function(data)
                {
                    if(!$.isEmptyObject(data.error)){
                        printMsg(data, true);
                    }else{
                        printMsg(data, false);
                    }
                }
            })
        });

        function populateSelect(data, name)
        {
            $(name).find("select").html();
            $.each(data, function(key, value) {
                $(name).append('<option value="' + key + '">' + value + '</option>');
            });
            $(name).removeAttr('disabled');
        }

        function clearSelect(name)
        {
            $(name).find('option').remove().html();
            $(name).attr('disabled', 'disabled');
        }

        function printMsg(msg, success){
            if (success == true)
                $(".print-error-msg").removeClass("alert-danger").addClass("alert-success");
            else
                $(".print-error-msg").removeClass("alert-success").addClass("alert-danger");

            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $.each( value, function (keyVal, val){
                    $(".print-error-msg").find("ul").append('<li>'+val+'</li>');
                });
            });
        }

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                location.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            var latlon = position.coords.latitude + "," + position.coords.longitude;
            var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="+latlon+"&markers=color:red%7Clabel:H%7C" + latlon + "&zoom=15&marker=true&&size=400x300&sensor=false&key={{ $keys }}";
            document.getElementById("location").innerHTML = "<img src='"+img_url+"'>";
        }

    });


    </script>

<script>

</script>
