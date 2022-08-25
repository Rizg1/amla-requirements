<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class FormSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Application for HMO',],
            ['id' => 2, 'name' => 'KYC Form',],
            ['id' => 3, 'name' => 'Member Enrollmentlist',],
            ['id' => 4, 'name' => 'Signed Proposal',],
            ['id' => 5, 'name' => 'Sec Registration',],
            ['id' => 6, 'name' => 'Articles Of Incorporation',],
            ['id' => 7, 'name' => 'Copies of By-Laws',],
            ['id' => 8, 'name' => 'Corporate Secretary Cert',],
            ['id' => 9, 'name' => 'Certified List',],
            ['id' => 10, 'name' => 'Copy of Valid IDs',],
            ['id' => 11, 'name' => 'Sworn Statement',],

        ];

        foreach ($items as $item) {
            \App\Form::create($item);
        }
    }
}
