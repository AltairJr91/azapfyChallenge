<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class DeliveryController extends Controller
{
    // public function index()
    // {


    //     $response = Http::get('http://homologacao3.azapfy.com.br/api/ps/notas');

    //     if ($response->successful()) {
    //         $jsonData = $response->json();
    //         $resultsFinished = [];
    //         $openResults = [];
    //         $totalPaid = 0;
    //         $totalOpen = 0;

    //         foreach ($jsonData as $object) {
    //             $status = $object['status'];
    //             $value = $object['valor'];
    //             $transporterName = $object['nome_transp'];
    //             $transporterCode = $object['cnpj_transp'];


    //             if ($status === 'COMPROVADO') {

    //                 $totalPaid += (float) $value;
    //                 $resultsFinished[$transporterName] = [
    //                     'Transportadora' => $transporterName,
    //                     'Cnpj_transportadora' => $transporterCode,
    //                     'valor' => $totalPaid
    //                 ];

    //             }
    //             if ($status === 'ABERTO') {
    //                 $totalOpen += (float) $value;
    //                 $openResults[$transporterName] = [
    //                     'Transportadora' => $transporterName,
    //                     'Cnpj_transportadora' => $transporterCode,
    //                     'valor' => $totalOpen
    //                 ];

    //             }


    //         }

    //         $responseValues = [
    //             'Entregas concluidas' => $resultsFinished,
    //             'Entregas em aberto' => $openResults
    //         ];
    //         return response()->json([$responseValues], 200);

    //     } else {

    //         return response()->json(['erro ao buscar notas'], 404);
    //     }
    // }

    public function index()
    {
        $response = Http::get('http://homologacao3.azapfy.com.br/api/ps/notas');

        if ($response->successful()) {
            $jsonData = $response->json();

            $finishedDeliveries = [];
            $openDeliveries = [];

            foreach ($jsonData as $delivery) {
                $status = $delivery['status'];
                $value = (float) $delivery['valor'];
                $transporterName = $delivery['nome_transp'];
                $transporterCode = $delivery['cnpj_transp'];

                // Verifica o status da entrega e atribui aos resultados correspondentes
                if ($status === 'COMPROVADO') {
                    if (!isset($finishedDeliveries[$transporterCode])) {
                        $finishedDeliveries[$transporterCode] = [
                            'Transportadora' => $transporterName,
                            'Cnpj_transportadora' => $transporterCode,
                            'valores' => 0
                        ];
                    }
                    $finishedDeliveries[$transporterCode]['valores'] += $value;
                } elseif ($status === 'ABERTO') {
                    if (!isset($openDeliveries[$transporterCode])) {
                        $openDeliveries[$transporterCode] = [
                            'Transportadora' => $transporterName,
                            'Cnpj_transportadora' => $transporterCode,
                            'valores' => 0
                        ];
                    }
                    $openDeliveries[$transporterCode]['valores'] += $value;
                }
            }

            $responseValues = [
                'Entregas concluidas' => array_values($finishedDeliveries),
                'Entregas em aberto' => array_values($openDeliveries)
            ];

            return response()->json($responseValues, 200);
        } else {
            return response()->json(['erro ao buscar notas'], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
