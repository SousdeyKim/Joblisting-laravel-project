  
<x-layout>
  
    <x-slot:heading>
         Job {{ $job->title }}    
    </x-slot:heading>
    <h2> {{$job['title']}} </h2>
    <!-- {{ $job->getAttribute('title') }} -->
    <!-- <h2> {{$job->title}} </h2> -->

    <p>
      This job pays {{$job['salary']}} per year.
    </p>

    {{--
    @can('edit_job', $job)
    <p class="mt-6">
      <x-button href="/jobs/{{$job->id}}/edit">Edit Job</x-button>
    </p>
    @endcan  
    --}}

    {{-- @can('edit', $job)
    <p class="mt-6">
      <x-button href="/jobs/{{$job->id}}/edit">Edit Job</x-button>
    </p>
    @endcan --}}

     {{-- @auth
      <p class="mt-6">
        <x-button href="/jobs/{{$job->id}}/edit">Edit Job</x-button>
      </p>
    @endauth --}}
    

    @auth
    {{-- <p>Job Owner ID: {{ $job->employer->user->id }}</p>
     <p>Logged-in ID: {{ auth()->id() }}</p> --}}
     
      @if(auth()->id() === optional($job->employer->user)->id) {{-- optional($job->employer->user)->id, use when $job and user connect via employer --}}
        <p class="mt-6">
          <x-button href="/jobs/{{$job->id}}/edit">Edit Job</x-button>
        </p>
      @endif
    @endauth

     
    
    {{-- 
    <p class="mt-6">
      <x-button href="/jobs/{{$job->id}}/edit">Edit Job</x-button>
    </p> 
    --}}
     
    
    
</x-layout>