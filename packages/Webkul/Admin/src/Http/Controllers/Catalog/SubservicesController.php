<?php

namespace Webkul\Admin\Http\Controllers\Catalog;

use Illuminate\Http\JsonResponse;
use Webkul\Admin\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Webkul\Admin\DataGrids\Catalog\SubservicesDataGrid;
use Webkul\Catalog\Models\Subservice;
class SubservicesController extends Controller
{
    /**
     * List all subservices.
     */
    public function index()
    {
        if (request()->ajax()) {
            return datagrid(SubservicesDataGrid::class)->process();
        }

        return view('admin::catalog.subservices.index');
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('admin::catalog.subservices.create');
    }

    /**
     * Store a new subservice.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status'      => 'nullable|boolean',
        ]);

        // procesar estado
        $status = $request->has('status') ? 1 : 0;

        // ✅ Subir imagen normalmente
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('subservices', 'public');
        }

        Subservice::create([
            'name'        => $request->name,
            'description' => $request->description,
            'image'       => $imagePath,
            'status'      => $status,
        ]);

        session()->flash('success', 'Subservicio creado exitosamente.');

        return redirect()->route('admin.catalog.subservices.index');
    }




    /**
     * Show edit form.
     */
    public function edit($id)
    {
        $subservice = Subservice::findOrFail($id);

        return view('admin::catalog.subservices.edit', compact('subservice'));
    }

    /**
     * Update existing subservice.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status'      => 'nullable|boolean',
        ]);

        $subservice = Subservice::findOrFail($id);

        // If new image uploaded, replace old one
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('subservices', 'public');
            $subservice->image = $imagePath;
        }

        // procesar estado
        $status = $request->has('status') ? 1 : 0;

        $subservice->update([
            'name'        => $request->name,
            'description' => $request->description,
            'image'       => $subservice->image,
            'status'      => $status,
        ]);

        session()->flash('success', 'Subservicio actualizado correctamente!');

        return redirect()->route('admin.catalog.subservices.index');
    }

    /**
     * Delete a subservice.
     */
    public function destroy($id): JsonResponse
    {
        $subservice = Subservice::findOrFail($id);
        $subservice->delete();

        return new JsonResponse([
            'message' => 'Subservicio eliminado correctamente.',
        ]);
    }

    /**
     * Mass delete subservices.
     */
    public function massDestroy(Request $request): JsonResponse
    {
        $ids = $request->input('indices', []);

        Subservice::whereIn('id', $ids)->delete();

        return new JsonResponse([
            'message' => 'Subservicio eliminado correctamente.',
        ]);
    }

    /**
     * Mass update subservice status.
     */
    public function massUpdate(Request $request): JsonResponse
    {
        $ids = $request->input('indices', []);
        $status = $request->input('value', 1);

        Subservice::whereIn('id', $ids)->update(['status' => $status]);

        return new JsonResponse([
            'message' => 'Subservicio actualizado correctamente.',
        ]);
    }

}
