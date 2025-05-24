
@props(['name'])
@error($name)
  <p class="text-red-500 text-sm/6 mt-2">{{ $message }}</p>
@enderror