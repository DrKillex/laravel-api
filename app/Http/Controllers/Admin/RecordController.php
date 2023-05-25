<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecordRequest;
use App\Http\Requests\UpdateRecordRequest;
use App\Models\Record;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Record::all();

        return view('admin.records.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types=Type::all();
        $technologies=Technology::all();
        return view('admin.records.create', compact('types','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecordRequest $request)
    {
        $data = $request->validated();
        $newRecord = new Record();
        $newRecord->slug = Str::slug($data['title']);
        if (isset($data['image'])) {
            $newRecord->image = Storage::put('uploads', $data['image']);
        }
        $newRecord->fill($data);
        $newRecord->save();
        if(isset($data['technologies'])){
            $newRecord->technologies()->sync($data['technologies']);
        }
        return redirect()->route('admin.records.show', $newRecord);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record)
    {
        return view('admin.records.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        $types=Type::all();
        $technologies=Technology::all();
        return view('admin.records.edit', compact('record','types','technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecordRequest $request, Record $record)
    {
        $data = $request->validated();
        $record->slug = Str::slug($data['title']);
        if(isset($data['delete_image'])){
            if($record->image){
                Storage::delete($record->image);
                $record->image = null;
            }
        } else {
            if (isset($data['image'])) {
                if($record->image){
                    Storage::delete($record->image);
                }
                $record->image = Storage::put('uploads', $data['image']);
            }
        }
        $technologies = isset($data['technologies']) ? $data['technologies'] : [];
        $record->technologies()->sync($technologies);
        $record->update($data);
        return view('admin.records.show', compact('record'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record)
    {
        $record->delete();
        if($record->image){
            Storage::delete($record->image);
        }
        return to_route('admin.records.index');
    }
}
