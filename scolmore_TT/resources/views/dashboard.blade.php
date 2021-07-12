<x-app-layout>
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
                                <div class="flex justify-center">
                                    <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Send Email Form</h1>
                                </div>
                                <div class="flex justify-center text-centershadow overflow-hidden border-b border-gray-200 sm:rounded-lg ">

                                    <form style="width: 70%;" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="grid grid-cols-1 mt-4 mb-4 mx-7">
                                            <label class="uppercase md:text-sm text-md text-gray-500 text-light font-semibold">From</label>
                                            <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" value="{{Auth::user()->name}}" readonly/>
                                        </div>

                                        <div class="grid grid-cols-1 mt-4 mb-4 mx-7">
                                            <label class="uppercase md:text-sm text-md text-gray-500 text-light font-semibold">Recipient</label>
                                            
                                                
                                                <input type="email" name="email" :value="old('email')" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Recipient" />
                                            
                                        </div>

                                        <div class="grid grid-cols-1 mt-4 mb-4 mx-7">
                                            <label class="uppercase md:text-sm text-md text-gray-500 text-light font-semibold">Message</label>
                                            <textarea class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Message"></textarea>
                                        </div>


                                        <div class="flex items-center justify-end mt-4 mb-4">
                                            <x-jet-button class="ml-4 ">
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
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    1
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ Auth::user()->name }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">123@123.com</div>
                                                    <div class="text-sm text-gray-500">Optimization</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                Jane Cooper
                                                            </div>
                                                            <div class="text-sm text-gray-500">
                                                                jane.cooper@example.com
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    08/07/2021
                                                </td>
                                                <td class="px-6 py-4  whitespace-nowrap  text-sm font-medium">
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        Active
                                                    </span>
                                                </td>
                                            </tr>

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


</x-app-layout>

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