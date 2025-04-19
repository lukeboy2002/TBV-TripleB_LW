<div>
    <a href="#">
        <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt=""/>
    </a>
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-accent">{{ $post->title }}</h5>
        </a>
        <div class="flex gap-2 items-center py-4">
            <div>
                <div class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                <span
                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                    {{ $post->author->initials() }}
                </span>
                </div>
            </div>
            <div class="text-xs">by <span class="text-secondary">{{ ($post->author->username) }}</span></div>
            <div class="text-xs lowercase">{{ $post->getFormattedDate() }}</div>
        </div>
        <p class="mb-3 font-normal text-primary">Here are the biggest enterprise technology
            acquisitions of 2021 so far, in reverse chronological order.</p>
        <x-button.button-link-primary href="#">Read More</x-button.button-link-primary>

    </div>
</div>
