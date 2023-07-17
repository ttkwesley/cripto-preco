@extends('master')

@section('content')
<preco-component 
    :btcprice="{{ $bitcoinPriceJson ? $bitcoinPriceJson : null }}" 
    :ethprice="{{ $ethereumPriceJson ? $ethereumPriceJson : null }}"
    :cardanoprice="{{ $cardanoPriceJson ? $cardanoPriceJson : null }}"
    :bnbprice="{{ $bnbPriceJson ? $bnbPriceJson : null }}"
    :tetherprice="{{ $tetherPriceJson ? $tetherPriceJson : null }}"
    :solanaprice="{{ $solanaPriceJson ? $solanaPriceJson : null}}"
    :xrpprice="{{ $xrpPriceJson ? $xrpPriceJson : null }}"
    :dogeprice="{{ $dogePriceJson ? $dogePriceJson : null }}"
></preco-component>
@endsection