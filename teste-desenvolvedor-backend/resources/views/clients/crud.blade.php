@extends('layout.navbar')

@section('title', 'Clientes')

@section('content')

    <div class="wrapper">
        <div class="container-fluid">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Clientes</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->


            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>{{ isset($client) ? "Editar Cliente" : "Criar Novo Cliente" }}</b></h4>
                        <p class="text-muted font-14 m-b-30">
                            Formulário para {{ isset($client) ? "edição de um Cliente" : "criação de novo Cliente" }}.
                        </p>

                        <form id="form-client" method="POST" action=" {{ isset($client) ? route("clientes.update", $client->id) : route("clientes.store")}} " enctype="multipart/form-data">

                            @csrf
                            @isset($client)
                                @method("PUT")
                            @else
                                @method("post")
                            @endisset

                            @component('clients.form', [ "client" => isset($client) ? $client : null])
                            @endcomponent

                        </form>

                        <div class="d-flex justify-content-end mt-3">
                            <button type="submit" form="form-client" class="btn btn-success mr-2">Salvar</button>
                            <a href=" {{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

@endsection
