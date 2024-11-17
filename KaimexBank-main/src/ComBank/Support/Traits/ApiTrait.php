<?php
namespace ComBank\Support\Traits;
use ComBank\Transactions\Contracts\BankTransactionInterface;
trait ApiTrait
{
    function convertBalance(float $balance): float
    {
        $apiUrl = "https://api.exchangerate-api.com/v4/latest/EUR";

        // Obtener la respuesta de la API
        $response = file_get_contents($apiUrl);

        // Decodificar la respuesta JSON
        $data = json_decode($response, true);

        // Obtener la tasa de cambio para USD y convertir
        return $balance * $data['rates']['USD'];
    }

    function validateEmail(string $email): bool
    {
        $url = "https://www.disify.com/api/email/" . $email;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        return isset($data['status']) && $data['status'] === 'valid';
    }



    function detectFraud(BankTransactionInterface $bankTransaction): bool
    {
        return true;
    }
}