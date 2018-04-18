@extends('layouts/main')
@section('content')
<!-- Start Page Content -->
<div class="row">
        @include('layouts.alert')

        {!! Form::open(['url'=>'#','id'=>'delete-form']) !!}
        {!! Form::close() !!}
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cadastros</h4>
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Proc RPV</th>
                                <th>Proc Origin</th>
                                <th>Vara</th>
                                <th>Contato</th>
                                <th>Tipo de Proc</th>
                                <th>Data de Dep</th>
                                <th>Movimentação</th>
                                <th>Banco</th>
                                <th width="10%">Açoes</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Proc RPV</th>
                                <th>Proc Origin</th>
                                <th>Vara</th>
                                <th>Contato</th>
                                <th>Tipo de Proc</th>
                                <th>Data de Dep</th>
                                <th>Movimentação</th>
                                <th>Banco</th>
                                <th width="10%">Açoes</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        @forelse($rpvs as $rpv)
                            <tr>
                                <td>{{$rpv->name}}</td>
                                <td>{{$rpv->cpf}}</td>
                                <td>{{$rpv->rpv_process}}</td>
                                <td>{{$rpv->origin_process}}</td>
                                <td>{{$rpv->stick}}</td>
                                <td>{{$rpv->contact}}</td>
                                <td>{{$rpv->process->type}}</td>
                                <td>{{date('d-m-Y',strtotime($rpv->deposit_date))}}</td>
                                <td>{{$rpv->moviment}}</td>
                                <td>{{$rpv->bank}}</td>
                                <td width="15%" style="text-align: center">
                                        <a href='{{url("process/$rpv->id/edit")}}' class="btn btn-warning">Editar</a>
                                        <a href='#' class="btn btn-danger" onclick="confirmDelete({{$rpv->id}})">Excluir</a>
                                    </td>

                            </tr>
                            @empty
                            Sem Registros
                           @endforelse

                           </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!--MODAL CONFIRM DELETE -->
        <div class="modal" id="confirm">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Confirmação de exclusão</h4>
                        </div>
                        <div class="modal-body">
                            <p>Tem certeza que deseja excluir?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn  btn-primary" id="delete-btn">Confirmar</button>
                            <button type="button" class="btn  btn-default" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
<!-- End PAge Content -->
@endsection

@section('scripts')

<script src="{{asset('js/lib/datatables/datatables.min.js')}}"></script>
<script src="{{asset('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js')}}"></script>
<script src="{{asset('js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js')}}"></script>
<script src="{{asset('js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js')}}"></script>
<script src="{{asset('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js')}}"></script>
<script src="{{asset('js/lib/datatables/datatables-init.js')}}"></script>

<script>
   function confirmDelete(id)
   {

        $("#delete-form").attr('action','http://localhost:8000/rpv/'+id+'/delete');
        var $form = $("#delete-form");
        $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .on('click', '#delete-btn', function(){
            $("#delete-form").submit()
        });
   }
</script>
@endsection