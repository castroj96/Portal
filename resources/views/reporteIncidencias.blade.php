@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <form role="form" method="post">
                        <div class="row">
                        <div class="col-md-6"><!--col-->
                            <div class="form-group">
                                <label for="id">ID</label>
                                <input type="number" class="form-control" id="id" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombre Completo</label>
                                <input type="text" class="form-control" id="nombre" />
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoría</label>
                            <select name="categoria" class="form-control">
                                <option selected disabled>Seleccione..</option>
                                <option value="1">Categoria 1</option>
                                <option value="2">Categoria 2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="empresa">Empresa</label>
                            <select name="empresa" class="form-control">
                                <option selected disabled>Seleccione..</option>
                                <option value="1">Empresa 1</option>
                                <option value="2">Empresa 2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="provincia">Provincia</label>
                            <select name="provincia" class="form-control">
                                <option selected disabled>Seleccione..</option>
                                <option value="1">San José</option>
                                <option value="2">Alajuela</option>
                                <option value="3">Heredia</option>
                                <option value="4">Cartago</option>
                                <option value="5">Guanacaste</option>
                                <option value="6">Puntarenas</option>
                                <option value="7">Limón</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="canton">Cantón</label>
                            <input type="text" class="form-control" id="canton" />
                        </div>
                        <div class="form-group">
                            <label for="distrito">Distrito</label>
                            <input type="text" class="form-control" id="distrito" />
                        </div>
                        <div class="form-group">
                            <label for="distrito">Dirección</label>
                            <textarea class="form-control"  rows="2" id="direccion"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="georeferencia">Georeferencia</label>

                        </div>
                        <div class="form-group">
                            <label for="imagenes">Fotografías</label>
                            <input type="file" class="form-control-file" accept="image/x-png,image/jpeg" id="imagenes" multiple>
                        </div>
                        <div class="form-group">
                            <label for="detalle">Detalle</label>
                            <textarea class="form-control"  rows="2" id="detalle"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" id="btnReportar">Reportar</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
