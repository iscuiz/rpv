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
                                <h4 class="m-b-0 text-white">Movimentação:    {{$moviment->name}}</h4>
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
{{Form::model($moviment,array("url"=>"moviment/$moviment->id/edit"))}}
                                
    {{csrf_field()}}
        <div class="form-body">
            <h3 class="card-title m-t-15">Atualizar informações</h3>
            <hr>
            <div class="row p-t-20">
                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('name','Nome',['class'=>'control-label'])}}
                       {{Form::text('name',null,['class'=>'form-control'])}}
                        <small class="form-control-feedback"> </small> </div>
                </div>
            
                <!--/span-->
            </div>
            

            <div class="form-actions">
            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Salvar</button>
            <button type="button" class="btn btn-inverse">Cancelar</button>
        </div>
{{Form::close()}}
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