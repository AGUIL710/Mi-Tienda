<x-admin::layouts>
    <x-slot:title>
        @lang('admin::app.catalog.subservices.index.title')
    </x-slot>

    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            @lang('admin::app.catalog.subservices.index.title')
        </p>

        <div class="flex items-center gap-x-2.5">
            {!! view_render_event('bagisto.admin.catalog.subservices.index.create-button.before') !!}

            @if (bouncer()->hasPermission('catalog.subservices.create'))
                <a href="{{ route('admin.catalog.subservices.create') }}">
                    <div class="primary-button">
                        @lang('admin::app.catalog.subservices.index.add-btn')
                    </div>
                </a>
            @endif

            {!! view_render_event('bagisto.admin.catalog.subservices.index.create-button.after') !!}
        </div>        
    </div>

    {!! view_render_event('bagisto.admin.catalog.subservices.list.before') !!}

    {{-- Aquí se carga el datagrid (la tabla de subservicios) --}}
    <x-admin::datagrid :src="route('admin.catalog.subservices.index')" />

    {!! view_render_event('bagisto.admin.catalog.subservices.list.after') !!}
</x-admin::layouts>
