<?php

namespace App\Http\Transformers;

use App\Models\Department;
use App\Models\Professor;
use App\Models\Subject;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;
use Phattarachai\ThaiDate\ThaiDate;

class DepartmentTransformer extends TransformerAbstract
{
    //protected array $availableIncludes = ['documents'];

    public function transform(Department $department): array
    {
        $data = [
            'id' => $department->id,
            'name' => $department->name,



            // 'display_start_date' => Carbon::parse($announcement->start_date)->thaidate('j M Y'),
            // 'display_end_date' => Carbon::parse($announcement->end_date)->thaidate('j M Y'),

        ];
        return $data;
    }

    // public function includeDocuments(Subject $subject)
    // {
    //     $documents = $subject->getMedia(Subject::MEDIA_COLLECTION_DOCUMENTS);
    //     return $this->collection($documents, new AnnouncementDocumentTransformer());
    // }
}
