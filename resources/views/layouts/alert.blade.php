
    @if(\Session::has('info'))
    <div class="col-lg-12">

    <div class="alert alert-primary alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Operação realizada com sucesso!</strong> {{\Session::get('info')}}
        </div>

    </div>

    @else
      @if(\Session::has('erro'))
     <div class="col-lg-12">

    <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Erro</strong> {{\Session::get('erro')}}
        </div>

    </div>
    @endif

@endif