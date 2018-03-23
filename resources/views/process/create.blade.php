@extends("layouts/main")
    @section("content")
<div class="row">

    <div class="col-12">
                        <div class="card">
                            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Cadastro de Tipo de Processo</h4>
                            </div>
                            <div class="card-body">
                            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                                <form action="{{url('process/create')}}" method='post'>
                                
                                {{csrf_field()}}
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Adicionar informações</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Tipo</label>
                                                    <input type="text" name="type" id="firstName" class="form-control">
                                                    <small class="form-control-feedback"> </small> </div>
                                            </div>
                                        
                                            <!--/span-->
                                        </div>
                                        

                                        <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Salvar</button>
                                        <button type="button" class="btn btn-inverse">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    @endsection