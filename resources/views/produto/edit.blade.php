@extends('layouts.MainSimples')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/adicionarProduto.css') }}">
<link rel="stylesheet" href="{{ asset('css/Produto.css') }}">
@endpush
@section('title', 'editar produto: ' . $produto->nome)
@section('conteudo')

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">

                <div class="card shadow-lg border-0">
                    <div class="card-header text-white text-center py-3" >
                        <h4 class="mb-0">Atualizar produto</h4>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <form method="POST" action="{{ route('produto.update', $produto->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="imagem" class="form-label">Imagem do Produto</label>
                                 @if ($produto->imagem)
                                    <div class="d-flex justify-content-center mb-2">
                                        <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Imagem atual do produto" class="img-fluid rounded" style="max-height: 150px;">
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('imagem') is-invalid @enderror" id="imagem" name="imagem" >
                                @error('imagem')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text px-2">
                                    Formatos permitidos: jpeg, png, jpg, gif. Tamanho máximo: 2MB.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome do Produto</label>
                                <input type="text" class="form-control @error('nome') is-invalid @enderror "
                                    id="nome" name="nome" placeholder="Ex: Celular Samsung Galaxy" value="{{ $produto->nome }}" >

                                @error('nome')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="preco" class="form-label">Preço (R$)</label>
                                <input type="number" class="form-control @error('preco') is-invalid @enderror" id="preco" name="preco"
                                    placeholder="Ex: 1299.90" step="0.01" value="{{ $produto->preco }}" >
                                @error('preco')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                             <div class="mb-3">
                                <label for="estoque" class="form-label">quantidade de estoque</label>
                                <input type="number" class="form-control @error('estoque') is-invalid @enderror" id="estoque" name="estoque"
                                     value="{{ $produto->estoque }}" >
                                @error('estoque')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="descricao" class="form-label">Descrição</label>
                                <textarea class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" rows="4"
                                    placeholder="Detalhes sobre o produto, especificações, etc.">{{ $produto->descricao }}</textarea>
                                @error('descricao')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-custom-yellow btn-lg">Atualizar produto Produto</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection

@push('scripts')
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
          icon: 'success',
          title: "{{ session('success') }}"
        });
    });
        </script>
    @endif
@endpush
