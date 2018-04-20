@extends("layouts/main")
    @section("content")
<div class="row">
        @include('layouts.alert')
    <div class="col-12">
                        <div class="card">
                            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Edição de RPV</h4>
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
                               {{Form::model($rpv, ['url'=>"rpv/$rpv->id/edit"])}}

                                {{csrf_field()}}
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Adicionar informações</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{Form::label('name','Nome')}}
                                                    {{Form::text('name',null,['class'=>"form-control"])}}

                                                    <small class="form-control-feedback"> </small> </div>
                                                </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    {{Form::label('cpf','CPF',['class'=>'control-label'])}}
                                                    {{Form::text('cpf',null,['class'=>"form-control"])}}
                                                    <small class="form-control-feedback"> </small> </div>
                                            </div>
                                            <!--/span-->
                                        </div>

                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    {{Form::label('rpv_process','Processo RPV',['class'=>'control-label'])}}
                                                    {{Form::text('rpv_process',null,['class'=>"form-control"])}}

                                                    <small class="form-control-feedback"> </small> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">

                                                    {{Form::label('origin_process','Processo originário',['class'=>'control-label'])}}
                                                    {{Form::text('origin_process',null,['class'=>"form-control"])}}

                                                    <small class="form-control-feedback"> </small> </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    {{Form::label('stick','Vara',['class'=>'control-label'])}}
                                                    {{Form::text('stick',null,['class'=>"form-control"])}}

                                                    <small class="form-control-feedback"> </small> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    {{Form::label('contact','Contato',['class'=>'control-label'])}}
                                                    {{Form::text('contact',null,['class'=>"form-control"])}}
                                                    <small class="form-control-feedback"> </small> </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Tipo de processo</label>
                                                    <select name="process_type" class="form-control custom-select">
                                                    @forelse($processes as $process)
                                                        @if(strcmp($process->type,$rpv->process_type) == 0)
                                                        <option value="{{$process->type}}" selected>{{$process->type}}</option>
                                                        @else
                                                        <option value="{{$process->type}}">{{$process->type}}</option>
                                                        @endif

                                                        @empty

                                                        @endforelse
                                                    </select>
                                                    <small class="form-control-feedback"> Selecione o tipo de processo </small> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{Form::label('deposit_date','Data de depósito',['class'=>'control-label'])}}
                                                    {{Form::date('deposit_date',null,['class'=>"form-control"])}}
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Movimentação</label>
                                                    <select  name="moviment" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">

                                                     @forelse($moviments as $moviment)
                                                        @if(strcmp($moviment->name,$rpv->moviment) == 0)
                                                        <option value="{{$moviment->name}}" selected>{{$moviment->name}}</option>
                                                        @else
                                                        <option value="{{$moviment->name}}">{{$moviment->name}}</option>
                                                        @endif
                                                        @empty

                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                               <div class="form-group">
                                                    <label class="control-label">Banco</label>
                                                    <select name="bank" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                       @forelse($banks as $bank)
                                                       @if(strcmp($bank->name,$rpv->bank)==0)
                                                        <option value="{{$bank->name}}" selected>{{$bank->name}}</option>
                                                        @else

                                                        <option value="{{$bank->name}}">{{$bank->name}}</option>
                                                        @endif
                                                        @empty

                                                        @endforelse
                                                    </select>
                                                </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Salvar</button>
                                        <a href="{{url('rpv/list')}}" type="button" class="btn btn-inverse">Cancelar</a>
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