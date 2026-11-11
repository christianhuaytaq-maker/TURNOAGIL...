<?php
namespace App\Http\Controllers;
use App\Models\Ventanilla;
use Illuminate\Http\Request;

class VentanillaController extends Controller
{
    public function index()
    {
        $ventanillas = Ventanilla::all();
        return view('ventanillas.index', compact('ventanillas'));
    }
}
