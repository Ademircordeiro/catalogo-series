<x-layout title="Editar série {{ $series->name }}">
    <x-form :action="route('series.update', $series->id)" :nome="$series->name" :update="true"></x-form>
</x-layout>