@extends('layout.navbar')

@section('title', 'Pedidos')

@section('style')

        <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@endsection

@section('content')

    <div class="container"  style="margin-top: 5%">
        <div style="display: flex;justify-content: space-between" class="card-header py-2 mb-3">
            <h1 class="mt-3">Pedidos</h1>
            <div class="search-box mt-3">
                <form action="{{ route('orders.search') }}" method="POST">
                    @csrf
                    <input class="search-field" id="search" type="text" name="search" placeholder="Faça sua busca">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
            </div>
            <a href="{{ route('pedidos.create') }}" class="btn btn-success my-2" style="margin-bottom: 1.5rem!important;">Novo Pedido</a>
        </div>
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th scope="col">Cliente</th>
                <th scope="col">Preço total</th>
                <th scope="col">Data</th>
                <th scope="col">Status</th>
                <th scope="col">Detalhes</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->client->name }}</td>
                <td>R$ {{ $order->total_price }}</td>
                <td>{{ $order->created_at->format('d/m/Y') }}</td>
                <td>{{ $order->status }}</td>
                <!-- botao detalhes -->
            <td><button type="button" title="Detalhes do Pedido" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-success">Ver mais</button></td>
            </tr>
            @endforeach
            </tbody>
        </table>

        <div>
            <nav class="d-flex justify-items-center justify-content-between">
                <div class="d-flex justify-content-between flex-fill d-sm-none">
                    <ul class="pagination">

                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">&laquo; Previous</span>
                        </li>

                        <li class="page-item">
                            <a class="page-link" href="http://localhost:8000/clientes?page=2" rel="next">Next &raquo;</a>
                        </li>
                    </ul>
                </div>

                <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
                    <div>
                        <ul class="pagination" style="display: inline-flex!important;">

                            <li class="page-item"><a class="page-link" href="http://localhost:8000/pedidos">1</a></li>
                            <li class="page-item"><a class="page-link" href="http://localhost:8000/pedidos?page=2">2</a></li>
                            <li class="page-item"><a class="page-link" href="http://localhost:8000/pedidos?page=3">3</a></li>
                            <li class="page-item"><a class="page-link" href="http://localhost:8000/pedidos?page=4">4</a></li>
                            <li class="page-item"><a class="page-link" href="http://localhost:8000/pedidos?page=5">5</a></li>
                            <li class="page-item"><a class="page-link" href="http://localhost:8000/pedidos?page=6">6</a></li>
                            <li class="page-item"><a class="page-link" href="http://localhost:8000/pedidos?page=7">7</a></li>
                            <li class="page-item"><a class="page-link" href="http://localhost:8000/pedidos?page=8">8</a></li>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>

    </div>

    <!-- Modal de Detalhes -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Pedido</h5>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Produto</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>R$ {{ $product->price }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td>R$ {{ $product->pivot->quantity * $product->price }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
