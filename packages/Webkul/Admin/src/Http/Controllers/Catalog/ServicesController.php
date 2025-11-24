<?php

namespace Webkul\Admin\Http\Controllers\Catalog;

use Illuminate\Http\JsonResponse;
use Webkul\Admin\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Webkul\Admin\DataGrids\Catalog\ServicesDataGrid;
use Webkul\Catalog\Models\Service;
use Webkul\Catalog\Models\Subservice;

class ServicesController extends Controller
{
    /**
     * List all services.
     */
    public function index()
    {
        if (request()->ajax()) {
            return datagrid(ServicesDataGrid::class)->process();
        }

        return view('admin::catalog.services.index');
    }

    /**
     * Show create form.
     */
    public function create()
    {
        $subservices = Subservice::all();

        return view('admin::catalog.services.create', compact('subservices'));
    }

    /**
     * Store a new service.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'subservices_id' => 'nullable|exists:subservices,id',
            'status'      => 'nullable|boolean',
        ]);

        $status = $request->has('status') ? 1 : 0;

         // ✅ Subir imagen normalmente
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
        }

        Service::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'image'         => $imagePath,
            'subservices_id' => $request->subservices_id,
            'status'        => $status,
        ]);

        session()->flash('success', 'Servicio creado correctamente.');

        return redirect()->route('admin.catalog.services.index');
    }

    /**
     * Show edit form.
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $subservices = Subservice::all();

        return view('admin::catalog.services.edit', compact('service', 'subservices'));
    }

    /**
     * Update existing service.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'subservices_id' => 'nullable|exists:subservices,id',
            'status'      => 'nullable|boolean',
        ]);

        $service = Service::findOrFail($id);

        // If new image uploaded, replace old one
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
            $service->image = $imagePath;
        }

        $status = $request->has('status') ? 1 : 0;

        $service->update([
            'name'          => $request->name,
            'description'   => $request->description,
            'image'         => $service->image,
            'subservices_id' => $request->subservices_id,
            'status'        => $status,
        ]);

        session()->flash('success', 'Servicio actualizado correctamente.');

        return redirect()->route('admin.catalog.services.index');
    }

    /**
     * Delete service.
     */
    public function destroy($id): JsonResponse
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return new JsonResponse([
            'message' => 'Servicio eliminado correctamente.',
        ]);
    }

    /**
     * Mass delete.
     */
    public function massDestroy(Request $request): JsonResponse
    {
        $ids = $request->input('indices', []);

        Service::whereIn('id', $ids)->delete();

        return new JsonResponse([
            'message' => 'Servicio eliminado correctamente.',
        ]);
    }

    /**
     * Mass update (status).
     */
    public function massUpdate(Request $request): JsonResponse
    {
        $ids = $request->input('indices', []);
        $status = $request->input('value', 1);

        Service::whereIn('id', $ids)->update(['status' => $status]);

        return new JsonResponse([
            'message' => 'Servicio actualizado correctamente.',
        ]);
    }
}
