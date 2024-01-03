<x-layout>
    <x-breadcrumbs class="mb-4" 
    :links="[
        'Jobs' => route('jobs.index'),
        $job->title => '#'
     ]"/>
    <x-job-card :$job>
        <p class="text-sm text-slate-500 mb-4">
            {{-- we need to convert the new line(nl) character to the break(br) character in html
                so we use the nl2br() method and to escape the html which will be presented as text we wrap
                it in {!! .... !!} --}}
            {!! nl2br($job->description) !!}
        </p>
    </x-job-card>
</x-layout>