<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Professor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfessorSeeder extends Seeder
{
    protected array $availableIncludes = ['image'];     //รูปภาพ

    public function run(): void
    {
        Professor::factory()->create([
            'major' => 'การบัญชี',
            'prefix' => 'ดร.',
            'first_name' => 'มรุต',
            'last_name' => 'กลัดเจริญ',
            'department_id' => Department::first()->id ?? Department::factory()
        ]);
        Professor::factory()->count(10)->create();

        $professors = Professor::all();
        foreach ($professors as $professor){
            $professor->addMedia(storage_path('seed/mock_professor_image.jpeg'))->preservingOriginal()   //จัดการรูปภาพ
            ->toMediaCollection(Professor::MEDIA_COLLECTION_IMAGE);
        }

    }



}
