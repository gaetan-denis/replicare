<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class RegisterTest extends TestCase
{
    /**
     * Test que l'username n'est pas vide
     * @return void
     */
    public function test_username_not_empty()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $data = ['username' => '',];
        $response = $this->post('/register', $data);
        $response->assertSessionHasErrors('username');
    }


    /**
     * Ce test permet de vérifier que l’input 'username" est bien de type texte
     *
     * @return void
     */
    public function test_username_input_is_type_text()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('<input type="text" id="username" name="username">', false);

    }

    /**
     * Celui-ci vérifie que l'username contient bien au moins 3 caractères
     *
     * @return void
     */
    public function test_username_input_have_3_chars_or_more()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('/<input type="text" id="username" name="username" minlength="3">/');
    }

    /**
     * Celui-ci vérifie que l'username contient bien au maximum 255 caractères
     *
     * @return void
     */
    public function test_username_input_have_255_chars_or_less()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('/<input type="text" id="username" name="username" maxlength="255">/', false);
    }

    /**
     * Celui-ci devrait simuler une entrée identique en base de donnée, cependant il y a une erreur, à vérifier
     *
     * Piste 1 : regarder la gestion de la db dans phpunit
     *
     * @return void
     */
    public function test_username_does_not_already_exist_in_database(): void
    {
        $existingUser = User::factory()->create(['username' => 'admin']);
        $response = $this->post('/register', ['username' => 'admin']);
        $response->assertStatus(200);
        $response->assertDontSeeText('Nom d’utilisateur déjà utilisé, veuillez en choisir un autre !');
    }

    /**
     * Cette fonction permet l’utilisation des caractères spéciaux
     *
     * Problème : trouver le moyen d’inclure le " dans la chaine de caractères -> Statut : résolu
     *
     * @return void
     */

    public function test_username_input_allows_special_characters()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('<input type="text" id="username" name="username" pattern="[\\w!@#$%^&*()\\-_+=\\[\\]{}|;:\'\,.<>\\/\\?\\">', false);
    }


    //Email

    /**
     * Ce test vérifie que l’input email n’est pas vide
     **/

    public function test_email_is_not_empty()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $data = ['email' => '',];
        $response = $this->post('/register', $data);
        $response->assertSessionHasErrors('email');
    }

    /**
     * Ce test permet de vérifier que l’input est bien de type email
     * @return void
     */
    public function test_email_is_a_valid_email()
    {

        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('<input type="email" id="email" name="email">', false);
    }

    //Mot de passe

    /**
     * Teste que le password n'est pas vide
     * @return void
     */
    public function test_password_is_not_empty()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $data = ['password' => '',];
        $response = $this->post('/register', $data);
        $response->assertSessionHasErrors('password');
    }

    /**
     * Ce test vérifie que l’input password est bien de type password
     * @return void
     *
     */

    public function test_password_input_is_type_password()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('<input type="password" id="password" name="password">', false);
    }

    /**
     * Celui-ci vérifie que l'input password contient bien au moins 12 caractères
     *
     * @return void
     */
    public function test_password_input_have_3_chars_or_more()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('/<input type="password" id="password" name="password" minlength="12">/');
    }

    /**
     * Celui-ci vérifie que l'input password' contient bien au maximum 255 caractères
     *
     * @return void
     */
    public function test_password_input_have_255_chars_or_less()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('/<input type="password" id="password" name="password" maxlength="255">/', false);
    }

    /**
     * Cette fonction permet l’utilisation des caractères spéciaux dans l'input password
     *
     * Problème : trouver le moyen d’inclure le " dans la chaine de caractères -> Statut : résolu
     *
     * @return void
     */

    public function test_password_input_allows_special_characters()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('<input type="password" id="password" name="password" pattern="[\\w!@#$%^&*()\\-_+=\\[\\]{}|;:\'\,.<>\\/\\?\\">', false);
    }

    //Confirmation du mot de passe

    /**
     * Teste que la confirmation du password n’est pas vide
     * @return void
     */
    public function test_confirmation_password_is_not_empty()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $data = ['confirmPassword' => '',];
        $response = $this->post('/register', $data);
        $response->assertSessionHasErrors('confirmPassword', false, 'le champs mot de passe ne peux pas être vide');
    }

    /**
     * Ce test vérifie que l’input confirmPassword est bien de type password
     * @return void
     *
     */

    public function test_confirmPassword_input_is_type_password()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('<input type="password" id="confirmPassword" name="confirmPassword">', false );
    }

    /**
     * Ceci testera que l'input mot de passe et l'input confirmPassword sont identiques
     * bug quand je le teste à retester
     * @return void
     */

    public function test_password_and_confirmPassword_match()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);

        // test pour simuler un mot de passe identique
        $formData = [
            'password' => 'password123',
            'confirmPassword' => 'password123',
        ];
        $this->post('/register', $formData);

        $response->assertInputValue('password', 'password123', 'Les mots de passe ne correspondent pas.');
        $response->assertInputValue('confirmPassword', 'password123', 'Les mots de passe ne correspondent pas.');
    }

    //Avatar

    public function test_avatar_upload_accepts_only_jpeg_or_png()
    {
        Storage::fake('avatars');

        $response = $this->post('/upload-avatar', [
            'avatar' => UploadedFile::fake()->create('avatar.gif'),
        ]);
        // erreur 422 = validation échouée,
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['avatar']);
    }

}




