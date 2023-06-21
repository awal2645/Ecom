<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DrewM\MailChimp\MailChimp;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $email = $request->input('email');

        $mailchimp = new MailChimp(env('MAILCHIMP_API_KEY'));

        $result = $mailchimp->post("lists/" . env('MAILCHIMP_LIST_ID') . "/members", [
            'email_address' => $email,
            'status' => 'subscribed',
        ]);

        if ($mailchimp->success()) {
            // Subscription successful
            return redirect()->back()->with('message', 'Subscription  Done');
        } else {
            // Subscription failed
            return response()->json(['message' => 'Subscription failed', 'errors' => $mailchimp->getLastError()]);
        }
    }
}
