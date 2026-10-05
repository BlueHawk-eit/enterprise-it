<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Services\PostmarkMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Submit a new lead or quote request.
     */
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'organisation' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'service_category' => 'required|string|in:Hardware,IT Digital Services',
            'service_offering' => 'required|string|max:255',
            'details' => 'nullable|string|max:1000',
        ]);

        // Persist first so a lead is never lost, even if email delivery fails.
        $contact = Contact::create($validated);
        Log::info("Lead captured: ID {$contact->id} - Service: {$contact->service_offering}");

        // Fire the two emails; failures are logged but never break the response.
        try {
            $this->notifyTeam($contact);
            $this->sendAutoReply($contact);
        } catch (\Throwable $e) {
            Log::error('Lead email dispatch error: ' . $e->getMessage(), ['id' => $contact->id]);
        }

        return response()->json([
            'success' => true,
            'message' => 'An enterprise IT representative will contact you within 24 hours.',
            'data' => $contact
        ], 201);
    }

    /**
     * Internal notification to the enterprise IT team, with the lead as Reply-To
     * so a staff member can reply straight to the enquirer.
     */
    private function notifyTeam(Contact $c): void
    {
        $to = config('services.postmark.notify_to', 'support@enterpriseit.com.au');
        $e = fn ($v) => htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8');
        $details = trim((string) $c->details) !== '' ? $e($c->details) : '<em style="color:#6b7280">None provided</em>';

        $html = <<<HTML
<div style="font-family:Arial,Helvetica,sans-serif;max-width:560px;margin:0 auto;color:#17203a">
  <div style="background:#002366;color:#fff;padding:16px 20px;border-radius:8px 8px 0 0">
    <strong style="font-size:16px">New website enquiry</strong>
  </div>
  <div style="border:1px solid #dde3ec;border-top:none;border-radius:0 0 8px 8px;padding:20px">
    <table style="width:100%;border-collapse:collapse;font-size:14px">
      <tr><td style="padding:6px 0;color:#6b7280;width:150px">Name</td><td style="padding:6px 0"><strong>{$e($c->name)}</strong></td></tr>
      <tr><td style="padding:6px 0;color:#6b7280">Organisation</td><td style="padding:6px 0">{$e($c->organisation)}</td></tr>
      <tr><td style="padding:6px 0;color:#6b7280">Email</td><td style="padding:6px 0"><a href="mailto:{$e($c->email)}">{$e($c->email)}</a></td></tr>
      <tr><td style="padding:6px 0;color:#6b7280">Phone</td><td style="padding:6px 0"><a href="tel:{$e($c->phone)}">{$e($c->phone)}</a></td></tr>
      <tr><td style="padding:6px 0;color:#6b7280">Address</td><td style="padding:6px 0">{$e($c->address)}</td></tr>
      <tr><td style="padding:6px 0;color:#6b7280">Category</td><td style="padding:6px 0">{$e($c->service_category)}</td></tr>
      <tr><td style="padding:6px 0;color:#6b7280">Service</td><td style="padding:6px 0"><strong>{$e($c->service_offering)}</strong></td></tr>
    </table>
    <div style="margin-top:14px;padding-top:14px;border-top:1px solid #eef1f5">
      <div style="color:#6b7280;font-size:13px;margin-bottom:4px">Details</div>
      <div style="font-size:14px;line-height:1.6">{$details}</div>
    </div>
    <div style="margin-top:16px;color:#6b7280;font-size:12px">Lead #{$c->id} · reply to this email to respond directly to the enquirer.</div>
  </div>
</div>
HTML;

        $text = "New website enquiry (Lead #{$c->id})\n\n"
            . "Name: {$c->name}\nOrganisation: {$c->organisation}\nEmail: {$c->email}\n"
            . "Phone: {$c->phone}\nAddress: {$c->address}\nCategory: {$c->service_category}\n"
            . "Service: {$c->service_offering}\nDetails: " . (trim((string) $c->details) ?: 'None provided') . "\n";

        PostmarkMailer::send($to, "New enquiry: {$c->service_offering} — {$c->organisation}", $html, $text, [
            'reply_to' => $c->email,
        ]);
    }

    /**
     * Branded confirmation to the enquirer.
     */
    private function sendAutoReply(Contact $c): void
    {
        $from = config('services.postmark.from', 'support@enterpriseit.com.au');
        $e = fn ($v) => htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8');
        $name = $e(strtok((string) $c->name, ' ')) ?: 'there';

        $html = <<<HTML
<div style="font-family:Arial,Helvetica,sans-serif;max-width:560px;margin:0 auto;color:#17203a">
  <div style="background:#002366;color:#fff;padding:20px;border-radius:8px 8px 0 0">
    <strong style="font-size:17px">enterprise IT</strong>
    <div style="font-size:12px;color:#b9ccf5;margin-top:2px">Sovereignty. Security. Sustainability.</div>
  </div>
  <div style="border:1px solid #dde3ec;border-top:none;border-radius:0 0 8px 8px;padding:22px;font-size:14px;line-height:1.65">
    <p style="margin:0 0 12px">Hi {$name},</p>
    <p style="margin:0 0 12px">Thanks for reaching out to <strong>enterprise IT</strong>. We've received your enquiry about
       <strong>{$e($c->service_offering)}</strong> and a specialist will get back to you <strong>within 24 hours</strong>.</p>
    <p style="margin:0 0 12px">If it's urgent, just reply to this email or call us on <a href="tel:+61494614221">+61 494 614 221</a>.</p>
    <p style="margin:0 0 4px">Kind regards,</p>
    <p style="margin:0;color:#6b7280">The enterprise IT team · Adelaide, South Australia<br>
       <a href="https://enterpriseit.com.au" style="color:#002366">enterpriseit.com.au</a></p>
  </div>
  <div style="text-align:center;color:#9aa3b5;font-size:11px;margin-top:12px">
    This is an automated confirmation of your enquiry. You're receiving it because you contacted us via enterpriseit.com.au.
  </div>
</div>
HTML;

        $text = "Hi {$name},\n\nThanks for reaching out to enterprise IT. We've received your enquiry about "
            . "{$c->service_offering} and a specialist will get back to you within 24 hours.\n\n"
            . "If it's urgent, reply to this email or call +61 494 614 221.\n\n"
            . "Kind regards,\nThe enterprise IT team · Adelaide, South Australia\nenterpriseit.com.au";

        PostmarkMailer::send($c->email, 'We\'ve received your enquiry — enterprise IT', $html, $text, [
            'reply_to' => $from,
        ]);
    }
}
