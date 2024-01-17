<x-layout title="Novo Campeonato">
    <form :action="route('campeonato.store')" method="post">
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome do campeonato</label>
            <input type="text" id="nome" name="nome" class="form-control"
                @isset($nome) value="{{ old('nome') }}" @endisset>
        </div>

        <div class="mb-3">
            <div class="row align-items-center">
                <div class="col">
                    <label for="time" class="form-label">Selecione o time</label>
                    <select @if (count($times) < 1) disabled @endif id="time" name="time"
                        class="form-control" onchange="checkNewTime(this)">
                        @foreach ($times as $time)
                            <option value="{{ $time->id }}" @if (old('time') == $time->id)  @endif>
                                {{ $time->nome }}
                            </option>
                        @endforeach
                        @if (count($times) < 1)
                            <option value="new" selected>Sem times registrados</option>
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <button class="btn btn-primary">Adicionar</button>
    </form>


</x-layout>
