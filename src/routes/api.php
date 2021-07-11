<?php
use App\Upcoming;
use App\Today;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\UpcomingResource;
use Illuminate\Support\Facades\DB;
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// ** Upcoming Task *//

// geting all the upcoming task
Route::get("/upcoming", function(){
    $upcoming = Upcoming::all();
    return UpcomingResource::collection($upcoming);
});

// add a new task
Route::post("/upcoming", function(Request $request){
    return Upcoming::create([
        "title" => $request->title,
        "taskId" => $request->taskId,
        "waiting" => $request->waiting,
    ]);
});

// Delete the upcoming task
Route::delete("/upcoming/{taskId}", function($taskId){
    DB::table('upcomings')->where('taskId',$taskId)->delete();
    return 204;
});

//** Today Task */
Route::post('/dailytask', function(Request $request){
    return Today::create([
        'id' => $request->id,
        'title' => $request->title,
        'taskId' => $request->taskId,
    ]);
});

// Delete today task
Route::delete('/dailytask/{taskId}', function($taskId){
    DB::table('todays')->where('taskId',$taskId)->delete();
    return 204;
});
