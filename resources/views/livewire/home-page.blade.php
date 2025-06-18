<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div style="background-color:#262522" class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                
                <link rel="stylesheet" href="/css/chessboard-1.0.0.min.css" />
                <main>
                    <div id="myBoards" class="pb-5 text-white" style="width: 60%; float:left">
                        <h1>Home page</h1>

                        

                    </div>
                    
                    
                    <div class="pl-2 text-[#C3C3C2]"style="width: 40%; float: left; background-color: #262522; overflow: hidden; padding-left: 25px;">    
                        @livewire('inner-nav')
                        
                        <hr class="pt-[2px] mt-1" style="border-top: 1px solid #3C3B39" />
                        
                        <div class="clear-both"></div>

                        <div class="flex relative">
                            <p class="text-[13px] left">Chess AI Analysis </p>
                            <span class="text-[13px] right-[0] absolute">Depth=245 | Engine 17.1</span>
                        </div>
                        <hr class="mt-1" style="border-top: 1px solid #3C3B39" />
                    </div>
                </main>

                <script src="/script/jquery-3.7.1.min.js"></script>
                <script src="/script/chessboard-1.0.0.min.js"></script>
                <script src="/script/chess-0.10.2.min.js"></script>
                {{-- <script src="/script/main.js"></script> --}}

            </div>
        </div>
    </div>
</div>
