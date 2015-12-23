<?php

use Illuminate\Database\Seeder;
use App\Area;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
            'name' => 'bedroom1',
            'position' => 'height: 161px;
                            left: 202px;
                            position: absolute;
                            top: 93px;
                            width: 108px;'
            ],

            [
            'name' => 'bedroom2',
            'position' => 'height: 161px;
                            left: 316px;
                            position: absolute;
                            top: 93px;
                            width: 138px;'
            ],

            [
            'name' => 'bedroom3',
            'position' => 'height: 145px;
                            left: 461px;
                            position: absolute;
                            top: 110px;
                            width: 130px;'
            ],

            [
            'name' => 'bathroom1',
            'position' => ' height: 89px;
                            left: 202px;
                            position: absolute;
                            top: 260px;
                            width: 108px;'
            ],

            [
            'name' => 'bathroom2',
            'position' => 'height: 89px;
                            left: 358px;
                            position: absolute;
                            top: 260px;
                            width: 102px;'
            ],

            [
            'name' => 'bathroom3',
            'position' => 'height: 89px;
                            left: 460px;
                            position: absolute;
                            top: 260px;
                            width: 125px;'
            ],

            [
            'name' => 'corridoor',
            'position' => 'height: 45px;
                            left: 196px;
                            position: absolute;
                            top: 355px;
                            width: 264px;'
            ],

            [
            'name' => 'dresser',
            'position' => 'height: 93px;
                            left: 52px;
                            position: absolute;
                            top: 406px;
                            width: 139px;'
            ],

            [
            'name' => 'master-bebroom',
            'position' => 'height: 160px;
                            left: 52px;
                            position: absolute;
                            top: 503px;
                            width: 139px;'
            ],

            [
            'name' => 'foyer',
            'position' => 'height: 56px;
                            left: 196px;
                            position: absolute;
                            top: 400px;
                            width: 116px;'
            ],

            [
            'name' => 'master-bathroom',
            'position' => 'height: 195px;
                            left: 196px;
                            position: absolute;
                            top: 462px;
                            width: 116px;'
            ],

            [
            'name' => 'kitchen',
            'position' => 'height: 131px;
                            left: 316px;
                            position: absolute;
                            top: 408px;
                            width: 138px;'
            ],

            [
            'name' => 'dinning',
            'position' => 'height: 119px;
                            left: 316px;
                            position: absolute;
                            top: 539px;
                            width: 138px;'
            ],

            [
            'name' => 'living',
            'position' => 'height: 279px;
                            left: 461px;
                            position: absolute;
                            top: 355px;
                            width: 134px;'
            ],

            [
            'name' => 'terrace',
            'position' => 'height: 512px;
                            left: 593px;
                            position: absolute;
                            top: 132px;
                            width: 171px;'
            ],



            [
            'name' => 'landscape',
            'position' => 'height: 477px;
                            left: 764px;
                            position: absolute;
                            top: 163px;
                            width: 204px;'
            ],

        ];

        $faker = Faker\Factory::create();

        foreach ($data as $value) {
            Area::create($value);
        }
    }
}
