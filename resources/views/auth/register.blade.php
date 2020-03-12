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
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">

                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>

                    <form>
                        @csrf

                        <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('commons.id') }}</label>

                            <div class="col-md-6">
                                <input id="id" type="number" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id') }}" required autocomplete="id" autofocus>

                                @error('id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('commons.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastName1" class="col-md-4 col-form-label text-md-right">{{ __('commons.lastName1') }}</label>

                            <div class="col-md-6">
                                <input id="lastName1" type="text" class="form-control @error('lastName1') is-invalid @enderror" name="lastName1" value="{{ old('lastName1') }}" required autocomplete="lastName1" autofocus>

                                @error('lastName1')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastName2" class="col-md-4 col-form-label text-md-right">{{ __('commons.lastName2') }}</label>

                            <div class="col-md-6">
                                <input id="lastName2" type="text" class="form-control @error('lastName2') is-invalid @enderror" name="lastName2" value="{{ old('lastName2') }}" required autocomplete="lastName2" autofocus>

                                @error('lastName2')
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

                        <!--address-->
                        <div class="form-group row">
                            <label for="address1" class="col-md-4 col-form-label text-md-right">{{ __('commons.address') }}</label>

                            <div class="col-md-6">
                                <input id="address1" type="text" class="form-control @error('address1') is-invalid @enderror" name="address1" value="{{ old('address1') }}" required autocomplete="address1" autofocus>

                                @error('address1')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('commons.phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('commons.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email-confirm" class="col-md-4 col-form-label text-md-right">{{ __('commons.emailConfirm') }}</label>

                            <div class="col-md-6">
                                <input id="emailconfirm" type="email" class="form-control" name="emailconfirm" value="{{ old('email_confirmation ') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('commons.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('commons.passwordConfirm') }}</label>

                            <div class="col-md-6">
                                <input id="passwordconfirm" type="password" class="form-control" name="passwordconfirm" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
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

        $("#province").on('click change',function(e){
            e.preventDefault();

            var province = $('select[name="province"]').val();

            $.ajax({
                url: '/registerCanton',
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
                url: '/registerDistrict',
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

            var id = $('input[name="id"]').val();
            var name = $('input[name="name"]').val();
            var lastName1 = $('input[name="lastName1"]').val();
            var lastName2 = $('input[name="lastName2"]').val();
            var province = $('select[name="province"]').val();
            var canton = $('select[name="canton"]').val();
            var district  = $('select[name="district"]').val();
            var address1 = $('input[name="address1"]').val();
            var phone = $('input[name="phone"]').val();
            var email = $('input[name="email"]').val();
            var email_confirmation = $("input[name='emailconfirm']").val();
            var password = $('input[name="password"]').val();
            var password_confirmation = $("input[name='passwordconfirm']").val();

            $.ajax({
                url: '/registerUser',
                method: "POST",
                data:{_token: _token, id: id, name: name, lastName1: lastName1, lastName2: lastName2, province: province, canton: canton, district: district, address1: address1, phone: phone, email: email, email_confirmation: email_confirmation, password: password, password_confirmation: password_confirmation},
                success: function(data)
                {
                    if($.isEmptyObject(data.error)){
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

    });
</script>
