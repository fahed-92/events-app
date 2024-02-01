<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class StoreController extends Controller
{
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = Store::all();
        return view('admin.store.index' , compact('store'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.store.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorestoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorestoreRequest $request)
    {
//        $module_name_plural = $this->getClassNameFromModel();
//        $this->validate($request, [
//            'title_en'=> 'required',
//            'title_ar'=> 'required',
//            'description_en'=> 'required',
//            'description_ar'=> 'required',
//        ]);

//        $data = $request->all();

        $status = Store::create([
            'item'=>$request->item,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'expire'=>$request->expire,
            'is_active'=>1,
        ]);
        if($status){
            return redirect()->route('admin.store.index')->with('success', 'تم الإضافة بنجاح');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        return view('admin.store.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStoreRequest  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStoreRequest $request,$id)
    {
        $service = Store::findOrFail($id);
        $data = $request->except('id');
        $service->update([
            'item'=>$request->item,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'expire'=>$request->expire,
            'is_active'=>1,
        ]);
        return back()->with('success', 'تم تحديث البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }
    public function upload($folderName,$image)
    {
        $folder = public_path('admin/assets/images/'. $folderName. '/');
        $filename = time() . '.' . $image->getClientOriginalName();
        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0775, true, true);
        }
        $image->move($folder,$filename);
        return $filename;
    }
    public function import(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        // Get the uploaded file
        $file = $request->file('file');

        // Process the Excel file
        Excel::import(new ImoortStoreItems, $file);

        return redirect()->back()->with('success', 'Excel file imported successfully!');
    }
}
