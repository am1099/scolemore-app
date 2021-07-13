<?php

namespace Tests\Unit;

use function Pest\Laravel\get;

use function Pest\Livewire\livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\EmailMessages;
use Livewire\Livewire;
use Tests\TestCase;

class EmailsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }


    function test_can_create_message()
    {

        // $this->get('/sendEmail')->assertSeeLivewire(Emails::class);

        Livewire::test(Emails::class)
            ->set('messgae', '')
            ->call('sendEmail')
            ->assertHasErrors(['messgae' => 'required']);

        // Livewire::test(Emails::class)
        //     ->set('message_from', 'abz@abz.com', 'message_to', 'abz2@abz2.com', 'subject', 'testing', 'message', 'anything', 'status', 'sent',)
        //     ->call('storeEmail');

        // $this->assertTrue(EmailMessages::whereSubject('testing')->exists());
    }
}
