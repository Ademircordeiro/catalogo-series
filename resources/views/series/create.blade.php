<x-layout title="Nova série">
    <x-form :action="route('series.store')" :nome="old('name')" :update="false"></x-form>
</x-layout>