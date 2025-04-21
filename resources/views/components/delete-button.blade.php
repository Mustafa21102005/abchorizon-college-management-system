<form action="{{ $action }}" method="POST"
    onsubmit="return confirm('{{ $confirm ?: 'Are you sure you want to delete this?' }}');" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-white bg-red-500 hover:bg-red-600 px-3 py-1.5 rounded text-sm">
        {{ 'Delete' }}
    </button>
</form>
