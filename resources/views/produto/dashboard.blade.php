@push('styles')
      <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush
@extends('layouts.base')
@section('title', 'Dashboard de Produtos')

@section('layoutConteudo')
    <!-- BARRA LATERAL DE NAVEGAÇÃO -->
    <nav class="sidebar">
        <div class="mb-4 text-center">
            <h4 class="text-white">Bazzary Admin</h4>
            <p>Olá {{ auth()->user()->name }}</p>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-grid-fill"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <i class="bi bi-box-seam-fill"></i>
                    Produtos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-tags-fill"></i>
                    Categorias
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-people-fill"></i>
                    Usuários
                </a>
            </li>
            <li class="mt-auto nav-item">
                <a class="nav-link" href="/">
                    <i class="bi bi-box-arrow-left"></i>
                    Sair
                </a>
            </li>
        </ul>
    </nav>

    <!-- CONTEÚDO PRINCIPAL -->
    <main class="main-content">
        <!-- Cabeçalho do Conteúdo -->
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h1 class="h2">Gerenciamento de Produtos</h1>
            <div>
                <a href="{{ route('adicionarProduto.index') }}" class="btn btn-custom-yellow">
                    <i class="bi bi-plus-circle-fill me-2"></i> Adicionar Novo Produto
                </a>
            </div>
        </div>

        <!-- Card com a Tabela de Produtos -->
        @if (count($produtoDoUsuario) === 0)
            <div class="mt-5 alert alert-info" role="alert">
                Nenhum produto cadastrado.
            </div>
        @else
            <div class="border-0 shadow-sm card">
                <div class="p-1 card-body">
                    <div class="table-responsive">
                        <table class="table align-middle table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Imagem</th>
                                    <th scope="col">Nome do Produto</th>
                                    <th scope="col">Preço</th>
                                    <th scope="col">Estoque</th>
                                    <th scope="col">Data de Cadastro</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($produtoDoUsuario as $item)
                                    <tr>
                                        <th scope="row"> {{ $loop->index + 1 }}</th>
                                        <td><img src="{{ asset('storage/' . $item->imagem) }}" alt="iamgem do produto"
                                                class="product-image-sm"></td>
                                        <td><a href="/produto/{{ $item->id }}"
                                                class="text-decoration-none">{{ $item->nome }}</a></td>
                                        <td>{{ $item->preco }}</td>
                                        <td>{{ $item->estoque }}</td>
                                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $item->preco }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('produto.edit', ['id' => $item->id]) }}">
                                                <button class="btn btn-sm btn-outline-secondary"><i
                                                        class="bi bi-pencil-fill"></i></button>
                                            </a>

                                            <form action="{{ route('produto.destroy', ['id' => $item->id]) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        @endif
    </main>

@endsection

@push ('scriptAlert')
             @if (session('delete'))
                <script>showToastHtml('<i class="bi bi-trash-fill text-danger"></i>', "{{ session('delete') }}");</script>
            @endif
           @if (session('editado'))
            <script>showToast('success', "{{ session('editado') }}");</script>
    @endif
@endpush


