<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="space-y-5">
            <!-- PANELS -->
            <div>
                <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                    <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                        <dt class="truncate text-sm font-medium text-gray-500">Total Deposits</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $deposits_count }}</dd>
                    </div>
                    <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                        <dt class="truncate text-sm font-medium text-gray-500">Total invested</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">
                            € {{ $total_invested }}</dd>
                    </div>
                    <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                        <dt class="truncate text-sm font-medium text-gray-500">Avg. Click Rate</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">24.57%</dd>
                    </div>
                </dl>
            </div>


            <!-- Recent client list-->
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
                    <div class="flex items-center justify-between">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Recent deposits</h2>
                        <a href="{{ route('deposits.index') }}" class="text-sm font-semibold leading-6 text-indigo-600 hover:text-indigo-500">View
                            all<span class="sr-only">, clients</span></a>
                    </div>
                    <ul role="list" class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 lg:grid-cols-3 xl:gap-x-8">
                        @foreach($recent_diposits as $recent_diposit)
                        <li class="overflow-hidden rounded-xl border border-gray-200">
                            <div class="flex items-center gap-x-4 border-b border-gray-900/5 bg-gray-50 p-6">
                                <img src="{{ $recent_diposit->crypto->logo }}" alt="Crypto logo"
                                     class="h-12 w-12 flex-none rounded-lg bg-white object-cover ring-1 ring-gray-900/10">
                                <div class="text-sm font-medium leading-6 text-gray-900">{{ $recent_diposit->crypto->name }}</div>
                            </div>
                            <dl class="-my-3 divide-y divide-gray-100 px-6 py-4 text-sm leading-6">
                                <div class="flex justify-between gap-x-4 py-3">
                                    <dt class="text-gray-500">Amount</dt>
                                    <dd class="flex items-start gap-x-2">
                                        <div class="font-medium text-gray-900">€ {{ $recent_diposit->getFormattedAmount() }}</div>
                                    </dd>
                                </div>

                                <div class="flex justify-between gap-x-4 py-3">
                                    <dt class="text-gray-500">Amount</dt>
                                    <dd class="flex items-start gap-x-2">
                                        <div class="font-medium text-gray-900">{{ $recent_diposit->getFormattedQuantity() }} {{ $recent_diposit->crypto->acronym }}</div>
                                    </dd>
                                </div>
                                <div class="flex justify-between gap-x-4 py-3">
                                    <dt class="text-gray-500">Date</dt>
                                    <dd class="text-gray-700">
                                        <time datetime="2022-12-13">{{ $recent_diposit->getFormattedDate() }}</time>
                                    </dd>
                                </div>
                            </dl>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>


        </div>
    </div>

</x-app-layout>
