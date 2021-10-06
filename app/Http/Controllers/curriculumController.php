<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\SEOTools;

class curriculumController extends Controller
{
    public function index() {

        $title = "El curriculum vitae";
        $descripcion = "Es un resumen del conjunto de estudios, méritos, cargos, premios, experiencia laboral que ha desarrollado u obtenido una persona a lo largo de su vida laboral o académica.";
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

        return view('curriculum');
    }
}
