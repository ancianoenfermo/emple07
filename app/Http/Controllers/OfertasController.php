<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;
use App\Models\Tipotodo;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\SEOTools;



class OfertasController extends Controller
{
    public function index() {
        $title = "Ofertas de trabajo";
        $descripcion = "Ofertas de trabajo publicadas en España.";
        $image = asset('img/home/buscar-empleo.jpg');

        SEOTools::setTitle($title);
        SEOTools::setDescription($descripcion);
        SEOTools::setCanonical(URL::current());

        SEOTools::opengraph()->setUrl(URL::current());
        SEOTools::opengraph()->addImage($image);
        SEOTools::opengraph()->addProperty('type','website');

        SEOTools::twitter()->setSite('site','@wiempleo');
        SEOTools::twitter()->setImage($image);
        SEOTools::twitter()->setType('type','summary_large_image');


        return view('ofertas');
    }
}
