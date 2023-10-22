<?php


namespace App\Http\Controllers;

use App\Models\GenericMessage;
use Illuminate\Http\Request;
use App\Models\Sms;

class SmsSender extends Controller
{
    public function index()
    {
        $sms = Sms::where("status", "pending")->get();
        foreach ($sms as $message) {
            $data = [
                "phone" => $message->phone,
                "message" => $this->buildMessage($message),
                "sender" => $message->sender
            ];
            $res = sendSMS($data);
            $response = json_decode($res, true);

            if ($response["data"]["status"]) {
                $message->status = "sent";
                $message->save();
            } else {
                //do something laer
            }
        }

        return response("All sms sent <a href='//google.com' >back</a>", 200);
    }

    public function generic()
    {
        $sms = GenericMessage::where("status", "pending")->get();
        foreach ($sms as $message) {
            $data = [
                "phone" => $message->phone_number,
                "message" => $message->message,
                "sender" => $message->sender
            ];
            $res = sendSMS($data);
            $response = json_decode($res, true);

            if ($response["data"]["status"]) {
                $message->status = "sent";
                $message->save();
            } else {
                //do something laer
            }
        }

        return response("All sms sent <a href='//google.com' >back</a>", 200);
    }

    protected function buildMessage($row)
    {
        return 'Dear ' . $row->name . ', your account statement as at ' . $row->month_year . '. Amount Saved ' . $row->amount_saved . ', Total Savings ' . $row->total_savings . ', Loan deducation ' . $row->loan_deduction . ', Loan balance ' . $row->loan_balance . ', Interest deducation ' . $row->int_deduction . ', Interest balance ' . $row->int_balance;
    }
}
