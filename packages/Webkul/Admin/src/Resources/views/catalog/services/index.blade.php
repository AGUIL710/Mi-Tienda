<x-admin::layouts>
    <x-slot:title>
        @lang('admin::app.catalog.services.index.title')
    </x-slot>

    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            @lang('admin::app.catalog.services.index.title')
        </p>

        <div class="flex items-center gap-x-2.5">
            {!! view_render_event('bagisto.admin.catalog.services.index.create-button.before') !!}

            @if (bouncer()->hasPermission('catalog.services.create'))
                <a href="{{ route('admin.catalog.services.create') }}">
                    <div class="primary-button">
                        @lang('admin::app.catalog.services.index.add-btn')
                    </div>
                </a>
            @endif

            {!! view_render_event('bagisto.admin.catalog.services.index.create-button.after') !!}
        </div>        
    </div>

    {!! view_render_event('bagisto.admin.catalog.services.list.before') !!}

    {{-- Aquí se carga el datagrid (la tabla de servicios) --}}
    <x-admin::datagrid :src="route('admin.catalog.services.index')" />

    {!! view_render_event('bagisto.admin.catalog.services.list.after') !!}
</x-admin::layouts>
