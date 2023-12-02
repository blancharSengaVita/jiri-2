<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function testBasicExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create([
                'password' => 'change__this',
            ]);

            $browser->visit('/login')
                ->type('@email__input', $user->email)
                ->type('@password__input', $user->password)
                ->click('@login__button')
                ->assertPathIs('/dashboard');
        });
    }

    /**
     * TODO un test qui permet de verifier que les labels sont en français
     */
    //Password

    /**
     * TODO un test qui permet de verifier que les erreurs soient preset et soient bonnes
     */
}
