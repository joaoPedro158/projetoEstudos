<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- link do css --}}
    <link rel="stylesheet" href="{{ asset('css/Cores.css') }}">
    <link rel="stylesheet" href="{{ asset('css/padrao.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

</head>

<body>

    <!-- BARRA LATERAL DE NAVEGAÇÃO -->
    <nav class="sidebar">
        <div class="text-center mb-4">
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
            <li class="nav-item mt-auto">
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2">Gerenciamento de Produtos</h1>
            <div>
                <a href="{{ route('adicionarProduto.index') }}" class="btn btn-custom-yellow">
                    <i class="bi bi-plus-circle-fill me-2"></i> Adicionar Novo Produto
                </a>
            </div>
        </div>

        <!-- Card com a Tabela de Produtos -->
        @if (count($produtoDoUsuario) === 0)
            <div class="alert alert-info  mt-5" role="alert">
                Nenhum produto cadastrado.
            </div>
        @else
            <div class="card border-0 shadow-sm">
                <div class="card-body p-1">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
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
                                            <button class="btn btn-sm btn-outline-secondary"><i
                                                    class="bi bi-pencil-fill"></i></button>

                                            <form action="/produto/{{ $item->id }}" method="POST" class="d-inline">
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

     @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {

        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        });


        Toast.fire({
           iconHtml: '<i class="bi bi-trash-fill text-danger "></i>',
          title: "{{ session('success') }}"
        });
    });
        </script>
    @endif
</body>

</html>
