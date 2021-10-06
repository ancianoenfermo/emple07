<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;


use Artesaos\SEOTools\Facades\SEOTools;




class HomeController extends Controller
{
    public function __invoke()
    {
        $title = "¿Buscas empleo?";
        $descripcion = "Para que tu proceso de búsqueda pueda obtener mejores frutos, es preciso que te prepares y aproveches cualquier oportunidad para venderte en el mercado laboral y encontrar trabajo con éxito.";
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

        return view('welcome');
    }


}
