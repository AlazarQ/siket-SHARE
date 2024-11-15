<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="p-6 bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <x-bladewind::notification />
        <x-bladewind::card>
            <form id="shareholder-form" method="POST" action="{{ route('shareholders.store') }}"
                class="register-customer-form" enctype="multipart/form-data">
                @csrf

                <h1 class="my-2 text-2xl font-light text-blue-900/80">Register Shareholder</h1>
                <p class="mt-3 mb-6 text-blue-900/80 text-sm">
                    Please Fill the below form according to the shareholder documents!!
                </p>

                <x-bladewind::input name="name" required="true" label="Full Name"
                    error_message="Please provide Full Name" />

                <div class="flex gap-4">
                    <x-bladewind::input name="email" required="true" label="Email"
                        error_message="Please enter valid email" />
                    <x-bladewind::input name="phone" label="Phone Number" error_message="Please provide Phone no" />
                </div>

                <div class="flex gap-4">
                    <x-bladewind::input name="country" required="true" label="Country"
                        error_message="Please choose country from the list" />
                    <x-bladewind::input name="nationality" required="true" label="Nationality"
                        error_message="Please choose shareholder's nationality" />
                </div>

                <div class="flex gap-4">
                    <x-bladewind::input name="shares" type="number" min="0" required="true" label="Subscribed Share"
                        error_message="This field cannot be null" />
                        <x-bladewind::input name="sharesPaid" required="true" type="number" min="0" label="Paid Share"
                        error_message="This field cannot be null" />
                </div>

                <x-bladewind::filepicker name="shareholder_documents" required="true"
                    placeholder="Upload Shareholder Documents" />

                <x-bladewind::textarea required="true" name="address"
                    error_message="Please provide a Address of Shareholder" label="Address"></x-bladewind::textarea>

                <x-bladewind::textarea name="remark"
                     label="Remark"></x-bladewind::textarea>

                <div class="text-right">
                    <x-bladewind::button id="submit-btn" has_spinner="true" type="primary" can_submit="true"
                        class="mt-3">
                        Save
                    </x-bladewind::button>
                </div>

            </form>
        </x-bladewind::card>
    </div>
</x-app-layout>
<script>
    document.querySelector('.register-customer-form').addEventListener('submit', function(e) {
        e.preventDefault();
        if (validateForm('.register-customer-form')) {
            this.submit();
        }
    });
</script>
