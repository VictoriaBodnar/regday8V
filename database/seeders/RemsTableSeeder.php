<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		 DB::table('rems')->delete();
         $RasArr = array (array(524,  7,	'СО "Хмільницькі ЕМ"'),
							array(527,  7,	'СО "Шаргородські ЕМ"'),
							array(506,  7,	'СО "Замостянські ЕМ"'),
							array(525,  7,	'СО "Чернівецькі ЕМ"'),
							array(501,  7,	'СО "Барські ЕМ"'),
							array(520,  7,	'СО "Тиврівські ЕМ"'),
							array(513,  7,	'СО "Могилів-Подільські ЕМ"'),
							array(508,  7,	'СО "Калинівські  ЕМ"'),
							array(505,  7,	'СО "Жмеринські ЕМ"'),
							array(509,  7,	'СО "Казатинські ЕМ"'),
							array(511,  7,	'СО "Літинські ЕМ"'),
							array(514,  7,	'СО "Мурованокуриловецькі ЕМ'),
							array(503,  7,	'СО "Вінницькі МЕМ"'),
							array(502,	15,	'СО "Бершадські  ЕМ"'),
							array(504,	15,	'СО "Гайсинські ЕМ"'),
							array(507,	15,	'СО "Іллінецькі ЕМ"'),
							array(510,	15,	'СО "Крижопільські ЕМ"'),
							array(512,	15,	'СО "Липовецькі ЕМ"'),
							array(515,	15,	'СО "Немирівські ЕМ"'),
							array(517,	15,	'СО "Піщанські ЕМ"'),
							array(518,	15,	'СО "Погребищенські ЕМ"'),
							array(519,	15,	'СО "Теплицькі ЕМ"'),
							array(523,	15,	'СО "Тульчинські ЕМ"'),
							array(521,	15,	'СО "Томашпільські ЕМ"'),
							array(522,	15,	'СО "Тростянецькі ЕМ"'),
							array(526,	15,	'СО "Чечельницькі ЕМ"'),
							array(516,	15,	'СО "Оратівські ЕМ"'),
							array(528,	15,	'СО "Ямпільські ЕМ"'));


    	foreach($RasArr as $key => $v) {
			        
			        DB::table('rems')->insert([
			            'kod_rem' => $v[0],
			            'kod_seti' => $v[1],
			            'name_rem' => $v[2],
			            'user_id' => 1,
			            'created_at' => date("Y-m-d H:i:s"),
			            'updated_at' => date("Y-m-d H:i:s")
			            
			        ]);
       	}	
    }
}
