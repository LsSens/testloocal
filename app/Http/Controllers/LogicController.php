<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogicController extends Controller
{
    public function checkPalindrome(Request $request)
    {
        $string = $request->input('text');
    
        if (!is_string($string)) {
            return response()->json(['error' => 'Nao foi fornecida uma string.'], 401);
        }
    
        $cleanString = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $string));
    
        $reversedString = strrev($cleanString);
    
        if ($cleanString !== $reversedString) {
            return response()->json(['message' => 'A string nao e um palindromo.'], 200);
        } else {
            return response()->json(['message' => 'A string e um palindromo.'], 200);
        }
    }

    public function processArray(Request $request)
    {
        $data = $request->input('numbers');
    
        if (!is_array($data)) {
            return response()->json(['error' => 'Entrada inválida: esperado um array'], 401);
        }
    
        foreach ($data as $number) {
            if (!is_numeric($number)) {
                return response()->json(['error' => 'Entrada inválida: o array deve conter apenas números'], 401);
            }
        }
    
        $evenNumbers = array_filter($data, function ($item) {
            return $item % 2 === 0;
        });
    
        $evenList = array_values($evenNumbers);
    
        $sum = array_sum($data);
        sort($data);
    
        return response()->json([
            'PARES' => $evenList,
            'SOMA' => $sum,
            'NUMEROS_ORDENADOS' => $data
        ], 200);
    }
}
