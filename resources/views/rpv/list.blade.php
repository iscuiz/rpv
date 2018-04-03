@extends('layouts/main')
@section('content')
<!-- Start Page Content -->
<div class="row">
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
                                <td>{{$rpv->moviment->name}}</td>
                                <td>{{$rpv->bank->name}}</td>
                              
                            </tr>
                            @empty
                            Sem Registros
                           @endforelse
                           
                           </tbody>
                    </table>
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

</script>
@endsection