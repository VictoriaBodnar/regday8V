<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class OtrsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $RasArr = array (array(10, 10, 'Власне споживання (брутто)'),
							array(11, 11, 'Власні потреби'),
							array(12, 11, 'тепловых электростанций (не викор.)'),
							array(13, 11, 'сетевых предприятий (не викор.)    '),
							array(14, 11, 'атомних электростанций  (не викор.)'),
							array(15, 15, 'Втрати'),
							array(16, 16, 'Виробничі потреби'),
							array(17, 17, 'Відпуск споживачам'),
							array(18, 18, 'І.Промисловість '),
							array(19, 19, '1. Паливна'),
							array(20, 19, '1.1 нафтовидобувна'),
							array(21, 19, '1.2 нафтопереробна'),
							array(22, 19, '1.3 газова'),
							array(23, 19, '1.4 вугільна'),
							array(60, 19, 'інша паливна'),
							array(24, 24, '2. Чорна металургія'),
							array(25, 25, '3.Кольорова металургія'),
							array(26, 26, '4.Хімічна та нафто-хімічна, із неї :'),
							array(27, 26, '4.1 азотна пром-сть'),
							array(28, 26, '4.2 пром-сть хім.волк.'),
							array(61, 26, 'інша хімічна'),
							array(29, 29, '5.Машинобудівна та метелообробна промисловості, із неї :'),
							array(30, 29, '5.1 важкого енергетич-ного та трансп.машбуд.'),
							array(31, 29, '5.2 електротехнічного машинобудування '),
							array(32, 29, '5.3 верстатобудівного та інструментального машинобудування'),
							array(33, 29, '5.4 автомобільного машинобудування'),
							array(34, 29, '5.5 тракторного та с/г машинобудування'),
							array(62, 29, 'інша машинобудівна'),
							array(35, 35, '6.Лісова, деревообробна'),
							array(36, 36, '7.Будівельних матеріалів, із неї : '),
							array(37, 36, '7.1 цементна'),
							array(63, 36, 'інша промисловість'),
							array(38, 38, '8.Скляна та фарфор.'),
							array(39, 39, '9.Легкапром-сть , із неї :'),
							array(40, 39, '9.1 текстильна'),
							array(64, 39, 'інші легкої'),
							array(41, 41, '10.Харчова промисловісь, із неї :'),
							array(42, 41, '10.1 Цукрова'),
							array(65, 41, 'інші цукрової'),
							array(43, 43, '11. Інші промислові виробн.'),
							array(44, 44, 'ІІ .Сільгоспспоживачі'),
							array(45, 45, 'ІІІ.Транспорт, у т.ч.'),
							array(46, 45, '1.електротяга з-ці'),
							array(47, 45, '2.міський ел.тр-т'),
							array(48, 45, '3.магістральний трубопро-відний тр-р'),
							array(66, 45, 'інші '),
							array(49, 49, 'ІV.Будівництво'),
							array(50, 50, 'V.Комунальне г-во, із нього'),
							array(51, 50, '1.Ком.та побут.водопост'),
							array(67, 50, 'інші комунальні'),
							array(52, 52, 'VІ. Освітл,побут навантаж,споживачі,що не брали участь у вимірах'));

