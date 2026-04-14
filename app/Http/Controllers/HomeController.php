<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Mix;
use Illuminate\Http\Request;
use App\Services\InternalEventsService;

class HomeController extends Controller
{
    public function index() : mixed
    {
         $eventService = new InternalEventsService();
         $result = $eventService->getNewestEvents();

        //pobieramy z warstwy model dane których potrzebujemy na widoku
        return view("home.index",["events"=>$result]);
    }
}
