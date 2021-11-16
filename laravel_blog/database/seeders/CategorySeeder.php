<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert Category into Database
        $tag = array(array('PHP', "Memahami Bahasa Pemrograman PHP"),
                    array('JS' , "Memahami Bahasa Pemrograman JS"),
                    array('Go-lang' , "Memahami Bahasa Pemrograman Go-lang"),
                    array('SQL', "Memahami Database SQL"),
                    array('NoSQL', "Memahami Database NoSQL"),
                    array('Laravel', "Memahami Framework Laravel"),
                    array('NodeJs', "Memahami Framework NodeJs"));

        for($i = 0; $i < 7; $i++){
            DB::table('categories')->insert([
                "tag" => $tag[$i][0],
                "desc" => $tag[$i][1],
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]);
        }
    }
}
