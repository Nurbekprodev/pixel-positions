<x-layout>
    <div class="max-w-4xl mx-auto space-y-8">

        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-white-500">{{ $job->employer->name }}</p>
                <h1 class="text-3xl font-bold mt-2">{{ $job->title }}</h1>
                <p class="mt-2 text-white-600">
                    {{ $job->schedule }} • From {{ $job->salary }}
                </p>
            </div>

            <x-employer-logo class="w-[100px]"  :employer="$job->employer" />
        </div>

        {{-- Divider --}}
        <div class="border-t border-gray-200"></div>

        {{-- Tags --}}
        <div class="flex flex-wrap gap-2">
            @foreach($job->tags as $tag)
                <x-tag :tag="$tag" />
            @endforeach
        </div>

        {{-- Job Description --}}
        <div class="prose max-w-none">
            <h2>Job Description</h2>
            <p>
                This is where your job description will go. You can store this
                in the database later and render it here.
            </p>
        </div>

        @can('edit-job', $job)
            <div>
                <a href="/jobs/{{ $job->id }}/edit"
                class="bg-blue-500 p-2 rounded-sm hover:opacity-75"
                >Edit Job</a>
            </div>
        @endcan
    </div>



</x-layout>