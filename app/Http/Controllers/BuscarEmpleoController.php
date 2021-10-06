<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\SEOTools;

class BuscarEmpleoController extends Controller
{
    public function index() {

        $title = "¿Dónde buscar trabajo?";
        $descripcion = "Durante la búsqueda de empleo, tu objetivo es ponerte en contacto con las empresas y convencerlas de tu idoneidad para el puesto de trabajo.";
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




        return view('buscarempleo');
    }
}
