<div>
    <button wire:click="requestDataFromB" class="bg-green-700 py-2 px-2 rounded mx-2 my-2 text-white">
        Request Data from Component B
    </button>

    @if ($response)
        <pre>{{ json_encode($response) }}</pre>
    @endif
</div>
