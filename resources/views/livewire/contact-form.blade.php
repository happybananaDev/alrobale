<form class="w-full flex flex-col space-y-2">

    <label class="text-xl text-yellow-900" for="name">{{__('Name')}}</label>
    <input id="name" type="text" placeholder="{{__('Name')}}..."
    class="px-2 py-4 border-2 border-yellow-900 rounded-lg text-sm" wire:model="name">
    @error('name')
        <div class="text-red-500 mb-2 px-2">
            {{ $message }}
        </div>
    @enderror

    <label class="text-xl text-yellow-900" for="email">{{__('Email')}}</label>
    <input id="email" type="text" placeholder="{{__('Email')}}..."
    class="px-2 py-4 border-2 border-yellow-900 rounded-lg text-sm" wire:model="email">
    @error('email')
        <div class="text-red-500 mb-2 px-2">
            {{ $message }}
        </div>
    @enderror

    <label class="text-xl text-yellow-900" for="object">{{__('Subject')}}</label>
    <input id="object" type="text" placeholder="{{__('Subject')}}..."
    class="px-2 py-4 border-2 border-yellow-900 rounded-lg text-sm" wire:model="subject">
    @error('subject')
        <div class="text-red-500 mb-2 px-2">
            {{ $message }}
        </div>
    @enderror

    <label class="text-xl text-yellow-900" for="message">{{__('Message')}}</label>
    <textarea id="message" placeholder="{{__('Message')}}..."
    class="px-2 py-4 border-2 border-yellow-900 rounded-lg text-sm" wire:model="emailMessage"></textarea>
    @error('emailMessage')
        <div class="text-red-500 mb-2 px-2">
            {{ $message }}
        </div>
    @enderror

    <button type="button" class="px-4 py-2 text-white border-2 bg-yellow-900
    border-white hover:border-yellow-500 text-xl mt-5 rounded-lg
    ease-in duration-300" wire:click="sendEmail">{{__('Send')}}</button>

    @if ($success)
        <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-full"
             role="alert">
            <span class="block sm:inline">{{ $message }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" wire:click="closeSuccess">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20">
                        <title>Chiudi</title>
                        <path
                            d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414l-2.93 2.93a1 1 0 01-1.414-1.414l2.93-2.93-2.93-2.93a1 1 0 111.414-1.414l2.93 2.93 2.93-2.93a1 1 0 111.414 1.414l-2.93 2.93 2.93 2.93a1 1 0 010 1.414z">
                        </path>
                    </svg>
                </span>
        </div>
    @endif
    @if ($error)
        <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative w-full" role="alert">
            <span class="block sm:inline">{{ $message }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" wire:click="closeError">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20">
                        <title>Chiudi</title>
                        <path
                            d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414l-2.93 2.93a1 1 0 01-1.414-1.414l2.93-2.93-2.93-2.93a1 1 0 111.414-1.414l2.93 2.93 2.93-2.93a1 1 0 111.414 1.414l-2.93 2.93 2.93 2.93a1 1 0 010 1.414z">
                        </path>
                    </svg>
                </span>
        </div>
    @endif
</form>
