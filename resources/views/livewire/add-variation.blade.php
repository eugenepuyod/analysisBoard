<div>
    <!-- Main modal -->
    <div  class="pb-[10px]">
        <button wire:ignore.self data-modal-target="crud-modal" data-modal-toggle="crud-modal" id="savebutton" class="hidden w-[100%] bg-[#81B64C] hover:bg-[#A3D160] text-white font-bold py-2 rounded">
            <div style="margin:0 auto" class="w-[100px] display-block">
                <svg class="h-6 w-6 text-white absolute hover:text-[#fff]"  fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                <span class="text-[18px] hover:text-[#fff]">Save</span>
            </div>
        </button>
    </div>

    <div wire:ignore.self id="hideAll" class="hidden absolute bg-[#302E2B] w-full h-full top-0 left-0 opacity-60"></div>
    
    <div wire:ignore.self id="crud-modal" tabindex="-1" aria-hidden="true" 
        class="hidden overflow-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        
        <div class="my-[10%] mx-[auto] relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Add Game
                    </h3>
                    <button wire:click="cancel"
                        type="button" 
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" 
                        data-modal-toggle="child-crud-modal"
                    >
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="formcontainer">
                    <form wire:submit.prevent="submit" class="p-4 md:p-5">
                        {{-- <input type="hidden" id="gameName" name="gameName" value="Book">
                        <input type="hidden" id="description" name="description" value="Book">
                        <input type="hidden" id="colorWonId" name="colorWon"> --}}
                        {{-- <input type="hidden" id="book" name="book" value="1">
                        <input type="hidden" id="play" name="play" value="0">
                        <input type="hidden" id="redirect" name="redirect" value=""> --}}
                        {{-- <input type="hidden" id="variantionId" name="variantionId"> --}}
                        {{-- <input type="hidden" id="fened" name="fened"> --}}
                        {{-- <input type="hidden" id="moveIdId" name="moveId">
                        <input type="hidden" id="moveSourceId" name="moveSource"> --}}

            
                        <div class="hidden" id="wirefened"></div>
                        <div class="hidden" id="wiremoveId"></div>
                        <div class="hidden" id="wiremoveSourceId"></div>
                        <div class="hidden" id="wiregameVariantion"></div>

                        <div class="hidden" id="wiregameturn"></div>
                        <div class="hidden" id="wirecolorWon"></div>


                        <div class="grid gap-4 mb-4 grid-cols-2">

                            {{-- <span>Display test here </span> --}}
                            
                            
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name <span class="text-red-500">*</span></label>
                                <input wire:model.live="name" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type game name">
                                @error('name')
                                    <span class="text-red-500 text-[12px]">{{ $message }}</span>
                                @enderror
                            </div>
                
                            <div class="col-span-2 sm:col-span-1">
                                <label for="player" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Players</label>
                                <select wire:model.live="player" id="player" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected="">Select Players</option>
                                    <option value="1">Carlsen</option>
                                    <option value="2">Kasparov</option>
                                </select>
                            </div>

                            <div class="col-span-2 sm:col-span-1">
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                <select wire:model.live="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected="">Select Category</option>
                                    <option value="1">Play Game</option>
                                    <option value="2">Booked Game</option>
                                </select>
                            </div>


                            <div class="col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description <span class="text-red-500">*</span></label>
                                <textarea wire:model.live="description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write game description here"></textarea>
                                @error('description')
                                    <span class="text-red-500 text-[12px]">{{ $message }}</span>
                                @enderror
                            
                                
                            </div>
                        </div>
                        
                        <div class="flex justify-between space-x-3">
                                {{-- <button type="submit" class="text-white inline-flex items-center bg-[#3C3B39] hover:bg-[#454341] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="me-1 -ms-1 h-4 w-4 text-[#fff]"  width="24" height="24" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="12" y1="5" x2="12" y2="19" />  <line x1="5" y1="12" x2="19" y2="12" /></svg>
                                    <pan class="text-[#fff]">Submit</span>
                                </button> --}}
                                <button type="submit" data-modal-hide="popup-modal" 
                                    class="w-full inline-flex items-center justify-center py-2.5 px-5 mss-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                    <svg class="me-1 -ms-1 h-4 w-4 text-gray-900" width="24" height="24" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="12" y1="5" x2="12" y2="19" />  <line x1="5" y1="12" x2="19" y2="12" /></svg>
                                    <pan class="text-gray-900">Save Game</span>
                                </button>
                            
                            
                                <button wire:click="cancel" id="cancebutton" type="button" 
                                    class="w-full text-white inline-flex items-center justify-center bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="me-1 -ms-1 h-4 w-4 text-white"  fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/></svg>
                                    Cancel
                                </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
        <script>
            // const modal = document.getElementById('crud-modal');
            
            document.querySelector('[data-modal-target="crud-modal"]').addEventListener('click', function(){
                const data = ['crud-modal', 'hideAll'];
                
                let fened = document.getElementById("wirefened").innerText;
                let moveId = document.getElementById("wiremoveId").innerText;
                let moveSourceId = document.getElementById("wiremoveSourceId").innerText;
                let gameVariantion = document.getElementById("wiregameVariantion").innerText;

                let wirecolorWon = document.getElementById("wirecolorWon").innerText;
                let wiregameturn = document.getElementById("wiregameturn").innerText;

                for(var i = 0; i < data.length; i++){
                    document.getElementById(data[i]).classList.remove('hidden');
                }

                @this.set('fened', fened);
                @this.set('moveId', moveId);
                @this.set('moveSourceId', moveSourceId);
                @this.set('gameVariantion', gameVariantion);
                @this.set('wirecolorWon', wirecolorWon);
                @this.set('gameturn', wiregameturn);
            })
            document.querySelector('[data-modal-toggle="child-crud-modal"]').addEventListener('click', function(){
                const data = ['crud-modal', 'hideAll'];
                for(var i = 0; i < data.length; i++){
                    document.getElementById(data[i]).classList.add('hidden');
                }
            })
            document.getElementById('cancebutton').addEventListener('click', function(){
                const data = ['crud-modal', 'hideAll'];
                for(var i = 0; i < data.length; i++){
                    document.getElementById(data[i]).classList.add('hidden');
                }
            })
            // window.addEventListener('click', function (event) {
            //     if (event.target === document.getElementById('crud-modal')) {
            //         document.getElementById('crud-modal').classList.add('hidden');
            //         document.getElementById('hideAll').classList.add('hidden');
            //     }
            // });
            
        </script>
</div>