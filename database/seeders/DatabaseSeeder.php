<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ministry;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed statuses first using insertOrIgnore to avoid duplicate key errors
        DB::table('statuses')->insertOrIgnore([
            ['name' => 'pending_menteri'],
            ['name' => 'pending_sekretaris'],
            ['name' => 'pending_bendahara'],
            ['name' => 'pending_wakil_presiden'],
            ['name' => 'pending_presiden'],
            ['name' => 'approved'],
            ['name' => 'rejected'],
            ['name' => 'revisi'],
        ]);

        // Seed ministries
        $ministries = [
            [
                'nama' => 'Kementerian Komunikasi dan Informasi',
                'deskripsi' => 'Bertanggung jawab dalam pengelolaan komunikasi internal dan eksternal BEM, media sosial, dokumentasi, dan publikasi kegiatan.',
            ],
            [
                'nama' => 'Kementerian Riset dan Teknologi',
                'deskripsi' => 'Mengkoordinasikan kegiatan riset, pengembangan teknologi, dan inovasi bagi kemajuan kampus.',
            ],
            [
                'nama' => 'Kementerian Seni dan Budaya',
                'deskripsi' => 'Mengelola kegiatan seni, budaya, dan pengembangan kreativitas mahasiswa.',
            ],
            [
                'nama' => 'Kementerian Sosial dan Politik',
                'deskripsi' => 'Mengkoordinasikan kegiatan sosial, advokasi mahasiswa, dan hubungan dengan pihak eksternal.',
            ],
            [
                'nama' => 'Kementerian Olahraga dan Kesehatan',
                'deskripsi' => 'Mengelola kegiatan olahraga, kesehatan mahasiswa, dan kompetisi olahraga.',
            ],
        ];

        foreach ($ministries as $ministry) {
            Ministry::firstOrCreate(
                ['nama' => $ministry['nama']],
                ['deskripsi' => $ministry['deskripsi']]
            );
        }

        // Create roles
        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin']);
        $presidenRole = Role::firstOrCreate(['name' => 'Presiden BEM']);
        $wakilPresidenRole = Role::firstOrCreate(['name' => 'Wakil Presiden BEM']);
        $sekretarisRole = Role::firstOrCreate(['name' => 'Sekretaris']);
        $bendaharaRole = Role::firstOrCreate(['name' => 'Bendahara']);
        $menteriRole = Role::firstOrCreate(['name' => 'Menteri']);
        $anggotaRole = Role::firstOrCreate(['name' => 'Anggota']);

        // Create all permissions
        Permission::firstOrCreate(['name' => 'view_any_user']);
        Permission::firstOrCreate(['name' => 'view_user']);
        Permission::firstOrCreate(['name' => 'create_user']);
        Permission::firstOrCreate(['name' => 'update_user']);
        Permission::firstOrCreate(['name' => 'delete_user']);
        Permission::firstOrCreate(['name' => 'delete_any_user']);

        Permission::firstOrCreate(['name' => 'view_any_ministry']);
        Permission::firstOrCreate(['name' => 'view_ministry']);
        Permission::firstOrCreate(['name' => 'create_ministry']);
        Permission::firstOrCreate(['name' => 'update_ministry']);
        Permission::firstOrCreate(['name' => 'delete_ministry']);

        Permission::firstOrCreate(['name' => 'view_any_proposal']);
        Permission::firstOrCreate(['name' => 'view_proposal']);
        Permission::firstOrCreate(['name' => 'create_proposal']);
        Permission::firstOrCreate(['name' => 'update_proposal']);
        Permission::firstOrCreate(['name' => 'delete_proposal']);
        Permission::firstOrCreate(['name' => 'delete_any_proposal']);

        Permission::firstOrCreate(['name' => 'view_any_shield::role']);
        Permission::firstOrCreate(['name' => 'view_shield::role']);
        Permission::firstOrCreate(['name' => 'create_shield::role']);
        Permission::firstOrCreate(['name' => 'update_shield::role']);
        Permission::firstOrCreate(['name' => 'delete_shield::role']);

        Permission::firstOrCreate(['name' => 'view_any_program_kerja']);
        Permission::firstOrCreate(['name' => 'view_program_kerja']);
        Permission::firstOrCreate(['name' => 'create_program_kerja']);
        Permission::firstOrCreate(['name' => 'update_program_kerja']);
        Permission::firstOrCreate(['name' => 'delete_program_kerja']);

        // Activity Log Permissions (Hanya bisa view, tidak bisa create/edit/delete)
        Permission::firstOrCreate(['name' => 'view_any_activity_log']);
        Permission::firstOrCreate(['name' => 'view_activity_log']);

        // Assign permissions to Super Admin (ALL)
        $superAdminRole->givePermissionTo(Permission::all());

        // Assign permissions to Presiden BEM - Full access kecuali Shield/Roles dan Activity Log
        $presidenRole->givePermissionTo([
            // User Management
            'view_any_user', 'view_user', 'create_user', 'update_user', 'delete_user',
            // Ministry Management
            'view_any_ministry', 'view_ministry', 'create_ministry', 'update_ministry', 'delete_ministry',
            // Proposal Management
            'view_any_proposal', 'view_proposal', 'create_proposal', 'update_proposal', 'delete_proposal', 'delete_any_proposal',
            // Program Kerja Management
            'view_any_program_kerja', 'view_program_kerja', 'create_program_kerja', 'update_program_kerja', 'delete_program_kerja',
            // Activity Log - Hanya Super Admin yang bisa akses
        ]);

        // Assign permissions to Wakil Presiden BEM - Mirip Presiden
        $wakilPresidenRole->givePermissionTo([
            // User Management
            'view_any_user', 'view_user', 'create_user', 'update_user',
            // Ministry Management
            'view_any_ministry', 'view_ministry', 'create_ministry', 'update_ministry',
            // Proposal Management
            'view_any_proposal', 'view_proposal', 'create_proposal', 'update_proposal', 'delete_proposal',
            // Program Kerja Management
            'view_any_program_kerja', 'view_program_kerja', 'create_program_kerja', 'update_program_kerja', 'delete_program_kerja',
        ]);

        // Assign permissions to Sekretaris - Full access untuk proposal dan program kerja
        $sekretarisRole->givePermissionTo([
            // User Management
            'view_any_user', 'view_user', 'create_user', 'update_user',
            // Ministry Management
            'view_any_ministry', 'view_ministry', 'create_ministry', 'update_ministry',
            // Proposal Management - Full access
            'view_any_proposal', 'view_proposal', 'create_proposal', 'update_proposal', 'delete_proposal', 'delete_any_proposal',
            // Program Kerja Management
            'view_any_program_kerja', 'view_program_kerja', 'create_program_kerja', 'update_program_kerja', 'delete_program_kerja',
        ]);

        // Assign permissions to Bendahara - Full access untuk proposal dan program kerja
        $bendaharaRole->givePermissionTo([
            // User Management
            'view_any_user', 'view_user', 'create_user', 'update_user',
            // Ministry Management
            'view_any_ministry', 'view_ministry', 'create_ministry', 'update_ministry',
            // Proposal Management - Full access
            'view_any_proposal', 'view_proposal', 'create_proposal', 'update_proposal', 'delete_proposal', 'delete_any_proposal',
            // Program Kerja Management
            'view_any_program_kerja', 'view_program_kerja', 'create_program_kerja', 'update_program_kerja', 'delete_program_kerja',
        ]);

        // Assign permissions to Menteri - Bisa manage proposal dan program kerja untuk ministry mereka
        $menteriRole->givePermissionTo([
            // User Management
            'view_any_user', 'view_user',
            // Ministry Management
            'view_any_ministry', 'view_ministry',
            // Proposal Management
            'view_any_proposal', 'view_proposal', 'create_proposal', 'update_proposal', 'delete_proposal',
            // Program Kerja Management - Full access
            'view_any_program_kerja', 'view_program_kerja', 'create_program_kerja', 'update_program_kerja', 'delete_program_kerja',
        ]);

        // Assign permissions to Anggota - Bisa create dan view proposal/program kerja
        $anggotaRole->givePermissionTo([
            // Proposal Management - Bisa lihat semua dan create proposal
            'view_any_proposal', 'view_proposal', 'create_proposal',
            // Program Kerja Management - Bisa lihat semua dan create program kerja
            'view_any_program_kerja', 'view_program_kerja', 'create_program_kerja',
        ]);

        // Create admin user - menggunakan updateOrCreate untuk memastikan password selalu di-update
        $admin = User::updateOrCreate(
            ['email' => 'admin@mail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'ministry_id' => null,
            ]
        );
        // Pastikan role sudah ada dan assign dengan benar
        $admin->roles()->sync([]); // Hapus semua role yang ada
        $admin->assignRole($superAdminRole);
        $admin->refresh();
        
        // Clear permission cache
        Artisan::call('permission:cache-reset');

        // Create sample users for each role
        $presiden = User::updateOrCreate(
            ['email' => 'presiden@mail.com'],
            [
                'name' => 'Presiden BEM',
                'password' => Hash::make('password'),
                'ministry_id' => null,
            ]
        );
        $presiden->roles()->sync([]);
        $presiden->assignRole($presidenRole);
        $presiden->refresh();

        $wakilPresiden = User::updateOrCreate(
            ['email' => 'wakilpresiden@mail.com'],
            [
                'name' => 'Wakil Presiden BEM',
                'password' => Hash::make('password'),
                'ministry_id' => null,
            ]
        );
        $wakilPresiden->roles()->sync([]);
        $wakilPresiden->assignRole($wakilPresidenRole);
        $wakilPresiden->refresh();

        $sekretaris = User::updateOrCreate(
            ['email' => 'sekretaris@mail.com'],
            [
                'name' => 'Sekretaris',
                'password' => Hash::make('password'),
                'ministry_id' => null,
            ]
        );
        $sekretaris->roles()->sync([]);
        $sekretaris->assignRole($sekretarisRole);
        $sekretaris->refresh();

        $bendahara = User::updateOrCreate(
            ['email' => 'bendahara@mail.com'],
            [
                'name' => 'Bendahara',
                'password' => Hash::make('password'),
                'ministry_id' => null,
            ]
        );
        $bendahara->roles()->sync([]);
        $bendahara->assignRole($bendaharaRole);
        $bendahara->refresh();

        $menteri = User::updateOrCreate(
            ['email' => 'menteri@mail.com'],
            [
                'name' => 'Menteri',
                'password' => Hash::make('password'),
            ]
        );
        $menteri->roles()->sync([]);
        $menteri->assignRole($menteriRole);
        $menteri->refresh();

        $anggota = User::updateOrCreate(
            ['email' => 'anggota@mail.com'],
            [
                'name' => 'Anggota',
                'password' => Hash::make('password'),
            ]
        );
        $anggota->roles()->sync([]);
        $anggota->assignRole($anggotaRole);
        $anggota->refresh();
        
        // Clear permission cache
        Artisan::call('permission:cache-reset');

        // Create additional test users per ministry
        $ministries = Ministry::all();
        if ($ministries->count() > 0) {
            // Assign one menteri to first ministry as example
            $menteri->ministry_id = $ministries->first()->id;
            $menteri->save();

            // Create members for each ministry
            foreach ($ministries as $index => $ministry) {
                // Create 3-5 members per ministry
                $memberCount = rand(3, 5);
                for ($i = 1; $i <= $memberCount; $i++) {
                    $user = User::factory()->create();
                    $user->roles()->sync([]); // Pastikan tidak ada role sebelumnya
                    $user->assignRole($anggotaRole); // Assign role Anggota
                    $user->ministry_id = $ministry->id;
                    $user->save();
                }
            }
        }
        
        // Note: Presiden, Wakil Presiden, Sekretaris, Bendahara, and Admin don't have ministries (null)
        // Only Menteri and Anggota should have ministries assigned
    }
}
