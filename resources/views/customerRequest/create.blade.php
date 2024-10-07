<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Customer FCY Request Application Form') }}
            </h2>

        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        {{ __("Fill Application to Request FCY")  }}

        <form method="POST" action="{{ route('customerRequest.create') }}" class="mt-6 space-y-6">
            @csrf
            <x-form.label for="customerId" :value="__('Customer Id')" />
            <div class="space-y-2">
                <x-form.input id="customerId" name="customerId" type="text" class="block w-1/2" required autofocus
                    autocomplete="customerId" placeholder="10000000234" />
            </div>

            <x-form.label for="accountNBE" :value="__('NBE Account No')" />
            <div class="space-y-2">
                <x-form.input id="accountNBE" name="accountNBE" type="text" class="block w-1/2" required autofocus
                    autocomplete="accountNBE" placeholder="NBE12000923" />
            </div>

            <x-form.label for="applicationDate" :value="__('Application Date')" />
            <div class="space-y-2">
                <x-form.input id="applicationDate" name="applicationDate" type="date" class="block w-1/2" required
                    autofocus autocomplete="applicationDate" value="{{ now()->format('Y-m-d') }}" disabled/>
            </div>
            <div class="flex space-x-4">
                <div class="w-1/2">
                    <x-form.label for="branchCode" :value="__('Branch Code')" />
                    <div class="space-y-2">
                        <x-form.input id="branchCode" name="branchCode" type="text" class="block w-full" required
                            autofocus autocomplete="branchCode" placeholder="ET0010003" />
                    </div>
                </div>

                <div class="w-1/2">
                    <x-form.label for="exchangeRate" :value="__('Exchange Rate')" />
                    <div class="space-y-2">
                        <x-form.input id="exchangeRate" name="exchangeRate" type="number" class="block w-full"  required
                            autofocus autocomplete="exchangeRate" value="{{ old('exchangeRate', $exchangeRate) }}" />
                    </div>
                </div>
            </div>

            <div class="flex space-x-4">
                <div class="w-1/2">
                    <x-form.label for="goodsServices" :value="__('Goods/Services')" />
                    <div class="space-y-2">
                        <x-form.input id="goodsServices" name="goodsServices" type="text" class="block w-full"
                            required autofocus autocomplete="goodsServices" placeholder="1000" min="0" />
                    </div>
                </div>

                <div class="w-1/2">
                    <x-form.label for="currency" :value="__('Currency')" />
                    <div class="space-y-2">
                        <x-form.input id="currency" name="currency" type="text" class="block w-full" required
                            autofocus autocomplete="currency" placeholder="USD" />
                    </div>
                </div>
            </div>

            <div class="flex space-x-4">
                <div class="w-1/2">
                    <x-form.label for="requestedAmount" :value="__('Requested Amount')" />
                    <div class="space-y-2">
                        <x-form.input id="requestedAmount" name="requestedAmount" type="number" class="block w-full"
                            required autofocus autocomplete="requestedAmount" placeholder="123.23" min="1" />
                    </div>
                </div>

                <div class="w-1/2">
                    <x-form.label for="localEquivalent" :value="__('Local Equivalent')" />
                    <div class="space-y-2">
                        <x-form.input id="localEquivalent" name="localEquivalent" type="number" class="block w-full"
                            required autofocus autocomplete="localEquivalent" disabled />
                    </div>
                </div>
            </div>

            <div class="flex space-x-4">
                <div class="w-1/2">
                    <x-form.label for="paymentMode" :value="__('Payment Mode')" />
                    <div class="space-y-2">
                        <x-form.input id="paymentMode" name="paymentMode" type="text" class="block w-full"
                            required autofocus autocomplete="paymentMode" placeholder="LC" />
                    </div>
                </div>

                <div class="w-1/2">
                    <x-form.label for="incoterms" :value="__('Incoterms')" />
                    <div class="space-y-2">
                        <x-form.input id="incoterms" name="incoterms" type="text" class="block w-full"
                            required autofocus autocomplete="incoterms"  />
                    </div>
                </div>
            </div>

            <div class="flex space-x-4">
                <div class="w-1/2">
                    <x-form.label for="placeOfShipment" :value="__('Place Of Shipment')" />
                    <div class="space-y-2">
                        <x-form.input id="placeOfShipment" name="placeOfShipment" type="text" class="block w-full"
                            required autofocus autocomplete="placeOfShipment" placeholder="Turkeye" />
                    </div>
                </div>

                <div class="w-1/2">
                    <x-form.label for="placeOfDestination" :value="__('Place Of Destination')" />
                    <div class="space-y-2">
                        <x-form.input id="placeOfDestination" name="placeOfDestination" type="text" class="block w-full"
                            required autofocus autocomplete="placeOfDestination"  placeholder="Berebera Port" />
                    </div>
                </div>
            </div>

            <x-form.label for="applicationStatus" :value="__('Application Status')" />
            <div class="space-y-2">
                <x-form.input id="applicationStatus" name="applicationStatus" type="text" class="block w-1/2" 
                    autocomplete="applicationStatus" value="NEW" disabled/>
            </div>

        </form>

    </div>
</x-app-layout>
