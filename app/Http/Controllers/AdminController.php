<?php

namespace App\Http\Controllers;
use App\Models\CarDetails;
use App\Models\DriverDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
class AdminController extends Controller
{
    public function adminIndex() {
        $totalCount = CarDetails::get()->count();
        $totalUsers = User::where('user_type', '!=', 0)->get()->count();
        return view('admin.index', [
            'totalCount' => $totalCount,
            'totalUsers' => $totalUsers
        ]);
    }

    public function carList() {
        $carDetails = CarDetails::get();

        return view('admin.cars-list', [
            'carDetails' => $carDetails
        ]);
    }

    public function userList() {
        $userDetails = User::get();
        return view('admin.users' ,[
            'userDetails' => $userDetails
        ]
    );
    }

    public function addCar() {
        return view('admin.add-car-details');
    }

    public function editCarDetails(int $id = null) {
        $carDetails = CarDetails::where('cars.id', $id)
            ->leftJoin('driver_details', 'driver_details.car_id', '=', 'cars.id')
            ->select('driver_details.id as driver_id', 'driver_details.name as driver_name', 'driver_details.car_id', 'driver_details.email', 'driver_details.phone', 'driver_details.age', 'cars.*')
            ->first();

        return view('admin.edit-car-details', [
            'carDetails' => $carDetails,
            'id' => $id
        ]);
    }

    public function saveCarDetails(Request $request) {
        $rules = [
            'name' => 'required',
            'owner' => 'required',
            'color' => 'required',
            'rent' => 'required',
            'car_number' => 'required',
            'image' => 'required',
            'driver_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'age' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        try {
            $id = $request->id ?? '';
            if($request->hasfile('image'))  {
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName();
                $tempPath = $file->getRealPath();
                $tempFilePath = sys_get_temp_dir() . '/' . $fileName;
                move_uploaded_file($tempPath, $tempFilePath);
                $image = Image::make($tempFilePath);
                $image->encode('jpg');
                $destinationPath = 'uploads/cars';
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }
                $newFileName = pathinfo($fileName, PATHINFO_FILENAME) .time(). '.jpg';
                $newFilePath = $destinationPath . '/' . $newFileName;
                $image->save($newFilePath);
                unlink($tempFilePath);
            }
            if($id == '') {
                $carId = CarDetails::insertGetId([
                    'name' => $request->name,
                    'owner' => $request->owner,
                    'color' => $request->color,
                    'rent' => $request->rent,
                    'car_number' => $request->car_number,
                    'image' => $newFilePath
                ]);
    
                $DriverDetails = DriverDetails::insert([
                    'car_id' => $carId,
                    'name' => $request->driver_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'age' => $request->age
                ]);
            } else {
                $carId = CarDetails::where('id', $id)->update([
                    'name' => $request->name,
                    'owner' => $request->owner,
                    'color' => $request->color,
                    'rent' => $request->rent,
                    'car_number' => $request->car_number,
                    'image' => $newFilePath ?? $request->image
                ]);
    
                $DriverDetails = DriverDetails::where('car_id', $id)->update([
                    'name' => $request->driver_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'age' => $request->age
                ]);
            }
           
            return redirect()->route('cars-list')->with('success', "Car has been added/updated successfully!");
        } catch(Exception $e) {
            return redirect()->route('cars-list')->with('error', $e->getMessage());
        }

    }

    public function deleteCarDetails(int $id = null) {
        $carDetails = DriverDetails::where('car_id', $id)->delete();
        $carDetails = CarDetails::where('id', $id)->delete();

        return redirect()->route('cars-list')->with('success', "Car Details has been deleted successfully!");
    }

    public function home() {
        $carDetails = CarDetails::get();
        return view('indexpage', [
            'carDetails' => $carDetails
        ]);
    }

    /**
     * About Page
     */
    public function about() {
        return view('about');
    }

    /**
     * Bloge Page
     */
    public function blog() {
        return view('blog');
    }

    /**
     *car listing
     */
    public function cars() {
        return view('cars');
    }


    /**
     * Services page
     */
    public function services() {
        return view('services');
    }

    /**
     * contact page
     */
    public function contact() {
        return view('contact');
    }

    public function myDetails() {
        return view('users.my-details');
    }

    public function myJourny() {
        return view('users.my-journy');
    }
}
