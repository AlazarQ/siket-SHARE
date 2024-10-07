<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Create Customer (New)') }}
            </h2>

        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        {{-- {{ __('Fill Customer Info') }} --}}

        <form method="POST" action="{{ route('customers.create') }}" class="mt-6 space-y-6">
            @csrf
            <x-form.label for="customerId" :value="__('Customer Id')" />
            <div class="space-y-2">
                <x-form.input id="customerId" name="customerId" type="text" class="block w-1/4" required autofocus
                    autocomplete="customerId" placeholder="10000000234" />
            </div>

            <x-form.label for="customerName" :value="__('Customer Name')" />
            <div class="space-y-2">
                <x-form.input id="customerName" name="customerName" type="text" class="block w-1/2" required autofocus
                    autocomplete="customerName" placeholder="Abebe Kebede" />
            </div>

            <x-form.label for="customerAccount" :value="__('Customer Account')" />
            <div class="space-y-2">
                <x-form.input id="customerAccount" name="customerAccount" type="text" class="block w-1/2" required autofocus
                    autocomplete="customerAccount" placeholder="1000000023412" />
            </div>

            <div class="flex space-x-4">
                <div class="w-1/2">
                    <x-form.label for="sector" :value="__('Sector')" />
                    <div class="space-y-2">
                        <x-form.input id="sector" name="sector" type="number" class="block w-full" required autofocus
                            autocomplete="sector" placeholder="1000" min="0"/>
                    </div>
                </div>
            
                <div class="w-1/2">
                    <x-form.label for="industry" :value="__('Industry')" />
                    <div class="space-y-2">
                        <x-form.input id="industry" name="industry" type="number" class="block w-full" required autofocus
                            autocomplete="industry" placeholder="1001" />
                    </div>
                </div>
            </div>
            
        </form>
    </div>
</x-app-layout>
