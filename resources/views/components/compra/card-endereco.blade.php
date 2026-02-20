@props(['endereco'])

<div class="p-3 mb-3 bg-white rounded shadow-sm border-0 produto-container animate__animated animate__fadeIn">
    <div class="row align-items-center">

        <div class="col-1 col-md-1 d-flex justify-content-center">
            <div class="form-check">
                <input class="form-check-input js-radio-endereco"
                       type="radio"
                       name="endereco_entrega"
                       id="endereco-{{ $endereco->id }}"
                       value="{{ $endereco->id }}"
                       {{ $endereco->principal ? 'checked' : '' }}>
            </div>
        </div>

        <div class="col-11 col-md-7">
            <div class="d-flex align-items-center mb-1">
                <h6 class="mb-0 fw-bold text-dark">Enviar no meu endereço</h6>
                <span class="ms-3 badge bg-light text-success border border-success-subtle">Grátis</span>
            </div>

            <div class="text-muted small">
                {{ $endereco->logradouro }}, {{ $endereco->numero }} - {{ $endereco->bairro }}, {{ $endereco->cidade }} - CEP {{ $endereco->cep }}
            </div>

            <div class="mt-1 text-secondary small text-capitalize">
                {{ $endereco->tipo }}
            </div>
        </div>

        <div class="col-12 col-md-4 text-end mt-2 mt-md-0">
            <a href="#" class="btn btn-link btn-sm text-decoration-none text-primary p-0 me-3">Editar</a>
            <a href="#" class="btn btn-link btn-sm text-decoration-none text-danger p-0 btn-excluir-endereco" data-id="{{ $endereco->id }}">Excluir</a>
        </div>

    </div>
</div>
