<x-layout title="Editar série {!! $campeonato->nome !!}">
    <x-form :action="route('campeonato.update', $campeonato->id)" :nome="$campeonato->nome" :update="true"/>
</x-layout>