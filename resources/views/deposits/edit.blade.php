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
            <!-- FORM -->
            <div class="grid grid-cols-1 mt-3 gap-x-8 gap-y-8 md:grid-cols-3">
                <div class="px-4 sm:px-0">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Edit diposit</h2>
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
                                    <input type="number" name="amount" id="amount"
                                           class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                           placeholder="27,45" value="{{ $deposit->amount }}" required>
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="crypto_id"
                                       class="block text-sm font-medium leading-6 text-gray-900">Crypto</label>
                                <select id="crypto_id" name="crypto_id" autocomplete=""
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                                        required>
                                    {{--                                        <option value="{{ $deposit->crypto->id}}"></option>--}}
                                    @foreach($cryptos as $crypto)
                                        <option value="{{$crypto->id}}">{{$crypto->name}} ({{ $crypto->acronym }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="sm:col-span-2">
                                <label for="quantity"
                                       class="block text-sm font-medium leading-6 text-gray-900">Quantity</label>
                                <input type="number" name="quantity" id="quantity"
                                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                       required value="{{ $deposit->getFormattedQuantity() }}">
                            </div>


                            <div class="sm:col-span-2">
                                <label for="date" class="block text-sm font-medium leading-6 text-gray-900">Date</label>
                                <div class="mt-2">
                                    <input type="date" name="date" id="date" value="{{ $deposit->date }}"
                                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                        <a href="{{ route('deposits.index') }}">
                            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                        </a>

                        <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Edit
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>


</x-app-layout>

<script>
    window.addEventListener("load", (event) => {
        document.getElementById("crypto_id").value = "<?php echo $deposit->crypto_id ?>";
        console.log(<?php echo $deposit->crypto_id ?>)

    })

</script>

