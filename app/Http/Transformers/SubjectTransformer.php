<?php

namespace App\Http\Transformers;


use App\Models\Subject;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;
use Phattarachai\ThaiDate\ThaiDate;

class SubjectTransformer extends TransformerAbstract
{
    protected array $availableIncludes = ['image'];     //รูปภาพ

    public function transform(Subject $subject): array
    {
        $data = [
            'id' => $subject->id,
            'name_th' => $subject->name_th,
            'name_en' => $subject->name_en,
            'professors' => fractal($subject->professors, new ProfessorTransformer())->includeImage()->toArray()['data'],
            'code' => $subject->code,
            'description' => $subject->description,
            'unit' => $subject->unit,
            'published_at' => $subject->published_at ? Carbon::parse($subject->published_at)->thaidate('j M Y') : null,
            'view' => $subject->view,

            // 'display_start_date' => Carbon::parse($announcement->start_date)->thaidate('j M Y'),
            // 'display_end_date' => Carbon::parse($announcement->end_date)->thaidate('j M Y'),

        ];
        return $data;
    }

    //รูปภาพ
    public function includeImage(Subject $subject)
    {
        $images = $subject->getMedia(Subject::MEDIA_COLLECTION_IMAGE);
        return $this->collection($images, new ImageTransformer());
    }
}
