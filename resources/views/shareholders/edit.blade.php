<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Edit Shareholder') }}
        </h2>
    </x-slot>

    <div class="p-6 bg-white rounded-md shadow-md dark:bg-dark-eval-1">

        <form action="{{ route('shareholders.update', $shareholder->id) }}" method="POST">
            @csrf
            @method('PUT')
            <x-bladewind::input name="name" required="true" label="Full Name"
                value="{{ old('name', $shareholder->name) }}" error_message="Please provide Full Name" />

            <div class="flex gap-4">
                <x-bladewind::input name="email" required="true" label="Email"
                    value="{{ old('email', $shareholder->email) }}" error_message="Please enter valid email" />
                <x-bladewind::input name="phone" label="Mobile" error_message="Please provide mobile no"
                    value="{{ old('phone', $shareholder->phone) }}" />
            </div>

            <div class="flex gap-4">
                <x-bladewind::input name="country" required="true" label="Country"
                    error_message="Please choose country from the list"
                    value="{{ old('country', $shareholder->country) }}" />
                <x-bladewind::input name="nationality" required="true" label="Nationality"
                    error_message="Please choose shareholder's nationality"
                    value="{{ old('nationality', $shareholder->nationality) }}" />
            </div>

            <div class="flex gap-4">
                <x-bladewind::input name="shares" required="true" label="Subscribed Share"
                    error_message="This field cannot be null" value="{{ old('shares', $shareholder->shares) }}" />
                <x-bladewind::input name="sharesPaid" required="true" label="Paid Share"
                    error_message="This field cannot be null"
                    value="{{ old('sharesPaid', $shareholder->sharesPaid) }}" />
            </div>

            <x-bladewind::filepicker name="shareholder_documents" required="true"
                placeholder="Upload Shareholder Documents" />

            <x-bladewind::textarea required="true" name="address" error_message="Please provide address" label="Address"
                class="mb-4">{{ old('address', $shareholder->address) }}></x-bladewind::textarea>
            

            <div class="text-right">
                <x-bladewind::button id="submit-btn" has_spinner="true" type="primary" can_submit="true" class="mt-3">
                    Save
                </x-bladewind::button>
            </div>
        </form>
    </div>
</x-app-layout>
