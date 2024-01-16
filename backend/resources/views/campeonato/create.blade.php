<x-layout title="Nova série">
    <x-form :action="route('campeonato.store')" :nome="old('nome')" :update="false" />
</x-layout>