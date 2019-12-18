<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Medicoes;

class MedicaoController extends Controller
{
	private $medicao;

    public function __construct(Medicoes $medicao)
	{
		$this->medicao = $medicao;
	}

	public function index()
    {
    	return response()->json($this->medicao->all());
    }

	public function show($id)
    {
    	$medicao = $this->medicao->find($id);

    	if(! $medicao) return response()->json(['data' => ['msg' => 'achou N']], 404);

    	$data = ['data' => $medicao];
	    return response()->json($data);
    }

    public function store(Request $request)
    {
    	//return response()->json(['data' => ['msg' => 'medidor cadastrado com sucesso!']], 201);
		try {

			$medicaoData = $request->all();
			$this->medicao->create($medicaoData);

			$return = ['data' => ['msg' => 'medidor cadastrado com sucesso!']];
			return response()->json($return, 201);

		} catch (\Exception $e) {
			if(config('app.debug')) {
				return response()->json(['data' => ['msg' => 'Deu MUITO RUIM, TROUXA!']], 500);
			}
			return response()->json(['data' => ['msg' => 'Deu MUITO RUIM']],  500);
		}
    }

    public function update(Request $request, $id)
	{
		try {

			$medicaoData = $request->all();
			$medicao     = $this->medicao->find($id);
			$medicao->update($medicaoData);

			$return = ['data' => ['msg' => 'Medidor atualizado !']];
			return response()->json($return, 201);

		} catch (\Exception $e) {
			if(config('app.debug')) {
				return response()->json(['data' => ['msg' => 'DEU ERRADO!']],  500);
			}
			return response()->json(['data' => ['msg' => 'Atualizou não, boy']], 500);
		}
	}

	public function delete(Product $id)
	{
		try {
			$id->delete();

			return response()->json(['data' => ['msg' => 'Sensor: ' . $id->nome . 'foi parar nas cucuia']], 200);

		}catch (\Exception $e) {
			if(config('app.debug')) {
				return response()->json(['data' => ['msg' => 'Tenho duas palavras pra tu']],  500);
			}
			return response()->json(['data' => ['msg' => 'PARA BENS!']],  500);
		}
	}
    //
}
