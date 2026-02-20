@props(['endereco', 'selecionado' => false])

<div class="mb-3 border-0 shadow-sm card endereco-card {{ $selecionado ? 'border-primary-active' : '' }}">
    <label class="p-3 mb-0 cursor-pointer card-body d-flex align-items-start" for="endereco-{{ $endereco->id }}">

        <div class="pt-1 form-check">
            <input class="form-check-input me-3"
                   type="radio"
                   name="endereco_id"
                   id="endereco-{{ $endereco->id }}"
                   value="{{ $endereco->id }}"
                   {{ $selecionado ? 'checked' : '' }}>
        </div>

        <div class="flex-grow-1">
            <div class="mb-1 d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-bold text-dark text-capitalize">
                    {{ $endereco->tipo }}
                    @if($endereco->principal)
                        <span class="badge bg-primary-subtle text-primary ms-2 small">Principal</span>
                    @endif
                </h6>
                <span class="text-success small fw-bold">Grátis</span>
            </div>

            <p class="mb-0 text-muted small">
                {{ $endereco->logradouro }}, {{ $endereco->numero }}
                @if($endereco->complemento)
                    - {{ $endereco->complemento }}
                @endif
            </p>
            <p class="mb-0 text-muted small">
                {{ $endereco->bairro }} - {{ $endereco->cidade }}, {{ $endereco->estado }}
            </p>
        </div>
    </label>
</div>
