<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class WebController extends Controller
{
	public function Welcome(){
		return view('welcome');
	}

    public function Patients(){
		return view('patients');
	}
 
	public function Doctors(){
		return view('doctors');
	}

	public function Medicines(){
		return view('medicines');
	}

	public function MedicalRecords(){
		return view('medicalrecords');
	}
}
