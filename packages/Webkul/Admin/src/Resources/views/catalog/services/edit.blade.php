<x-admin::layouts>
    <x-slot:title>
        @lang('admin::app.catalog.services.edit.title')
    </x-slot>

    {!! view_render_event('bagisto.admin.catalog.services.edit.before') !!}

    <x-admin::form
        :action="route('admin.catalog.services.update', $service->id)"
        enctype="multipart/form-data"
        method="PUT"
    >
        <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
            <p class="text-xl font-bold text-gray-800 dark:text-white">
                @lang('admin::app.catalog.services.edit.title')
            </p>

            <div class="flex items-center gap-x-2.5">
                <a
                    href="{{ route('admin.catalog.services.index') }}"
                    class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                >
                    @lang('admin::app.catalog.services.edit.back-btn')
                </a>

                <button type="submit" class="primary-button">
                    @lang('admin::app.catalog.services.edit.save-btn')
                </button>
            </div>
        </div>

        <!-- Form Content -->
        <div class="mt-3.5 flex gap-2.5 max-xl:flex-wrap">

            <!-- Left Section -->
            <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">

                <!-- Información general -->
                <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                        @lang('admin::app.catalog.services.edit.general')
                    </p>

                    <!-- Nombre -->
                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label class="required">
                            @lang('admin::app.catalog.services.edit.name')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="text"
                            name="name"
                            rules="required"
                            :value="$service->name"
                        />

                        <x-admin::form.control-group.error control-name="name" />
                    </x-admin::form.control-group>

                    <!-- Descripción -->
                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label>
                            @lang('admin::app.catalog.services.edit.description')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="textarea"
                            name="description"
                            :value="$service->description"
                            :tinymce="true"
                        />

                        <x-admin::form.control-group.error control-name="description" />
                    </x-admin::form.control-group>
                </div>

               <!-- Imagen -->
                <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                        @lang('admin::app.catalog.services.create.image')
                    </p>

                    <x-admin::media.image
                        name="image"
                        :value="$service->image ? asset('storage/' . $service->image) : null"
                    />
                </div>

                <!-- Subservicio relacionado -->
                <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                        @lang('admin::app.catalog.services.edit.related-subservice')
                    </p>

                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label>
                            @lang('admin::app.catalog.services.edit.select-subservice')
                        </x-admin::form.control-group.label>

                        <select
                            name="subservices_id"
                            class="w-full rounded-md border px-3 py-2 text-sm text-gray-600 dark:bg-gray-900 dark:text-gray-300"
                        >
                            <option value="">@lang('admin::app.catalog.services.edit.none')</option>

                            @foreach ($subservices as $subservice)
                                <option
                                    value="{{ $subservice->id }}"
                                    {{ $service->subservices_id == $subservice->id ? 'selected' : '' }}
                                >
                                    {{ $subservice->name }}
                                </option>
                            @endforeach
                        </select>

                        <x-admin::form.control-group.error control-name="subservices_id" />
                    </x-admin::form.control-group>
                </div>
            </div>

            <!-- Right Section -->
            <div class="w-[280px] max-xl:w-full flex flex-col gap-2">
                <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                        @lang('admin::app.catalog.services.edit.configurations')
                    </p>

                    <!-- Estado -->
                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label>
                            @lang('admin::app.catalog.services.edit.status')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="switch"
                            name="status"
                            value="1"
                            :checked="$service->status == 1"
                        />

                        <x-admin::form.control-group.error control-name="status" />
                    </x-admin::form.control-group>
                </div>
            </div>
        </div>
    </x-admin::form>

    {!! view_render_event('bagisto.admin.catalog.services.edit.after') !!}
</x-admin::layouts>
