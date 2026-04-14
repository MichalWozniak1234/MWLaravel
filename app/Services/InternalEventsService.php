<?php
namespace App\Services;
use App\Models\InternalEvent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class InternalEventsService
{
public function getNewestEvents() : Collection
{
    return InternalEvent::orderBy('Title')->get();
}

public function addToDB(Request $request) 
{
    $request->validate(["title"=> "required |max:20" , "link"=> "required"]);

    $model = new InternalEvent();
    $model->Title = $request->input("title");
    $model->Link = $request->input("link");
    $model->IsPublic = $request->has("isPublic");
    $model->IsCancelled = $request->has("isCancelled");
    $model->EventDateTime = $request->input("eventDate");
    // $model->CreationDateTime = $request->input("CreationDateTime");
    // $model->EditDateTime = $request->input("EditDateTime");
    $model->PublishDateTime = $request->input("publishDate");
    $model->ShortDescription = $request->input("shortDescription");
    $model->ContentHTML = $request->input("content");
    $model->MetaDescription = $request->input("metaDescription");
    $model->MetaTags = $request->input("metaTags");
    $model->Notes = $request->input("notes");
    $model->IsActive = true;
    $model->save();
}

}
