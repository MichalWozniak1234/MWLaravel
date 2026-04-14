<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InternalEventsService;

class InternalEventsController extends Controller
{
    public function index() : mixed
    {
         $eventService = new InternalEventsService();
         $result = $eventService->getNewestEvents();

        //pobieramy z warstwy model dane których potrzebujemy na widoku
        return view("internalEvents.index",["events"=>$result]);
    }

    public function createNew() : mixed
    {
        return view("internalEvents.createNew");
    }

    public function addToDB(Request $request) 
    {
        $eventService = new InternalEventsService;
        $result = $eventService->addToDB($request);

        return redirect("/internal-events");
    }

}
