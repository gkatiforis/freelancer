<?php
/**
 * Created by PhpStorm.
 * User: Leuteris
 * Date: 23/10/2015
 * Time: 6:04 πμ
 */

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use PayPal\Api\Receiver;
use App\User;

use App\Http\Requests;

use View;
use Input;


class FinancialTransactionsController extends BaseController
{

    private $_api_context;

    public function __construct()
    {

        // setup PayPal api context
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }


    public function getPayment()
    {
        $user_id = \Auth::user()->id;

        $user =  User::find($user_id);
        return View::make('payment')->with('user', $user);

    }

    public function postPayment()
    {

        $input_amount = \Input::get('amount');
        $input_user_id = \Input::get('user_id');


        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();
        $item_1->setName('Υπηρεσίες freelancing') // item name
        ->setCurrency('EUR')
            ->setQuantity(1)
            ->setPrice($input_amount); // unit price



        // add item to list
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('EUR')
            ->setTotal($input_amount);

        $transaction = new Transaction();

        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Ειμαι η περιγραφή');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(\URL::route('payment.status'))
            ->setCancelUrl(\URL::route('payment'));

        $payment = new Payment();

        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setId("2014031400023")
            ->setTransactions(array($transaction));


        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                echo "Exception: " . $ex->getMessage() . PHP_EOL;
                $err_data = json_decode($ex->getData(), true);
                exit;
            } else {
                die('Some error occur, sorry for inconvenient');
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        // add payment ID to session
        \Session::put('paypal_payment_id', $payment->getId());

        \Session::put('user_id', $input_user_id);
        \Session::put('amount', $input_amount);

        if(isset($redirect_url)) {
            // redirect to paypal
            return \Redirect::away($redirect_url);
        }

        return \Redirect::route('original.route')
            ->with('error', 'Unknown error occurred');
    }



    public function simplePay()
    {

        $payouts = new \PayPal\Api\Payout();


        $senderBatchHeader = new \PayPal\Api\PayoutSenderBatchHeader();


        $senderBatchHeader->setSenderBatchId(uniqid())
            ->setEmailSubject("You have a Payout!");

        $senderItem = new \PayPal\Api\PayoutItem();
        $senderItem->setRecipientType('Email')
            ->setNote('Thanks for your patronage!')
            ->setReceiver('dennisritchiec-buyer@gmail.com')
            ->setSenderItemId("2014031400023")

            ->setAmount(new \PayPal\Api\Currency('{
                                "value":"1.0",
                                "currency":"EUR"
                            }'));

$payouts->setSenderBatchHeader($senderBatchHeader)
    ->addItem($senderItem);

$request = clone $payouts;

try {
    $output = $payouts->createSynchronous($this->_api_context);

} catch (\Exception $ex) {

 //	\ResultPrinter::printError("Created Single Synchronous Payout", "Payout", null, $request, $ex);
    exit(1);
}

// \ResultPrinter::printResult("Created Single Synchronous Payout", "Payout", $output->getBatchHeader()->getPayoutBatchId(), $request, $output);

return $output;
    }



    public function getPaymentStatus()
    {
        // Get the payment ID before session clear
        $payment_id = \Session::get('paypal_payment_id');
        $user_id = \Session::get('user_id');
        $amount = \Session::get('amount');

        // clear the session payment ID
       \ Session::forget('paypal_payment_id');

        if (empty(\Input::get('PayerID')) || empty(\Input::get('token'))) {
            return \Redirect::route('original.route')
                ->with('error', 'Payment failed');
        }

        $payment = Payment::get($payment_id, $this->_api_context);

        // PaymentExecution object includes information necessary
        // to execute a PayPal account payment.
        // The payer_id is added to the request query parameters
        // when the user is redirected from paypal back to your site
        $execution = new PaymentExecution();
        $execution->setPayerId(\Input::get('PayerID'));

        //Execute the payment
        $result = $payment->execute($execution, $this->_api_context);

        //echo '<pre>';print_r($result);echo '</pre>'; //exit; // DEBUG RESULT, remove it later

        if ($result->getState() == 'approved') { // payment made




            $user  = \DB::table('users')
                ->where('id','=',$user_id )

                ->first();


            $user2 = User::where('id','=',$user_id) ;


            $new_project_data = array("balance" => $user->balance+$amount ); // project  ανοιχτο

            $user2->update($new_project_data);


            return view('payment_status')
                ->with(array('status' =>0, 'balance' =>$user->balance+$amount, 'amount' =>$amount ));
        }
        else {

            return view('payment_status')
                ->with(array('status' =>1, 'user_id' =>$user_id ));
        }
    }
}