<?php

namespace Webkul\Admin\DataGrids\Catalog;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class SubservicesDataGrid extends DataGrid
{
    /**
     * Primary column.
     *
     * @var string
     */
    protected $primaryColumn = 'subservice_id';

    /**
     * Prepare query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('subservices')
            ->select(
                'subservices.id as subservice_id',
                'subservices.name',
                'subservices.description',
                'subservices.image',
                'subservices.status'
            );

        $this->addFilter('subservice_id', 'subservices.id');

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
            'index' => 'subservice_id', 
            'label' => trans('admin::app.catalog.subservices.index.datagrid.id'), 
            'type' => 'integer', 
            'filterable' => true, 
            'sortable' => true, 
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
            'index'      => 'name',
            'label'      => trans('admin::app.catalog.subservices.index.datagrid.name'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'description',
            'label'      => trans('admin::app.catalog.subservices.index.datagrid.description'),
            'type'       => 'string',
            'searchable' => true,
        ]);

       $this->addColumn([
            'index'              => 'status',
            'label'              => trans('admin::app.catalog.subservices.index.datagrid.status'),
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
            'url'    => fn ($row) => route('admin.catalog.subservices.edit', $row->subservice_id),
        ]);

        $this->addAction([
            'icon'   => 'icon-delete',
            'title'  => 'Eliminar',
            'method' => 'DELETE',
            'url'    => fn ($row) => route('admin.catalog.subservices.delete', $row->subservice_id),
        ]);
    }

    /**
     * Prepare mass actions.
     *
     * @return void
     */
    public function prepareMassActions()
    {
        $this->addMassAction([
            'title'  => 'Eliminar seleccionados',
            'method' => 'POST',
            'url'    => route('admin.catalog.subservices.mass_delete'),
        ]);

        $this->addMassAction([
            'title'   => 'Actualizar estado',
            'method'  => 'POST',
            'url'     => route('admin.catalog.subservices.mass_update'),
            'options' => [
                ['label' => 'Activo', 'value' => 1],
                ['label' => 'Inactivo', 'value' => 0],
            ],
        ]);
    }
}
