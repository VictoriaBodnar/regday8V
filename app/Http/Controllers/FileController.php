<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\GrafsImport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Auth;
class FileController extends Controller 
{
    public function __construct()
    {
        $this->middleware('auth');

        //$this->middleware('log')->only('index');

        //$this->middleware('subscribed')->except('store');
    }
    public function uploadContentWithPackage(Request $request)
    {
        
    }
    public function importExportExcelORCSV()
    {
        //return view('file_import_export');
         return view('file_import_export', ['data' => [], 'message' => '']);
    }
    public function importFileIntoDB(Request $request)
    {
        if ($request->file('file_for_upload')) {

                $file = $request->file('file_for_upload');
                $result_checking = $this->checkFile($file);
                if (empty($result_checking['checkSumFile'])){ 
                    return $result_checking; //error was found
                }
                //dd($result_checking);
                $import = new GrafsImport();
                
                \Excel::import($import, $request->file('file_for_upload'));//->store('temp')
                return redirect('/graf/'.$result_checking['date_zamer'])->with('message', 'Дані успішно внесено! Дата виміру: '.$result_checking['date_zamer'].' тип виміру: '.$result_checking['type_zamer'] .' Загальна сума: '.$result_checking['checkSumFile'].' кВт');
            } else {
                dd('No file was uploaded');
            }
    }

    public function checkFile($file){
        
        $i=0; $checkSumFile = 0;
        $dateToReturn = ''; $typeToReturn = ''; $duplicate_kods=''; $unknown_kods=''; $errmsg='';
        
        $data = \Excel::toArray(new GrafsImport, $file);
        //$xx = count($data[0]);
        //$keys = array_keys($data);
        $data = $data[0];
        //dd($data);
        if (count($data) < 2) {
            return view('file_import_export',['data' => $data, 'message' => 'Помилка! Дані у файлі не знайдено.  '.count($data[0])]);  
        }
                //dd($arr[0]['kod_consumer']);
        /*foreach ($data as $key => $value) {
                    //dd($value[$key]['kod_consumer']);
                    //dd($value->kod_consumer);
        }*/ 
        foreach ($data as $key => $value) {
            //dd($value['date_zamer']);

            $i++;
            $onlyKodConsumer[] = "'".$value['kod_consumer']."'";
            //check date_zamer and type_zamer only in the first row. Further We'll be using them for all rows
            if ($i==1){
                $paspsRow = \DB::table('pasps')->where('date_zamer', $value['date_zamer'])->first();
                if (!$paspsRow) {
                    return view('file_import_export',['data' => $data, 'message' => 'Помилка! Знайдено невірну дату вимірів:  '.$value['date_zamer'], 'errRow' => $value['kod_consumer']]); 
                }  
                $dateToReturn = $value['date_zamer'];//the checking of date went success 
                
                $typesRow = \DB::table('types')->where('name_type', $value['type_zamer'])->first();
                if (!$typesRow) {
                    return view('file_import_export',['data' => $data, 'message' => 'Помилка! Знайдено невідомий тип вимірів:  '.$value['type_zamer'], 'errRow' => $value['kod_consumer']]);
                }
                $typeToReturn = $value['type_zamer'];//the checking of type went success 
            }
            
            //check kod_consumer for each row of the uploading file. It must be in consumers table.
            $consumersRow = \DB::table('consumers')->where('kod_consumer', $value['kod_consumer'])->first();
            if (!$consumersRow) {
                //return view('file_import_export',['data' => $data, 'message' => 'Помилка! Невідомий код споживача:  '.$value['kod_consumer'], 'errRow' => $value['kod_consumer']]);
                $unknown_kods.= $value['kod_consumer']."\n";
            }

            //check if value of measure is NUMERIC and INTEGER 
            $listVal = array('a1','a2','a3','a4','a5','a6','a7','a8','a9','a10','a11','a12','a13','a14','a15','a16','a17','a18','a19','a20','a21','a22','a23','a24','a_cyt');
            $checkSumCyt = 0;
            foreach ($listVal as $k => $v) {
                $vv = $value[$v]; 
                $pos = strpos($vv, ".");
                $num_r_for_message=$i+1;
                if (!$pos === false) {
                    //return "!!!!!!!!!!!!!!!!!Period found!!!!!!!!!!!!!!!!!!!!!!".$v."=".$vv." in row ".$num_r_for_message;
                    return view('file_import_export',['data' => $data, 'message' => ' Помилка! Знайдене не ціле число!'.$v.'='.$vv.' in row '.$num_r_for_message, 'errRow' => $value['kod_consumer']]);
                }
                if (!is_numeric($vv)) {
                    return view('file_import_export',['data' => $data, 'message' => ' Помилка! Знайдене нечислове значення виміру!'.$v.'='.$vv.' in row '.$num_r_for_message, 'errRow' => $value['kod_consumer']]);
                }
                if ($v == 'a_cyt') {
                    if ($checkSumCyt!=$vv) { 
                            return view('file_import_export',['data' => $data, 'message' => 'Помилка! НЕВІРНЕ ДОБОВЕ ЗНАЧЕННЯ!'.$vv.' - '.$checkSumCyt.' in row '.$num_r_for_message, 'errRow' => $value['kod_consumer']]);
                    } 
                
                }else{
                    $checkSumCyt = $checkSumCyt+$vv;
                }  

            }
            $checkSumFile+=$checkSumCyt; 
        }
        
        //check uniqueness kod_consumer of the uploading file.
        $counts = array_count_values($onlyKodConsumer);
        foreach ($counts as $duplicate_kod => $count) {
        //print $name . ' | ' . ($count > 1 ? 'Duplicate' : 'Unique') . "\n";
          if ($count > 1) {$duplicate_kods.= $duplicate_kod."  "; } 
        }
        if ($duplicate_kods != '') {$errmsg.= 'Помилка! Знайдено не унікальний код споживача:  '.$duplicate_kods;} 
        if ($unknown_kods != '') {$errmsg.= 'Помилка! Знайдено невідомий код споживача:  '.$unknown_kods;}
        if ($errmsg != ''){
            return view('file_import_export',['data' => $data, 'message' => $errmsg, 'errRow' => $duplicate_kod]); 
        }   
        ////check uniqueness kod_consumer of the uploading file.
        //if (count($onlyKodConsumer)!=count(array_unique($onlyKodConsumer))) {
        //    //return "kod_consumer is not unique in uploading file";
        //    return view('file_import_export',['data' => $data, 'message' => 'Error! kod_consumer is not unique in an uploading file:  '.$value->kod_consumer, 'errRow' => $value->kod_consumer]);
        //}
        
        $arrToReturn = ['checkSumFile' => $checkSumFile, 'date_zamer' => $dateToReturn, 'type_zamer' => $typeToReturn];   
        return  $arrToReturn;
    }    
       
    public function downloadExcelFile($type){
        $grafs = Graf::get()->toArray();
        return \Excel::create('graf_export', function($excel) use ($grafs) {
            $excel->sheet('graf', function($sheet) use ($grafs)
            {
                $sheet->fromArray($grafs);
            });
        })->download($type);
    }      
}
