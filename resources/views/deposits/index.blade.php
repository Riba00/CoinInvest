<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DEPOSITS') }}
        </h2>
    </x-slot>

    <!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="space-y-5">
            <!-- STATUS -->

            @if (session()->has('created'))
                <div x-data="{ hidden: false }" class="rounded-md bg-green-50 p-4 mb-4 mt-4"
                     :class="{'hidden': hidden, 'block': ! hidden }">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <!-- Heroicon name: solid/check-circle -->
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">
                                {{ session('created') }}
                            </p>
                        </div>
                        <div class="ml-auto pl-3">
                            <div class="-mx-1.5 -my-1.5">
                                <button @click="hidden = ! hidden" type="button"
                                        class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600">
                                    <span class="sr-only">Dismiss</span>
                                    <!-- Heroicon name: solid/x -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                         fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif (session()->has('updated'))
                <div x-data="{ hidden: false }" class="rounded-md bg-green-50 p-4 mb-4 mt-4"
                     :class="{'hidden': hidden, 'block': ! hidden }">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <!-- Heroicon name: solid/check-circle -->
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">
                                {{ session('updated') }}
                            </p>
                        </div>
                        <div class="ml-auto pl-3">
                            <div class="-mx-1.5 -my-1.5">
                                <button @click="hidden = ! hidden" type="button"
                                        class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600">
                                    <span class="sr-only">Dismiss</span>
                                    <!-- Heroicon name: solid/x -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                         fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif (session()->has('deleted'))
                <div x-data="{ hidden: false }" class="rounded-md bg-green-50 p-4 mb-4 mt-4"
                     :class="{'hidden': hidden, 'block': ! hidden }">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <!-- Heroicon name: solid/check-circle -->
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">
                                {{ session('deleted') }}
                            </p>
                        </div>
                        <div class="ml-auto pl-3">
                            <div class="-mx-1.5 -my-1.5">
                                <button @click="hidden = ! hidden" type="button"
                                        class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600">
                                    <span class="sr-only">Dismiss</span>
                                    <!-- Heroicon name: solid/x -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                         fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            @endif

            <!-- FORM -->
            <div class="grid grid-cols-1 mt-3 gap-x-8 gap-y-8 md:grid-cols-3">
                <div class="px-4 sm:px-0">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Create new deposit</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Fill in the form with the data to save the
                        deposit.</p>
                </div>

                <form class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2" method="POST">
                    @csrf
                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <div class="sm:col-span-2 sm:col-start-1">
                                <label for="amount"
                                       class="block text-sm font-medium leading-6 text-gray-900">Amount</label>
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">€</span>
                                    <input type="number" name="amount" id="amount" min="0" step="0.01"
                                           class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                           placeholder="00,00" required>
                                </div>
                            </div>





                            <div class="sm:col-span-2">
                                <label for="crypto_id"
                                       class="block text-sm font-medium leading-6 text-gray-900">Crypto</label>
                                <select id="crypto_id" name="crypto_id" autocomplete=""
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                                        required>
                                    <option value="" selected disabled>Select a Crypto</option>
                                    @foreach($cryptos as $crypto)
                                        <option value="{{$crypto->id}}">
                                            {{$crypto->name}} ({{ $crypto->acronym }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="sm:col-span-2">
                                <label for="quantity"
                                       class="block text-sm font-medium leading-6 text-gray-900">Quantity</label>
                                <input type="number" name="quantity" id="quantity"
                                       autocomplete="{{ $crypto->name }}"
                                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                       required step="0.000001">
                            </div>


                            <div class="sm:col-span-2">
                                <label for="date" class="block text-sm font-medium leading-6 text-gray-900">Date</label>
                                <div class="mt-2">
                                    <input type="date" name="date" id="date" required
                                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                        <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Add
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>


    <!-- TABLE -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="px-4 sm:px-6 lg:px-8 rounded-md">
            <div class="mt-8 flow-root">
                <div class="shadow overflow-x-auto border border-gray-200 sm:rounded-lg">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                            <tr>
                                <th scope="col"
                                    class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-2">
                                    Amount
                                </th>
                                <th scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Crypto
                                </th>
                                <th scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Quantity
                                </th>
                                <th scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Date
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            @if(count($deposits) == 0)
                                <tr>
                                    <td colspan="4" class="col-span-full text-center py-2">No deposits yet ...</td>
                                </tr>
                            @else
                                @foreach($deposits as $deposit)
                                    <tr>
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-2">{{ $deposit->getFormattedAmount() }}
                                            €
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ $deposit->crypto->name }}</td>
                                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{ $deposit->getFormattedQuantity() }}   {{ $deposit->crypto->acronym }}</td>
                                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $deposit->getFormattedDate() }}</td>
                                        <td class="relative whitespace-nowrap justify-center py-2 pl-3 pr-4 text-sm font-medium sm:pr-2">
                                            <a href="/deposits/{{$deposit->id}}"
                                               class="text-indigo-600 hover:text-indigo-900 px-2"><b>Edit</b></a>
                                            <form class="inline" action="/deposits/{{ $deposit->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="/deposits/{{ $deposit->id }}"
                                                   class="text-red-600 hover:text-red-900" onclick="event.preventDefault();
                                            this.closest('form').submit();"><b>Delete</b></a>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>


</x-app-layout>
