<?php

namespace App\Http\Controllers;

use App\Services\PagBankService;
use Illuminate\Http\Request;

class QrCodPagBankController extends Controller
{
    protected $pagBankService;

    public function __construct(PagBankService $pagBankService)
    {
        $this->pagBankService = $pagBankService;
    }

    public function generatePix(Request $request)
    {
        $orderData = [
            'reference_id' => 'pedido-123', // ID de referência único do seu sistema
            'customer' => [
                'name' => 'Nome do Cliente',
                'email' => 'cliente@email.com',
                'tax_id' => '12345678909', // CPF ou CNPJ
                'phones' => [
                    [
                        'country' => '+55',
                        'area' => '11',
                        'number' => '999999999'
                    ]
                ]
            ],
            'items' => [
                [
                    'name' => 'Descrição do Item',
                    'quantity' => 1,
                    'unit_amount' => 1000 // Valor em centavos (R$ 10,00)
                ]
            ],
            'qr_codes' => [
                [
                    'amount' => [
                        'value' => 1000 // Valor em centavos (R$ 10,00)
                    ]
                ]
            ],
            'shipping' => [
                // ... dados de frete opcionais ...
            ],
            'notification_urls' => [
                // URL para receber notificações de pagamento via webhook
                route('pagbank.webhook')
            ],
        ];
        $response = $this->pagBankService->createPixOrder($orderData);

        if ($response && isset($response['qr_codes'][0]['links'][0]['href'])) {
            // A API retorna a URL da imagem do QR Code e o código "copia e cola"
            $qrCodeUrl = $response['qr_codes'][0]['links'][0]['href'];
            $qrCodeText = $response['qr_codes'][0]['text']; // O código "copia e cola"

            return view('payment.pix', compact('qrCodeUrl', 'qrCodeText'));
        } else {
            return back()->with('error', 'Falha ao gerar o QR Code. Tente novamente.');
        }
    }
}
