<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PendingTicket;
use App\Traits\ResponseMethodTrait;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Ticket;
use Stripe\Stripe;
use Stripe\Checkout\Session as CheckoutSession;

class PaymentController extends Controller
{
    use ResponseMethodTrait;

    public function index(Request $request){
        $pendingTicketId = $request->query('pending_ticket_id');
        return $this->sendResponse('Payment succeeded succesfully.');
    }
    public function Errormessage(){
        return $this->sendResponse('Payment Failed .');
    }
    public function payTicket($code)
    {
        $pendingTicket = PendingTicket::with('ticket')->where('ticket_code',$code)->first();

        if (!$pendingTicket) {
            return $this->sendResponse('Pending ticket not found.');
        }
        if (!$pendingTicket->ticket) {
            return $this->sendResponse('Associated ticket not found.');
        }
       
        $priceDecimal = (float)$pendingTicket->ticket->price; // e.g., 100.00
        $amount       = (int)($priceDecimal * 100); // e.g., 10000 cents
 //       $currency     = $pendingTicket->ticket->currency;
        // Retrieve ticket details (assumes you have a Ticket model with amount and currency)
       $currency = "usd";
        // e.g., "usd"

        // Set your Stripe secret key
        Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            // Create a Stripe Checkout Session
            $session = CheckoutSession::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => $currency,
                        'product_data' => [
                            'name' => 'Ticket Purchase - ' . $pendingTicket->ticket_id,
                        ],
                        'unit_amount' => $amount,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                // Update these URLs to routes in your application that handle success and cancel scenarios.
                'success_url' => url('/payment-success?pending_ticket_id=' . $pendingTicket->id),
                'cancel_url'  => url('/api/payment-cancel'),
            ]);

            // Redirect to Stripe Checkout session
            return redirect($session->url);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error: ' . $e->getMessage()], 500);
        }
    }

}
