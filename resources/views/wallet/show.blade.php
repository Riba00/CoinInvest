<x-app-layout>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="space-y-5">
            <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6 mt-3">
                <div class="-ml-4 -mt-4 flex flex-wrap items-center justify-between sm:flex-nowrap">
                    <div class="ml-4 mt-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12 rounded-full" src="{{ $crypto->logo }}" alt="">
                            </div>
                            <div class="ml-4">
                                <h2 class="text-base font-semibold leading-6 text-gray-900">{{ $crypto->name }}</h2>
                                <p class="text-sm text-gray-500">
                                    € {{ $crypto->getCurrencyEurPrice() }}
                                </p>
                                <h3 class="text-base font-semibold leading-6 text-gray-900">Invested:
                                    € {{ $invested }}</h3>
                                <h3 class="text-base font-semibold leading-6 text-gray-900">{{ $quantity }} {{$crypto->acronym}}</h3>
                                <h3 class="text-base font-semibold leading-6 text-gray-900">Actual value:
                                    € {{ $actualValue }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        Date
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Amount
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Quantity
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">

                                    </th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach($deposits as $deposit)
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                            {{ $deposit->getFormattedDate() }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">€ {{ $deposit->amount }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $deposit->quantity }} <b>{{ $deposit->crypto->acronym }}</b>
                                        </td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            <a href="/deposits/{{$deposit->id}}" class="text-indigo-600 hover:text-indigo-900"><b>Edit</b></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</x-app-layout>
