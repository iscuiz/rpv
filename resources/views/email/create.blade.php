@extends("layouts/main")
    @section("content")
<div class="row">
        @include('layouts.alert')
        <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-content">

                    <!-- End Left sidebar -->
                    <div class="inbox-rightbar">



                        <div class="mt-4">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <form role="form" action="{{url('email/create')}}" method="POST" enctype='multipart/form-data'>
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
                          {{csrf_field()}}
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Para" name="to">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Assunto" name="subject">
                                </div>
                                <div class="form-group">
                                    <textarea name="msg" rows="8" cols="80" class="form-control" style="height:300px">


                                                                               </textarea>
                                </div>

                                <div class="form-group m-b-0">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-danger"><span>Enviar</span> <i class="fa fa-send m-l-10"></i> </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <!-- end card-->

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endsection