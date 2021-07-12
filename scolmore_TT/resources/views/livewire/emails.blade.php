<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-12 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <!-- Tabs -->
                                <ul id="tabs" class="inline-flex align-middle w-full px-1 pt-2 ">
                                    <li class="px-4 py-2 -mb-px font-semibold text-gray-800 border-b-2 border-blue-400 rounded-t opacity-50"><a id="default-tab" href="#sendMessage-tab">Send Message</a></li>
                                    <li class="px-4 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#viewMessage-tab">View Sent Messages</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab contents Below  -->
                <div id="tab-contents">
                    <!-- First tab -->
                    <div class="flex flex-col" id="sendMessage-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-4 py-4">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 ">
                                <div class="flex justify-center -py-2">
                                    @if (session()->has('success'))

                                    <div class="bg-green-100 border border-green-900 text-green-700 px-4 py-3 rounded relative" role="alert">
                                        <strong class="font-bold text-green-700">Success! </strong>
                                        <span class="block sm:inline"> {{ session('success') }}</span>

                                    </div>
                                    @elseif (session()->has('error'))
                                    <div class="bg-red-100 border border-red-900 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        <strong class="font-bold text-green-700">Error! </strong>
                                        <span class="block sm:inline"> {{ session('error') }}</span>

                                    </div>
                                    @endif
                                </div>
                                <div class="flex justify-center">

                                    <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Send Email Form</h1>
                                </div>
                                <div class="flex justify-center text-centershadow overflow-hidden border-b border-gray-200 sm:rounded-lg ">

                                    <form style="width: 70%;" method="POST" action="{{ route('emails') }}">
                                        @csrf

                                        <!-- <div class="grid grid-cols-1 mt-4 mb-4 mx-7">
                                            <label class="uppercase md:text-sm text-md text-gray-500 text-light font-semibold">From</label>
                                            <input wire:model="message_from" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" value="{{Auth::user()->name}}" />
                                        </div> -->

                                        <div class="grid grid-cols-1 mt-4 mb-4 mx-7">
                                            <!-- <label class="uppercase md:text-sm text-md text-gray-500 text-light font-semibold">Recipient</label> -->
                                            <!-- <select name="email" wire:model="message_to" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                                                <option value=''>Choose an email</option>
                                                @foreach($users as $user)
                                                <option value={{ $user->email }}> {{ $loop->index + 1 }} - {{ $user->email }}</option>
                                                @endforeach
                                            </select> -->
                                            <label class="uppercase md:text-sm text-md text-gray-500 text-light font-semibold">Recipient</label>
                                            <input wire:model="message_to" list="emails" placeholder="Recipient email" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" :value="old('message_to')" />
                                            <datalist id="emails">
                                                @foreach($users as $user)
                                                <option value={{ $user->email }}>
                                                @endforeach
                                            </datalist>


                                            @error('message_to')
                                            <div class="bg-red-100 border border-red-900 text-red-700 px-4 py-3 rounded relative" role="alert">
                                                <strong class="font-bold text-red-700">ERROR! </strong>
                                                <span class="block sm:inline"> {{ $message }}</span>

                                            </div>
                                            @enderror
                                        </div>

                                        <div class="grid grid-cols-1 mt-4 mb-4 mx-7">
                                            <label class="uppercase md:text-sm text-md text-gray-500 text-light font-semibold">Subject</label>
                                            <input wire:model="subject" type="text" name="subject" :value="old('subject')" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" placeholder="subject" />
                                            @error('subject')
                                            <div class="bg-red-100 border border-red-900 text-red-700 px-4 py-3 rounded relative" role="alert">
                                                <strong class="font-bold text-red-700">ERROR!</strong>
                                                <span class="block sm:inline">{{ $message }}</span>

                                            </div>
                                            @enderror
                                        </div>

                                        <div class="grid grid-cols-1 mt-4 mb-4 mx-7">
                                            <label class="uppercase md:text-sm text-md text-gray-500 text-light font-semibold">Message</label>
                                            <textarea wire:model="message" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" placeholder="Message"></textarea>
                                            @error('message')
                                            <div class="bg-red-100 border border-red-900 text-red-700 px-4 py-3 rounded relative" role="alert">
                                                <strong class="font-bold text-red-700">ERROR!</strong>
                                                <span class="block sm:inline">{{ $message }}</span>

                                            </div>
                                            @enderror
                                        </div>


                                        <div class="flex items-center justify-end mt-4 mb-4">

                                            <x-jet-button type="reset" style="background-color: #d1a319" class="ml-4 ">
                                                {{ __('Reset') }}
                                            </x-jet-button>
                                            <x-jet-button style="background-color: green" wire:click.prevent="sendEmail()" class="ml-4 ">
                                                {{ __('Send') }}
                                            </x-jet-button>

                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="flex flex-col" id="viewMessage-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-12 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-black-500 uppercase tracking-wider">
                                                    Num
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-black-500 uppercase tracking-wider">
                                                    From
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    To
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Message
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Time Sent
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Status
                                                </th>
                                                <!-- <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th> -->
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($emails as $message)
                                            <tr wire:on>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $loop->index + 1 }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ Auth::user()->email }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ $message->message_to }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ $message->message }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $message->created_at }}
                                                </td>
                                                <td class="px-6 py-4  whitespace-nowrap  text-sm font-medium">
                                                    @if ($message->status == 'sent')
                                                    <span style="background-color: 	#d1a319;" class="px-2 inline-flex text-sm text-white leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                        Sent
                                                    </span>
                                                    @elseif ($message->status == 'delivered')
                                                    <span class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        Delivered
                                                    </span>
                                                    @elseif ($message->status == 'opened')
                                                    <span style="background-color: 	#4B0082;" class="px-2 inline-flex text-sm text-white leading-5 font-semibold rounded-full bg-Indigo-100 text-Indigo-800">
                                                        Opened
                                                    </span>
                                                    @endif

                                                </td>
                                            </tr>


                                            @endforeach

                                            <!-- More people... -->
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>


    <style>
        .active {
            color: white;
            background-color: teal;
            border-radius: 10px;
        }
    </style>

    <script>
        let tabsContainer = document.querySelector("#tabs");

        let tabTogglers = tabsContainer.querySelectorAll("a");
        console.log(tabTogglers);

        tabTogglers.forEach(function(toggler) {
            toggler.addEventListener("click", function(e) {
                e.preventDefault();

                let tabName = this.getAttribute("href");

                let tabContents = document.querySelector("#tab-contents");

                for (let i = 0; i < tabContents.children.length; i++) {

                    tabTogglers[i].parentElement.classList.remove("active", "border-b", "-mb-px", "opacity-100");
                    tabContents.children[i].classList.remove("hidden");
                    if ("#" + tabContents.children[i].id === tabName) {
                        continue;
                    }
                    tabContents.children[i].classList.add("hidden");


                }
                e.target.parentElement.classList.add("active", "border-b-4", "-mb-px", "opacity-100");

            });
        });

        document.getElementById("default-tab").click();
    </script>