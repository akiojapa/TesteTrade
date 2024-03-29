<x-layout title="Campeonato">
<a href={{route('campeonato.create')}} class="btn btn-dark mb-2">Adicionar</a>

@isset($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
    </div>

@endisset

    <ul class="list-group">
        @foreach ($campeonato as $campeonato)
            <li class="list-group-item d-flex justify-content-between align-itens-center">
                {{ $campeonato->nome }}
       
            <span class="d-flex">
                <a href="{{ route('campeonato.edit', $campeonato->id) }}" class="btn btn-primary btn-sm">E</a>
            <form action="{{ route('campeonato.destroy', $campeonato->id)}}" method="post" class="ms-2">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    X
                </button>
            </form>
            </span>
            </li>
        @endforeach
    </ul>

    <script>
        document.querySelector('body').style.background = '#ccc';
        const campeonato = @json($campeonato);
    </script>
    
</x-layout>
