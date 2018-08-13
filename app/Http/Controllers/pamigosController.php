<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pamigos;
use App\Usuarios;

class pamigosController extends Controller
{
    public function registroAmigo(Request $request){

		$referente_form = $request['referente'];
		$pais_amigo 	= $request['pais_amigo'];
		$nombre_amigo 	= $request['nom_amigo'];
		$email_amigo 	= $request['email_amigo'];
		$tel_amigo 		= $request['num_amigo'];


		$referente = Usuarios::where('usu_mobile', $referente_form)->first();

		if ($referente == NULL) {
			dd('no existe usuario, registrese primero');
		}else{

			$validaAmigo = pamigos::where('usu_cod', $referente->usu_cod)->where('tel_amigo',$tel_amigo )->count();

			if ($validaAmigo > 0) {
				dd('Ya invitaste a este amigo, invita a otro');
			}else{
				$amigo               = new pamigos();
				$amigo->usu_cod      = $referente->usu_cod;
				$amigo->pais_amigo   = $pais_amigo;
				$amigo->nombre_amigo = $nombre_amigo;
				$amigo->email_amigo  = $email_amigo;
				$amigo->tel_amigo    = $tel_amigo;
				$amigo->save();
			}

			
		}


		



    }
}
