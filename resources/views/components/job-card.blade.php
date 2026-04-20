@props(['job'])

<x-panel class="flex-col text-center">
    <a href="jobs/{{ $job->id }} " class="group block">
        
        <div class="self-start text-sm">{{ $job->employer->name }}</div>
        <div class="py-8 ">
            <h3 class="group-hover:text-blue-600 text-xl font-bold transition-colors duration-300 ">{{ $job->title }}</h3>
            
            <p class="mt-4 text-sm">{{$job->schedule}} - From {{$job->salary}}</p>
        </div>
        <div class="flex justify-between items-center mt-auto">
            <div>
                @foreach($job->tags as $tag)
                    <x-tag :tag="$tag" size="small" />
                @endforeach
            </div>
            <div>
                <x-employer-logo class="w-[42px]" :employer="$job->employer" />
            </div>
        </div>
    </a>
</x-panel>