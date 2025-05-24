  
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

    @can('edit', $job)
    <p class="mt-6">
      <x-button href="/jobs/{{$job->id}}/edit">Edit Job</x-button>
    </p>
    @endcan 
     
    
    {{-- 
    <p class="mt-6">
      <x-button href="/jobs/{{$job->id}}/edit">Edit Job</x-button>
    </p> 
    --}}
     
    
    
</x-layout>