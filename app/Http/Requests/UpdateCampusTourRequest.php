<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCampusTourRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|string', // assuming video is a URL or file path string if not uploaded
            'link' => 'nullable|url',
            'campus_tour_category_id' => 'required|exists:campus_tour_categories,id',
        ];

        // Custom validation to ensure at least one content type exists
        // We need to check if the user provided new content OR if old content exists
        $campusTour = $this->route('campus_tour');
        // campus_tour might be an ID or model depending on binding
        if (!($campusTour instanceof \App\Models\CampusTour)) {
            $campusTour = \App\Models\CampusTour::find($this->route('campus_tour'));
        }

        if ($campusTour) {
             $hasImage = $this->hasFile('image') || $campusTour->image;
             $hasVideo = $this->hasFile('video') || $this->input('video') || $campusTour->video; 
             // Note: 'video' input might be null if not sending new one, but we check DB
             $hasLink = $this->input('link') || $campusTour->link;
             
             // If user explicitly sends null/empty for link, we should check input 'link' presence?
             // Actually, if they want to clear it, they might send empty string.
             // But let's assume if they don't send anything new, we respect old.
             
             // However, checking 'required_without_all' is complex with existing data.
             // A simpler approach: Add a "after" hook or just rely on the fact that 
             // if they satisfy 'one of' it's fine. 
             // But standard rules are static array.
             
             // Let's use a closure or 'after' validation if possible, OR
             // dynamically build rules.
        }

        return $rules;
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
             $campusTour = $this->route('campus_tour');
             if (!($campusTour instanceof \App\Models\CampusTour)) {
                $campusTour = \App\Models\CampusTour::find($this->route('campus_tour'));
             }
             
             if ($campusTour) {
                 $image = $this->hasFile('image') ? true : !empty($campusTour->image);
                 $video = ($this->hasFile('video') || $this->input('video')) ? true : !empty($campusTour->video);
                 $link = $this->input('link') ? true : (!empty($campusTour->link) && $this->input('link') !== null);
                 // If input link is present but empty, it means clearing. If not present (null), keep old.
                 // Correct logic:
                 // New Image OR Old Image (if not replaced)
                 // New Video OR Old Video
                 // New Link OR Old Link (if not cleared)
                 
                 // If the user sends 'link' => null, they are clearing it.
                 // So we should check:
                 // 1. Has new image file? YES -> Valid.
                 // 2. Has new video file? YES -> Valid.
                 // 3. Has new link? YES -> Valid.
                 // 4. If none of above new, do we have old?
                 
                 // Be careful: if user uploads new image, we don't care about old link.
                 // If user does NOTHING, we should have old data.
                 
                 // Let's simplified this.
                 // We only fail if:
                 // No new image AND No old image
                 // AND No new video AND No old video
                 // AND No new link AND No old link (or link explicitly cleared)
                 
                 $hasImage = $this->hasFile('image') || (!empty($campusTour->image));
                 $hasVideo = $this->hasFile('video') || (!empty($campusTour->video)); 
                 // Note: StoreCampusTourRequest allowed 'string' for video too? Assuming file upload for now based on controller store()
                 
                 $hasLink = !empty($this->input('link'));
                 if ($this->input('link') === null && !empty($campusTour->link)) {
                     $hasLink = true; // Not clearing, so old link persists
                 }
                 
                 if (!$hasImage && !$hasVideo && !$hasLink) {
                     $validator->errors()->add('base', 'At least one of Image, Video, or Link is required.');
                 }
             }
        });
    }
}
