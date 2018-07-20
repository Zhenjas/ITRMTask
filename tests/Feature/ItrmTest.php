<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItrmTest extends TestCase
{
	use RefreshDatabase;

    public function testRegistrationForm()
    {
		$response = $this->get('/register');
		$response->assertStatus(200);
 	}

    public function testLoginForm()
    {
		$response = $this->get('/login');
		$response->assertStatus(200);
 	}

    public function testRegistration()
    {

        $response = $this->post(route('register'), [
	            'title' => 'Mr',
	            'forename' => 'Test-user',
	            'surname' => 'Test-surname',
	            'dob' => '05/05/2015',
	            'gender' => 'Not specified',
	            'email' => 'email-test@test-domain.com',
	            'password' => '123456',
	            'password_confirmation' => '123456',
	            'country' => 'United kingdom',
	            'county' => 'test',
	            'town' => 'London',
	            'post_code' => '1UB 3UB',
	            'from_date' => '05/05/2015',
	            'until_date' => '05/05/2015',
	            'address_one' => 'One test-address',
	            'address_two' => 'Two test-address'
        ]);

	    $this->assertDatabaseHas('users', [
	        'email' => 'email-test@test-domain.com'
	    ]);
    }


    public function testLoginTrue()
    {

	    $user = factory(User::class)->create();

        $credential = [
	            'email' => $user->email,
	            'password' => 'secret'
        ];
	    $response = $this->post('login',$credential);

		$this->assertAuthenticated();
    }


    public function testLoginFalse()
    {
        $credential = [
	            'email' => 'wrong@mail.com',
	            'password' => 'wrongpassword'
        ];
        $response = $this->post(route('login'),$credential);

        $this->assertGuest();
    }


    public function testProfileUpdateTrue()
    {

    	$user = factory(User::class)->create();

        $credential = [
	            'email' => $user->email,
	            'password' => 'secret'
        ];
	    $response = $this->post('login',$credential);

        $response = $this->post('profile_update', [
	            'title' => 'Mr',
	            'forename' => 'Michael',
	            'surname' => 'Test-surname',
	            'dob' => '05/05/2015',
	            'gender' => 'Not specified',
	            'email' => 'email-test@test-domain.com',
	            'password' => '123456',
	            'password_confirmation' => '123456',
	            'country' => 'Latvia',
	            'county' => 'test',
	            'town' => 'Riga',
	            'post_code' => '1UB 3UB',
	            'from_date' => '05/05/2015',
	            'until_date' => '05/05/2015',
	            'address_one' => 'One test-address',
	            'address_two' => 'Two test-address'
        ]);

	    $this->assertDatabaseHas('users', [
	        'forename' => 'Michael',
	        'country' => 'Latvia',
	        'town' => 'Riga'
	    ]);
    }


    public function testProfileUpdateFalse()
    {

    	$user = factory(User::class)->create();

    	// Try to change profile data without login
        $response = $this->post('profile_update', [
	            'title' => 'Mr',
	            'forename' => 'Test-user',
	            'surname' => 'Test-surname',
	            'dob' => '05/05/2015',
	            'gender' => 'Not specified',
	            'email' => 'email-test@test-domain.com',
	            'password' => '123456',
	            'password_confirmation' => '123456',
	            'country' => 'United kingdom',
	            'county' => 'test',
	            'town' => 'London',
	            'post_code' => '1UB 3UB',
	            'from_date' => '05/05/2015',
	            'until_date' => '05/05/2015',
	            'address_one' => 'One test-address',
	            'address_two' => 'Two test-address'
        ]);

	    $this->assertDatabaseHas('users', [
	        'email' => $user->email
	    ]);
    }

}
