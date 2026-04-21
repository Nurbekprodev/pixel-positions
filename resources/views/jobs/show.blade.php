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


        <div class="flex justify-between items-center">
            <div class="font-bold hover:opacity-75">
                <a href="/jobs">Cancel</a>
            </div>

            <div class="flex gap-4 justify-end items-center">
                @can('edit', $job)
                    <div>
                        <a href="/jobs/{{ $job->id }}/edit"
                        class="bg-blue-800 rounded py-2 px-6 font-bold hover:opacity-75"
                        >Edit Job</a>
                    </div>
                @endcan

                @can('delete', $job)
                    <div>
                        <form method='POST' action="/jobs/{{$job->id}}">
                            @csrf
                            @method('DELETE')

                            <div class="">
                                <button onclick="return confirm('Are you sure you want to delete this job?')"
                                    class="text-red-500 rounded font-bold hover:opacity-75">Delete Job
                                </button>
                            </div>

                        </form>
                    </div>
                @endcan
            </div>
        </div>
    </div>



</x-layout>