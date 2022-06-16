<?php

use App\Models\Franchise;
use App\Models\FranchiseCart;
use App\Models\FrontendSetting;

function frontendSetting()
{
    return FrontendSetting::first();
}

function imgSrc($value = "")
{
    return asset("/storage/" . $value);
}

function hello()
{
    return "world";
}

function cart_details()
{
    $data = (object) array(
        "subtotal" => 0,
        "total_discount" => 0,
        "items" => [],
        "isEmpty" => 0,
        "codEnable" => true
    );

    $franchise = auth()->user()->franchise();

    $data->items = FranchiseCart::where('franchise_id', $franchise->id)->where('franchise_buyer_id', auth()->id())->get();

    $data->isEmpty = !boolval(count($data->items));

    foreach ($data->items as $key =>  $item) {
        $cart_product = $item->product;
        $item->product = $cart_product;
        $data->subtotal += $item->quantity * $cart_product->selling_price;
        $data->total_discount += $item->discount;

        if (!$cart_product->cod_enable) /* if false */ {
            $data->codEnable = false;
        }
    }

    return $data;
}

function cart_clear()
{
    $franchise = auth()->user()->franchise();
    FranchiseCart::where('franchise_id', $franchise->id)->where('franchise_buyer_id', auth()->id())->delete();
}
