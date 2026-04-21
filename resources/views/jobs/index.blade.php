<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-6">
            <h1 class="font-bold text-4xl">Let's Find Your Next Job</h1>
    
            <div class="flex justify-center">
                <x-forms.form action="/jobs" method="get" class="flex gap-4 m-6 ">
                    <x-forms.input 
                        :label="false"  
                        name="q" 
                        value="{{ request('q') }}"
                        namespace="Web Developer ..." 
                        class=" border border-white/10 rounded px-3 py-2 w-64"
                    />

                    <select name="schedule" class=" bg-white/5 text-white border border-white/10 rounded px-3 py-2 hover:opacity-75">
                        <option class="bg-gray-900 text-white" value="">All</option>
                        <option class="bg-gray-900 text-white" value="Full Time">Full Time</option>
                        <option class="bg-gray-900 text-white"  value="Part Time">Part Time</option>
                    </select>

                    <select name="tag" class="bg-white/5 text-white border border-white/10 rounded px-3 py-2 hover:opacity-75">
                        <option class="bg-gray-900 text-white" value="">All Tags</option>
                        @foreach($tags as $tag)
                            <option class="bg-gray-900 text-white" value="{{ $tag->name }}">
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>

                    <label class="flex items-center gap-2 hover:opacity-75">
                        <input type="checkbox" name="featured" value="1">
                        Featured
                    </label>

                    <button class="bg-blue-800 gap-2 py-1 px-4 rounded hover:opacity-75">
                        Filter
                    </button>
                </x-forms.form>
            </div>


        </section>

        <section class="pt-10 max-w-7xl mx-auto">
            <x-section-heading>All Jobs</x-section-heading>

            <div class="">
                @foreach($jobs as $job)
                    <x-job-card-wide :job="$job"/>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $jobs->links() }}
            </div>
        </section>


    </div>

</x-layout>