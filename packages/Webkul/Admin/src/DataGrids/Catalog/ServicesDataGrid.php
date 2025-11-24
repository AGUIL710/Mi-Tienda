<?php

namespace Webkul\Admin\DataGrids\Catalog;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class ServicesDataGrid extends DataGrid
{
    /**
     * Primary column.
     *
     * @var string
     */
    protected $primaryColumn = 'service_id';

    /**
     * Prepare query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('services')
            ->leftJoin('subservices', 'services.subservices_id', '=', 'subservices.id')
            ->select(
                'services.id as service_id',
                'services.name',
                'services.description',
                'services.image',
                'services.status',
                'subservices.name as subservice_name'
            )
            ->orderBy('services.id', 'DESC'); // 👈 ORDENAR DE MAYOR A MENOR

        $this->addFilter('service_id', 'services.id');
        $this->addFilter('subservice_name', 'subservices.name');

        return $queryBuilder;
    }

    /**
     * Add columns.
     *
     * @return void
     */
    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'service_id',
            'label'      => trans('admin::app.catalog.services.index.datagrid.id'),
            'type'       => 'integer',
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'name',
            'label'      => trans('admin::app.catalog.services.index.datagrid.name'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'description',
            'label'      => trans('admin::app.catalog.services.index.datagrid.description'),
            'type'       => 'string',
            'searchable' => true,
        ]);

        // ✅ Imagen
        $this->addColumn([
            'index'   => 'image',
            'label'   => 'Imagen',
            'type'    => 'string',
            'closure' => function ($row) {
                if ($row->image) {
                    $imageUrl = asset('storage/' . $row->image);
                    return '<img src="' . $imageUrl . '" alt="Imagen" width="85" height="55" style="object-fit: cover; border-radius: 8px;">';
                }
                return '<span class="text-gray-400">Sin imagen</span>';
            },
        ]);

        $this->addColumn([
            'index'      => 'subservice_name',
            'label'      => trans('admin::app.catalog.services.index.datagrid.subservice'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'              => 'status',
            'label'              => trans('admin::app.catalog.services.index.datagrid.status'),
            'type'               => 'boolean',
            'filterable'         => true,
            'filterable_options' => [
                ['label' => 'Activo', 'value' => 1],
                ['label' => 'Inactivo', 'value' => 0],
            ],
            'sortable'   => true,
            'closure'    => function ($value) {
                return $value->status
                    ? '<span class="badge badge-md badge-success">Activo</span>'
                    : '<span class="badge badge-md badge-danger">Inactivo</span>';
            },
        ]);
    }

    /**
     * Prepare actions.
     *
     * @return void
     */
    public function prepareActions()
    {
        $this->addAction([
            'icon'   => 'icon-edit',
            'title'  => 'Editar',
            'method' => 'GET',
            'url'    => fn ($row) => route('admin.catalog.services.edit', $row->service_id),
        ]);

        $this->addAction([
            'icon'   => 'icon-delete',
            'title'  => 'Eliminar',
            'method' => 'DELETE',
            'url'    => fn ($row) => route('admin.catalog.services.delete', $row->service_id),
        ]);

        $this->addMassAction([
            'title'  => 'Eliminar seleccionados',
            'method' => 'POST',
            'url'    => route('admin.catalog.services.mass_delete'),
        ]);

        $this->addMassAction([
            'title'   => 'Actualizar estado',
            'method'  => 'POST',
            'url'     => route('admin.catalog.services.mass_update'),
            'options' => [
                ['label' => 'Activo', 'value' => 1],
                ['label' => 'Inactivo', 'value' => 0],
            ],
        ]);
    }
}
