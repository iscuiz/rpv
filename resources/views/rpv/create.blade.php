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
                                <h4 class="m-b-0 text-white">Cadastro de RPV</h4>
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
                                <form action="{{url('rpv/create')}}" method='post' enctype='multipart/form-data'>
                                
                                {{csrf_field()}}
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Adicionar informações</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Nome</label>
                                                    <input type="text" name="name" id="firstName" class="form-control">
                                                    <small class="form-control-feedback"> </small> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">CPF</label>
                                                    <input name="cpf" type="text" id="lastName" class="form-control form-control-danger">
                                                    <small class="form-control-feedback"> </small> </div>
                                            </div>
                                            <!--/span-->
                                        </div>

                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Processo RPV</label>
                                                    <input name="rpv_process" type="text" id="firstName" class="form-control">
                                                    <small class="form-control-feedback"> </small> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Processo originário</label>
                                                    <input name="origin_process" type="text" id="lastName" class="form-control form-control-danger">
                                                    <small class="form-control-feedback"> </small> </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Vara</label>
                                                    <input name="stick" type="text" id="firstName" class="form-control">
                                                    <small class="form-control-feedback"> </small> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Contato</label>
                                                    <input name="contact" type="text" id="lastName" class="form-control form-control-danger">
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
                                                        <option value="1">1/3 Férias</option>
                                                        <option value="2">Débito Tributário</option>
                                                        <option value="3">Ação progressão</option>
                                                    </select>
                                                    <small class="form-control-feedback"> Selecione o tipo de processo </small> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Data de depósito</label>
                                                    <input  name="deposit_date" type="date" class="form-control" placeholder="dd/mm/yyyy">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Movimentação</label>
                                                    <select  name="moviment_id" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                        <
                                                        <option value="1">Débito em conta</option>
                                                        <option value="2">Transferência</option>
                                                        <option value="3">Boleto bancário</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                               <div class="form-group">
                                                    <label class="control-label">Banco</label>
                                                    <select name="bank_id" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                        <option value="1">Escolha</option>
                                                        <option value="2">Banco do Brasil</option>
                                                        <option value="3">Caixa econômica</option>
                                                    </select>
                                                </div>
                                                </div>
                                            </div>

                                           <div class="row">
                                             <div class="col-12">
                                               <div class="card">
                                                 <div class="card-body">
                                                   <h4 class="card-title">Documentação</h4>
                                                     <h6 class="card-subtitle">Busca de documentação </h6>
                                                      
                                                         <div class="fallback">
                                                         <input name="docs[]"  type="file" multiple />
                                                         </div>
                                                        
                                                       </div>
                                                     </div>
                                                   </div>
                                                 </div>
                                            <!--/span-->
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