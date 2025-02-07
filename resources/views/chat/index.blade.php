<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- <style>
        tailwind.config= {
            corePlugins: {
                preflight: false,
            }
            ,
        }
    </style> --}}
    <title>Chat</title>
</head>

<body class="bg-neutral-200 h-screen">
    <main>
        <h1 class="mt-10 text-center text-2xl">
            Bienvenue sur le chat
        </h1>

        <section class="mt-20">
            @forelse ($chats as $chat)
                @if ($chat->user == Auth::user())
                    @php
                        $side = 'end';
                    @endphp
                @else
                    @php
                        $side = 'start';
                    @endphp
                @endif
                <div class="flex justify-{{ $side }}">
                    <div class="bg-white p-4 m-4 rounded-lg shadow-lg">
                        <h2 class="text-md font-bold">{{ $chat->user->name }}</h2>
                        <p>{{ $chat->message }}</p>
                    </div>
                </div>
            @empty
                <div class="w-8/12">
                    <div class="bg-white p-4 m-4 rounded-lg shadow-lg">
                        <p>Pas de message pour le moment :'(</p>
                    </div>
                </div>
            @endforelse
            <section class="flex justify-center mt-10">
                <section class="pb-4 bg-white rounded-lg shadow-lg mb-6 bottom-0 w-6/12">
                    <form action="{{ route('chat.store') }}" method="post" class="mt-10" class="">
                        @csrf
                        <input type="text" name="message" class="ml-6 p-2 border border-gray-300 rounded-lg w-10/12"
                            placeholder="Votre message">
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg ml-2">Envoyer</button>
                    </form>
                </section>
            </section>
    </main>
</body>

</html>
