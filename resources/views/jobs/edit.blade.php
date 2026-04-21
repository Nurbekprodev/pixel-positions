<x-layout>
    <x-page-heading>Edit Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs/{{ $job->id }}">

        @method('patch')

        <x-forms.input label="Title" name="title" value="{{ $job->title }}" />
        <x-forms.input label="Salary" name="salary" value="{{ $job->salary }}" />
        <x-forms.input label="Location" name="location" value="{{ $job->location }}" />

        <x-forms.select label="Schedule" name="schedule">
            <option>Part Time</option>
            <option>Full Time</option>
        </x-forms.select>

        <x-forms.input label="URL" name="url" value="{{ $job->url }}" />
        <x-forms.checkbox label="Feature (Costs Extra)" name="featured" />

        <x-forms.divider/>

        <x-forms.input label="Tags (comma seperated)" name="tags" 
        value="{{ $job->tags->pluck('name')->implode(', ') }}" />

        <div class="flex justify-between items-center">
            <div class="font-bold hover:opacity-75">
                <a href="/jobs/{{$job->id}}">Cancel</a>
            </div>

            <x-forms.button>Update</x-forms.button>
        </div>

    </x-forms.form>
</x-layout>