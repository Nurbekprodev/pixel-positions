<x-layout>
    <x-page-heading>Log In</x-page-heading>

    <x-forms.form method="post" action="/login" enctype="multipart/form-data">
        <x-forms.input label="Email" name="email" />
        <x-forms.input label="Password" name="password" type="password"/>

        <x-forms.button>Log In</x-forms.button>
    </x-forms.form>
</x-layout>