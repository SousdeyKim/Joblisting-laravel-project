
<h2>
  {{ $job->title }}
</h2>
<p>
Congrats! Your job now is live on our website.
</p>

<p>
  <!-- <a href="/jobs/{{ $job->id }}">View your job listing</a> -->
  <a href="{{ url('/jobs/' . $job->id) }}">View your job listing</a>
  </p>