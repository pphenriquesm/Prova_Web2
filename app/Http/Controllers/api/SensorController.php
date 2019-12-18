<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sensores;

class SensorController extends Controller
{
    private $sensor;

    public function __construct(Sensor $sensor)
	{
		$this->sensor = $sensor;
	}

	public function index()
    {
    	//return response()->json($this->sensor);
    	return response()->json(['data'=>['msg' =>'isso ai deu ruim']], 500);
    }

	public function show($id)
    {
    	$sensor = $this->sensor->find($id);

    	if(! $sensor) return response()->json(ApiError::errorMessage('Sensor não encontrado', 4040), 404);

    	$data = ['data' => $sensor];
	    return response()->json($data);
    }

    public function store(Request $request)
    {
		try {

			$sensorData = $request->all();
			$this->sensor->create($sensorData);

			$return = ['data' => ['msg' => 'Sensor cadastrado com sucesso!']];
			return response()->json($return, 201);

		} catch (\Exception $e) {
			if(config('app.debug')) {
				return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 500);
			}
			return response()->json(ApiError::errorMessage('Deu ruim!', 1010),  500);
		}
    }

    public function update(Request $request, $id)
	{
		try {

			$sensorData = $request->all();
			$sensor     = $this->sensor->find($id);
			$sensor->update($sensorData);

			$return = ['data' => ['msg' => 'Sensor atualizado !']];
			return response()->json($return, 201);

		} catch (\Exception $e) {
			if(config('app.debug')) {
				return response()->json(ApiError::errorMessage($e->getMessage(), 1011),  500);
			}
			return response()->json(ApiError::errorMessage('Deu ruim ao atualizar', 1011), 500);
		}
	}

	public function delete(Product $id)
	{
		try {
			$id->delete();

			return response()->json(['data' => ['msg' => 'Sensor: ' . $id->nome . ' removido com sucesso!']], 200);

		}catch (\Exception $e) {
			if(config('app.debug')) {
				return response()->json(ApiError::errorMessage($e->getMessage(), 1012),  500);
			}
			return response()->json(ApiError::errorMessage('Deu ruim ao remover', 1012),  500);
		}
	}

}