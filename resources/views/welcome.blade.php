<x-layouts.app :title="__('Home')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div>
            @foreach ($featuredPosts as $post)
                <x-card.postindex :post="$post">
                    {{ $post->title }}
                </x-card.postindex>
            @endforeach
        </div>
        <div class="flex flex-wrap">
            <main class="flex w-full flex-col md:w-3/4">
                <x-heading>Latest post</x-heading>
                <div class="grid auto-rows-min gap-4 md:grid-cols-2">
                    @foreach ($latestPosts as $post)
                        <x-card.postindex :post="$post">
                            {{ $post->title }}
                        </x-card.postindex>
                    @endforeach
                </div>
            </main>
            <aside class="flex w-full flex-col px-3 md:w-1/4 mb-20">
                SIDE
            </aside>
        </div>
    </div>
</x-layouts.app>
