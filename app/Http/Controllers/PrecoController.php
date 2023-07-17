<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PrecoController extends Controller
{
    public function preco()
    {
        $client = new Client();

    $criptomoedas = [
        'bitcoin' => 'BTCBRL',
        'ethereum' => 'ETHBRL',
        'cardano' => 'ADABRL',
        'bnb' => 'BNBBRL',
        'tether' => 'USDTBRL',
        'solana' => 'SOLBRL',
        'xrp' => 'XRPBRL',
        'doge' => 'DOGEBRL'
    ];

    $precos = [];

    try {
        foreach ($criptomoedas as $moeda => $symbol) {
            $url = "https://api.binance.com/api/v3/ticker/price?symbol={$symbol}";
            $response = $client->get($url);
            $data = json_decode($response->getBody(), true);
            $preco = $data['price'];

            // Formata o preço para o padrão BRL
            $precoFormatado = number_format($preco, 2, ',', '.');

            // Adiciona o preço formatado ao array de preços
            $precos[$moeda . 'PriceJson'] = json_encode(['price' => $precoFormatado]);
        }

        return view('preco', $precos);
    } catch (\Exception $e) {
        // Tratar erros aqui, como não conseguir acessar a API ou respostas inválidas.
        return view('preco', [
            'bitcoinPriceJson' => null,
            'ethereumPriceJson' => null,
            'cardanoPriceJson' => null,
            'bnbPriceJson' => null,
            'tetherPriceJson' => null,
            'solanaPriceJson' => null,
            'xrpPriceJson' => null, 
            'dogePriceJson' => null, 
        ]);
    }
    }
}