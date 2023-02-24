@props(['name'])

@error('{{ $name }}')
    <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
@enderror