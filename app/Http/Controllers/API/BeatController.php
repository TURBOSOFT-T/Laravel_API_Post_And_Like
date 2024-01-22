<?php

namespace App\Http\Controllers\API;

use App\Models\Beat;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\Back\BeatRequest;
use App\Http\Requests\Back\BeatUpdateRequest;
use App\Http\Requests\StoreBeatRequest;
use App\Http\Requests\UpdateBeatRequest;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as InterventionImage;
class BeatController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =Beat::all();
        return response()->json($users);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $data = Beat::whereId($id)->first();

        if (!$data) {
            return $this->getError('Id not found');
        } else {
            return $this->getResponse($data, 'retourne data id Post');
        }
    }




    public function create(BeatRequest $request)
    {


        $inputs = $this->getInputs($request);
        $data = Beat::create($inputs);

        return $this->sendResponse($data, 'Beat is  creatred succssufly');
    }


    protected function saveImages($request)
    {
        $image = $request->file('free_file');
        $name = time() . '.' . $image->extension();
        $img = InterventionImage::make($image->path());

        $img->widen(800)->encode()->save(public_path('/images/') . $name);
        $img->widen(400)->encode()->save(public_path('/images/thumbs/') . $name);
        return $name;
    }
    protected function getInputs($request)
    {
        $inputs = $request->except(['free_file']);

        if ($request->free_file) {
            $inputs['free_file'] = $this->saveImages($request);
           // $inputs['free_file'] = $this->saveImages($request);
        }
        return $inputs;
    }


     public function servePremiumFile(Beat $beat)
    {
        $filePath = storage_path('app/secure_files/' . $beat->premium_file);

        // Check if the file exists
        if (file_exists($filePath)) {
            return Response::download($filePath);
        }

        // File not found
        abort(404);
    }

    public function showPremiumFile(Beat $beat)
    {
        $this->authorize('viewPremiumFile', $beat);

        // Logic to serve the premium file
    }
 

    protected function deleteImages($beat)
    {
        File::delete([
            public_path('/images/') . $beat->image,
            public_path('/images/thumbs/') . $beat->image,
        ]);
    }

    public function update(BeatRequest $request, Beat $beat)
    {
        $inputs = $this->getInputs($request);

        if ($request->has('image')) {
            $this->deleteImages($beat);
        }

        $beat->update($inputs);

        return $this->sendResponse($beat, 'Beat is  updated succssufly');
    }



    public function delete($id, Beat $beat)
    {

        try {
            $res = Beat::findOrFail($id)->delete();
            $this->deleteImages($beat);
             $beat->delete();

            return $this->sendResponse($res, 'deleted succssufly');
        } catch (ModelNotFoundException $exception) {
            return $this->getError('Id not found');
        }
    }

    public function destroy(Beat $beat)
    {
        $this->deleteImages($beat);

        $beat->delete();

        return $this->sendResponse($beat, 'deleted succssufly');
    }
}