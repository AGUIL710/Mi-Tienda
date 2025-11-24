<x-admin::layouts>
    <x-slot:title>
        @lang('admin::app.catalog.subservices.create.title')
    </x-slot>

    {!! view_render_event('bagisto.admin.catalog.subservices.create.before') !!}

    <!-- Subservices Create Form -->
    <x-admin::form
        :action="route('admin.catalog.subservices.store')"
        enctype="multipart/form-data"
    >
        <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
            <p class="text-xl font-bold text-gray-800 dark:text-white">
                @lang('admin::app.catalog.subservices.create.title')
            </p>

            <div class="flex items-center gap-x-2.5">
                <a
                    href="{{ route('admin.catalog.subservices.index') }}"
                    class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                >
                    @lang('admin::app.catalog.subservices.create.back-btn')
                </a>

                <button
                    type="submit"
                    class="primary-button"
                >
                    @lang('admin::app.catalog.subservices.create.save-btn')
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
                        @lang('admin::app.catalog.subservices.create.general')
                    </p>

                    <!-- Nombre -->
                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label class="required">
                            @lang('admin::app.catalog.subservices.create.name')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="text"
                            name="name"
                            rules="required"
                            :value="old('name')"
                            :placeholder="trans('admin::app.catalog.subservices.create.name')"
                        />

                        <x-admin::form.control-group.error control-name="name" />
                    </x-admin::form.control-group>

                    <!-- Descripción -->
                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label>
                            @lang('admin::app.catalog.subservices.create.description')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="textarea"
                            name="description"
                            :value="old('description')"
                            :placeholder="trans('admin::app.catalog.subservices.create.description')"
                            :tinymce="true"
                        />

                        <x-admin::form.control-group.error control-name="description" />
                    </x-admin::form.control-group>
                </div>

                <!-- Imagen --> 
                <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900"> 
                    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                        @lang('admin::app.catalog.subservices.create.image') 
                    
                    </p> <x-admin::media.image name="image" /> 

                </div>,

            </div>

            <!-- ✅ Right Section (Configuraciones) -->
            <div class="w-[280px] max-xl:w-full flex flex-col gap-2">
                <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                        @lang('admin::app.catalog.subservices.create.configurations')
                    </p>

                    <!-- Estado -->
                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label>
                            @lang('admin::app.catalog.subservices.create.status')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="switch"
                            name="status"
                            value="1"
                            :checked="true"
                        />
                        <x-admin::form.control-group.error control-name="status" />

                    </x-admin::form.control-group>
                </div>
            </div>
        </div>
    </x-admin::form>

    {!! view_render_event('bagisto.admin.catalog.subservices.create.after') !!}
</x-admin::layouts>
