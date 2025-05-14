@props(['item', 'editRoute', 'deleteRoute'])

<div class="flex justify-end space-x-3">
    <a href="{{ route($editRoute, $item) }}" class="text-blue-600 hover:text-blue-900">
        <i class="fas fa-edit"></i>
    </a>
    <form action="{{ route($deleteRoute, $item) }}" method="POST" class="inline">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-600 hover:text-red-900">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
</div>
