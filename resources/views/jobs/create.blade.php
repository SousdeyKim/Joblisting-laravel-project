<x-layout>
  
    <x-slot:heading>
         create Job    
    </x-slot:heading>
    <form method="post" action="/jobs">
      <!-- blade directive -->
      @csrf
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base/7 font-semibold text-gray-900">Create a new job</h2>
      <p class="mt-1 text-sm/6 text-gray-600">We just need a handful of detail from you</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <x-form-field>  
        <!-- <div class="sm:col-span-4"> -->
          <!-- <label for="Title" class="block text-sm/6 font-medium text-gray-900">Title</label> -->
           <x-form-label for="title">Title</x-form-label>
          <div class="mt-2">       
            <!-- <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input type="text" name="Title" id="Title" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Shift Leader" required>
            </div> -->
            <x-form-input name="Title" id="Title" type="text" placeholder="CEO" required/>
            <!-- @error('title')
                <p class="text-red-500 text-sm/6 mt-2">{{ $message }}</p>
            @enderror -->

            <x-form-error name="Title"/>
          </div>
          </x-form-field>

          <x-form-field>  
            <x-form-label for="salary">Salary</x-form-label>
            <div class="mt-2">
              <x-form-input name="salary" id="salary" placeholder="$50,000 USD" required/>
              <x-form-error name="salary"/>
            </div>
          </x-form-field>


          <!-- <div class="sm:col-span-4">
            <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
            <div class="mt-2">
              <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input type="text" name="salary" id="salary" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="$500,000 per year" required>
              </div>
              @error('title')
                  <p class="text-red-500 text-sm/6 mt-2">{{ $message }}</p>
              @enderror
            </div>
          </div> -->
        </div>
      </div>
      <!-- @if ($errors->any()) 
          <ul>
              @foreach ($errors->all() as $error)
                  <li class="text-red-500 text-sm/6 mt-2">{{ $error }}</li>
              @endforeach
          </ul>
      @endif -->

    </div>
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
    <!-- <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button> -->
     <x-form-button>Save</x-form-button>
  </div>
</form>

</x-layout>