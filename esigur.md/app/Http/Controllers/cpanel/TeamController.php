<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Validation\Rule;

class TeamController extends Controller
{

    use traits\TranslateFunctions;
    use traits\ImageFunctions;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $teams = team::orderBy('order','asc')->get();

      return view('cpanel.teams.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('cpanel.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Team $team)
    {
      $request->validate([
          'image' => 'required'
      ]);

      $data = $request->all();

      if ($request->file('image')) {
        $name = (string)\Str::uuid();
        $data['image'] = $name;

        $path_lg = $request->file('image')->storeAs('teams/lg', $name.'.jpg');
        $path_md = $request->file('image')->storeAs('teams/md', $name.'.jpg');
        $path_sm = $request->file('image')->storeAs('teams/sm', $name.'.jpg');

        $img_lg = Image::make('files/'.$path_lg);
        $img_md = Image::make('files/'.$path_md);
        $img_sm = Image::make('files/'.$path_sm);

        $this->resizeImage($img_lg, 'teams/lg' , $name, 400, 600, 70);
        $this->resizeImage($img_md, 'teams/md' , $name, 350, 530, 70);
        $this->resizeImage($img_sm, 'teams/sm' , $name, 300, 455, 70);
      }

      $data = $this->makeJson($data);

      $result = $team->create($data);

      return redirect()->route('teams.edit',$result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
      return view('cpanel.teams.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
      if ($request->missing(['name','title'])) {
        $data = json_decode($team, true);
        if ($request->order) {
          $data['order'] = $request->order;
        }
        $data = $this->makeJson($data);
        $team->update($data);
        return back();
      }

      $data = $request->all();

      if ($request->file('image')) {
        $name = (string)\Str::uuid();
        $data['image'] = $name;

        $path_lg = $request->file('image')->storeAs('teams/lg', $name.'.jpg');
        $path_md = $request->file('image')->storeAs('teams/md', $name.'.jpg');
        $path_sm = $request->file('image')->storeAs('teams/sm', $name.'.jpg');

        $img_lg = Image::make('files/'.$path_lg);
        $img_md = Image::make('files/'.$path_md);
        $img_sm = Image::make('files/'.$path_sm);

        $this->resizeImage($img_lg, 'teams/lg' , $name, 400, 600, 70);
        $this->resizeImage($img_md, 'teams/md' , $name, 350, 530, 70);
        $this->resizeImage($img_sm, 'teams/sm' , $name, 300, 455, 70);

        Storage::delete('teams/sm/'.$team->image.'.jpg');
        Storage::delete('teams/sm/'.$team->image.'.webp');
        Storage::delete('teams/md/'.$team->image.'.jpg');
        Storage::delete('teams/md/'.$team->image.'.webp');
        Storage::delete('teams/lg/'.$team->image.'.jpg');
        Storage::delete('teams/lg/'.$team->image.'.webp');
      }

      $data = $this->makeJson($data);

      $result = $team->update($data);

      return redirect()->route('teams.edit',$team);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
      Storage::delete('teams/sm/'.$team->image.'.jpg');
      Storage::delete('teams/sm/'.$team->image.'.webp');
      Storage::delete('teams/md/'.$team->image.'.jpg');
      Storage::delete('teams/md/'.$team->image.'.webp');
      Storage::delete('teams/lg/'.$team->image.'.jpg');
      Storage::delete('teams/lg/'.$team->image.'.webp');

      $team->delete();

      return redirect()->route('teams.index');
    }
}