/*10	10	ПОСТУПЛЕННЯ ЕЛЕНЕРГІЇ 				10		Власне споживання (брутто)
11	11	СОБСТВЕННЫЕ НУЖДЫ       				11	Власні потреби
12	11	тепловых электростанций 					тепловых электростанций (не викор.)
13	11	сетевых предприятий     			 		сетевых предприятий (не викор.)    
14	11	атомних электростанций  					атомних электростанций  (не викор.)
15	15	Т Р Э                   				15	Втрати
16	16	ПРОИЗВОДСТВЕННЫЕ НУЖДЫ  				16	Виробничі потреби
17	17	ОТПУСК ПОТРЕБИТЕЛЯМ     				17	Відпуск споживачам
18	18	1.ПРОМЫШЛЕННОСТЬ        				18	І.Промисловість 
19	19	ТОПЛИВНАЯ               				19	1. Паливна
20	19	нефтедобивающая         				20	1.1 нафтовидобувна
21	19	нефтеперерабативающая   				21	1.2 нафтопереробна
22	19	газовая                 				22	1.3 газова
23	19	угольная                				23	1.4 вугільна
60	19	прочая промышленность   				60	інша паливна
24	24	ЧЕРНАЯ МЕТАЛЛУРГИЯ      				24	2. Чорна металургія
25	25	ЦВЕТНАЯ МЕТАЛЛУРГИЯ     				25	3.Кольорова металургія
26	26	ХИМИЧЕСКАЯ И НЕФТЕХИМИЧЯ				26	4.Хімічна та нафто-хімічна, із неї :
27	26	азотная                 				27	4.1 азотна пром-сть
28	26	промишл.химнитей и волок				28	4.2 пром-сть хім.волк.
61	26	прочая промышленность   				61	інша хімічна
29	29	МАШИНОСТРОИТ.И МЕТАЛЛООР				29	5.Машинобудівна та метелообробна промисловості, із неї :
30	29	тяжелого энергет.и транс				30	5.1 важкого енергетич-ного та трансп.машбуд.
31	29	электротехническая      				31	5.2 електротехнічного машинобудування 
32	29	станкостроит.и инструмен				32	5.3 верстатобудівного та інструментального машинобудування
33	29	автомобильная           				33	5.4 автомобільного машинобудування
34	29	трактор.и сельск.хоз.маш				34	5.5 тракторного та с/г машинобудування
62	29	прочая промышленность   				62	інша машинобудівна
35	35	ЛЕСН.ДЕРЕВООБР.ЦЕЛЮЛОЗН.				35	6.Лісова, деревообробна
36	36	СТРОИТЕЛЬНЫХ МАТЕРИАЛ.  				36	7.Будівельних матеріалів, із неї : 
37	36	цементная               				37	7.1 цементна
63	36	прочая промышленность   				63	інша промисловість
38	38	СТЕКОЛЬНАЯ И ФАРФОРОФАЯН				38	8.Скляна та фарфор.
39	39	ЛЕГКАЯ                  				39	9.Легкапром-сть , із неї :
40	39	текстильная             				40	9.1 текстильна
64	39	прочая промышленность   				64	інші легкої
41	41	ПИЩЕВАЯ                 				41	10.Харчова промисловісь, із неї :
42	41	сахарная                				42	10.1 Цукрова
65	41	прочая промышленность   				65	інші цукрової
43	43	ДРУГИЕ ПРОМЫШЛ.ПРОИЗВОД.				43	11. Інші промислові виробн.
44	44	11.СЕЛЬХОЗПОТРЕБИТЕЛИ   				44	ІІ .Сільгоспспоживачі
45	45	111.ТРАНСПОРТ           				45	ІІІ.Транспорт, у т.ч.
46	45	электротяга железн.тран.				46	1.електротяга з-ці
47	45	городской эл.транспорт  				47	2.міський ел.тр-т
48	45	магистральный труб.транс				48	3.магістральний трубопро-відний тр-р
66	45	прочие потребители      				66	інші 
49	49	1V.СТРОИТЕЛЬСТВО        				49	ІV.Будівництво
50	50	V.КОММУНАЛЬНОЕ ХОЗ-ВО   				50	V.Комунальне г-во, із нього
51	50	коммунальное,быт.водосн.				51	1.Ком.та побут.водопост
67	50	прочие потребители      				67	інші комунальні
52	52	V1.СВЕТ,БЫТ,МЕЛКОМ.ПОТР.				52	VІ. Освітлення, побутове навантаження, навантаження споживачі, що не брали участь у вимірах*/

		  	

    	foreach($RasArr as $key => $v) {
			        
			        DB::table('otrs')->insert([
			            'kod_podotr' => $v[0],
			            'kod_otr' => $v[1],
			            'name_otr' => $v[2],
			            'user_id' => 1,
			            'created_at' => date("Y-m-d H:i:s"),
			            'updated_at' => date("Y-m-d H:i:s")
			            
			        ]);
       	}	
    }
}
