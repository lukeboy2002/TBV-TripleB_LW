<a {{ $attributes->merge(['class' => 'text-primary uppercase bg-button-primary hover:bg-button-primary-hover focus:outline-none focus:bg-button-primary-hover font-medium rounded-lg text-xs px-5 py-2.5 text-center inline-flex items-center me-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
