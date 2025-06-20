<?php

namespace App\Http\Controllers;

use App\Services\InstagramService;

class InstagramController extends Controller
{
    protected $instagram;

    public function __construct(InstagramService $instagram)
    {
        $this->instagram = $instagram;
    }

    public function index()
    {
        return $this->instagram->getUserMedia();
        //$media = $this->instagram->getUserMedia();
        //return view('instagram.index', compact('media'));
    }
}
