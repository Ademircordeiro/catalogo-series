<form action="{{ $action }}" method="post">
    @csrf

    @if($update)
        @method('PUT')
    @endif
    <div class="mb-3">
        <label class="form-label" for="name">Nome:</label>
        <input 
        class="form-control" 
        type="text" 
        id="name" 
        name="name"
        @isset($nome)value="{{ $nome }}"@endisset
        >
    </div>

    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>