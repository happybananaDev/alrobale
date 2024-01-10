<?php

namespace App\Http\Livewire;

use App\Mail\Contact;
use Exception;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public string $email;
    public string $name;
    public string $subject;
    public string $emailMessage;
    public bool $success = false;
    public bool $error = false;
    public string $message = '';

    public function sendEmail(): void
    {
        $this->validate([
            'email' => 'required|email',
            'name' => 'required|min:3',
            'subject' => 'required|min:3',
            'emailMessage' => 'required|min:3',
        ], [
            'email.required' => 'Inserisci la tua email',
            'email.email' => 'Inserisci una email valida',
            'subject.required' => 'Inserisci un oggetto',
            'subject.min' => 'Inserisci un oggetto valido',
            'name.required' => 'Inserisci il tuo nome',
            'name.min' => 'Inserisci un nome valido',
            'emailMessage.required' => 'Inserisci un messaggio',
            'emailMessage.min' => 'Inserisci un messaggio valido',
        ]);

        try {
            Mail::to('info@alrobale.info')->send(new Contact($this->name, $this->email, $this->subject, $this->emailMessage));
            $this->message = 'Email inviata con successo';
            $this->success = true;
            $this->error = false;

            // Reset input fields
            $this->email = '';
            $this->subject = '';
            $this->name = '';
            $this->emailMessage = '';
        } catch (Exception) {
            $this->message = 'Errore durante l\'invio della mail';
            $this->success = false;
            $this->error = true;
        }
    }

    public function closeSuccess(): void
    {
        $this->success = false;
    }

    public function closeError(): void
    {
        $this->error = false;
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
