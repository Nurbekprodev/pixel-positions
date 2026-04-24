<x-layout>
    <x-page-heading>Applications Page</x-page-heading>

    <div>
        <div class="space-y-4">
            @foreach($applications as $application)
                <x-panel>
                    <div class="flex items-center gap-6">

                        <x-employer-logo 
                            class="w-[80px]"  
                            :employer="$application->job->employer" 
                        />

                        <div class="flex-1">
                            <p class="text-sm text-gray-400">
                                {{ $application->job->employer->name }}
                            </p>

                            <a href="/jobs/{{ $application->job->id }}">
                                <h3 class="font-bold text-lg mt-1 hover:text-blue-800 transition">
                                    {{ $application->job->title }}
                                </h3>
                            </a>

                            <p class="text-sm text-gray-400 mt-1">
                                {{ $application->job->schedule }} • From {{ $application->job->salary }}
                            </p>
                        </div>

                        <div class="text-right">
                            <p class="text-sm text-gray-400">Applied</p>
                            <p class="text-sm">
                                {{ $application->created_at->diffForHumans() }}
                            </p>
                        </div>

                    </div>
                </x-panel>
            @endforeach
        </div>
        
        <div class="flex justify-center">
            {{ $applications->links() }}
        </div>
    </div>

</x-layout>