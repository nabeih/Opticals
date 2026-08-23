<?php

namespace Tests\Feature;

use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PatientBookingTest extends TestCase
{
    use RefreshDatabase;

    public function test_booking_store_creates_patient(): void
    {
        $response = $this->post('/booking', [
            'fullname' => 'أحمد محمد',
            'phone' => '01012345678',
            'age' => 45,
            'address' => 'غزة - السريا',
            'complaint_type' => 'استشارة',
            'notes' => 'يعاني من ضبابية في الرؤية',
        ]);

        $response->assertRedirect(route('booking.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('patients', [
            'fullname' => 'أحمد محمد',
            'phone' => '01012345678',
            'complaint_type' => 'استشارة',
        ]);
    }

    public function test_booking_store_validates_required_fields(): void
    {
        $this->post('/booking', [])
            ->assertSessionHasErrors(['fullname', 'phone', 'complaint_type']);

        $this->assertDatabaseCount('patients', 0);
    }
}