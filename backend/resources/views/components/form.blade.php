<form action= "{{ $action }}" method="post">
    @csrf

    <div class="mb-3">
        <label for="nome" class="form-label">Nome da série</label>
        <input type="text" id="nome" name="nome" class="form-control"
            @isset($nome) value="{{ $nome }}" @endisset>
    </div>
    <button class="btn btn-primary">Adicionar</button>
</form>
