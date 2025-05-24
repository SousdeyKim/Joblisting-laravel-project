  
<x-layout>
  
    <x-slot:heading>
         Job lists    
    </x-slot:heading>
    <div class="space-y-4">
        @foreach ($jbs as $job)
          <!-- <li>{{ implode(' - ', [$job['title'], $job['salary']]) }}</li> -->
          <!-- <li>
            <a href="/jobs/{{ $job['id'] }}"><strong>{{ $job['title']}}</strong> is paid {{ $job['salary'] }} per year</a>
          </li> -->

          <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
            {{-- <div>{{ $job->employer->name }}</div> --}}

            <div>            
              <strong class="text-Hello">{{ $job['title']}}</strong> is paid {{ $job['salary'] }} per year
            </div>
          </a>

        @endforeach
        <div>
          {{ $jbs->links() }}
        </div>
    </div>
</x-layout>