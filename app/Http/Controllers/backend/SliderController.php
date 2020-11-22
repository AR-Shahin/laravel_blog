<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Slider;
use Illuminate\Http\Request;
use function redirect;
use function unlink;
use Carbon\Carbon;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['sliders'] = Slider::latest()->get();
        return view('backend.slider.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $heading = ucwords($request->heading);
        $image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($request->image->extension());
        $img_name = $name_gen . '.' . $img_ext;
        $upload = 'uploads/sliders/';
        $last_image = $upload . $img_name;

        $slider = new Slider();
        $slider->heading = $heading;
        $slider->image = $last_image;
        if($slider->save()){
            $image->move($upload,$img_name);
            $this->setSuccessMessage('Slider Added Successfully!');
            return redirect()->route('slider.index');
        }
    }


    public function update(Request $request, $id)
    {
        $image = $request->file('image');
        if ($image) {
            $old_image = $request->old_image;
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $upload = 'uploads/sliders/';
            $last_image = $upload . $img_name;

            $update = Slider::findorFail($id)->update([
                'heading' => ucwords($request->heading),
                'image' => $last_image,
                'updated_at' => Carbon::now()
            ]);
            if($update){
                $image->move($upload,$img_name);
                unlink($old_image);
                $this->setSuccessMessage('Slider Updated Successfully!');
            }
        }else{
            $update = Slider::findorFail($id)->update([
                'heading' => ucwords($request->heading),
                'updated_at' => Carbon::now()
            ]);
            if($update){
                $this->setSuccessMessage('Slider Updated Successfully!');
            }
        }
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $delete = Slider::findorFail($id)->delete();
        if($delete){
            unlink($request->img);
            $this->setSuccessMessage('Slider Deleted');
            return redirect()->back();
        }
    }


    public function sliderInactive($id){
        $update = Slider::find($id);
        $update->status = 0;
        if($update->save()){
            $this->setSuccessMessage('Slider Inactive Successfully.');
            return redirect()->back();
        }
    }
    public function sliderActive($id){

        $update = Slider::find($id);
        $update->status = 1;
        if($update->save()){
            $this->setSuccessMessage('Slider Active Successfully.');
            return redirect()->back();
        }
    }
}
