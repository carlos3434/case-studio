<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Employee;
use App\Models\User;

class EmployeeTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function a_authenticated_user_can_read_all_the_employees()
    {
        $this->actingAs(User::factory('App\User')->create());
        $employee = Employee::factory('App\Employee')->create();
        $response = $this->get('/employees');
        $response->assertSee($employee->employee_id);
    }

    /** @test */
    public function authenticated_users_can_create_a_new_employee()
    {
        $this->actingAs(User::factory('App\User')->create());
        $employee = Employee::factory('App\Employee')->make();
        $response = $this->post('/employees',$employee->toArray());
        $response->assertSessionHasNoErrors();
    }

    /** @test */
    public function unauthenticated_users_cannot_create_a_new_employee()
    {
        $employee = Employee::factory('App\Employee')->make();
        $this->post('/employees',$employee->toArray())
             ->assertRedirect('/login');
    }

    /** @test */
    public function a_employee_requires_a_employee_id()
    {
        $this->actingAs(User::factory('App\User')->create());
        $employee = Employee::factory('App\Employee')->make(['employee_id' => null]);
        $this->post('/employees',$employee->toArray())
                ->assertSessionHasErrors('employee_id');
    }

    /** @test */
    public function a_employee_requires_a_first_name()
    {
        $this->actingAs(User::factory('App\User')->create());
        $employee = Employee::factory('App\Employee')->make(['first_name' => null]);
        $this->post('/employees',$employee->toArray())
            ->assertSessionHasErrors('first_name');
    }
    /** @test */
    public function authorized_user_can_update_the_employee()
    {
        $this->actingAs(User::factory('App\User')->create());
        $employee = Employee::factory('App\Employee')->create();
        $employee->first_name = "Updated first_name";
        $response = $this->put('/employees/'.$employee->id, $employee->toArray());
        $response->assertSessionHasNoErrors();
    }
    /** @test */
    public function unauthorized_user_cannot_update_the_employee()
    {
        $this->actingAs(User::factory('App\User')->create());
        $employee = Employee::factory('App\Employee')->create();
        $employee->first_name = "Updated first_name";
        $response = $this->put('/employees/'.$employee->id, $employee->toArray());
        $response->assertStatus(302);
    }
}
