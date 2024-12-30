<?php

// tests/Unit/GuruControllerTest.php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GuruControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test store method.
     *
     * @return void
     */
    public function testStore()
    {
        $data = [
            'name' => 'Guru Baru',
            'birth_date' => '1980-01-01',
            'email' => 'guru@example.com',
            'nohp' => '08123456789',
            'address' => 'Jl. Guru Baru',
            'class' => 'Matematika',
            'status' => 'Aktif',
            'is_guru' => true,
            'password' => bcrypt('password'),
        ];

        $response = $this->post('/guru', $data);

        $response->assertRedirect('/guru');
        $response->assertSessionHas('success', 'Data Guru Berhasil Ditambahkan');

        $this->assertDatabaseHas('users', ['email' => 'guru@example.com']);
    }

    /**
     * Test update method.
     *
     * @return void
     */
    public function testUpdate()
    {
        $guru = User::factory()->create(['is_guru' => true]);

        $data = [
            'name' => 'Guru Update',
            'birth_date' => '1980-01-01',
            'email' => 'guru_update@example.com',
            'nohp' => '08123456789',
            'address' => 'Jl. Guru Update',
            'class' => 'Fisika',
            'status' => 'Nonaktif',
        ];

        $response = $this->put("/guru/{$guru->id}", $data);

        $response->assertRedirect('/guru');
        $response->assertSessionHas('success', 'Data Berhasil Diperbarui');

        $this->assertDatabaseHas('users', ['email' => 'guru_update@example.com']);
    }

    /**
     * Test destroy method.
     *
     * @return void
     */
    public function testDestroy()
    {
        $guru = User::factory()->create(['is_guru' => true]);

        $response = $this->delete("/guru/{$guru->id}");

        $response->assertRedirect('/guru');
        $response->assertSessionHas('success', 'Data Guru Berhasil Dihapus');

        $this->assertDatabaseMissing('users', ['id' => $guru->id]);
    }
}
