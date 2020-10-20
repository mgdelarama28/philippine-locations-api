<?php

use App\Models\Location;

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * CSV filepath.
     *
     * @var string
     */
    protected $csv = 'database/seeds/csv/locations.csv';
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->init();

        /*
        | @Begin Transaction
        |---------------------------------------------*/
        DB::beginTransaction(); 

        $this->seed();

        /*
        | @End Transaction
        |---------------------------------------------*/
        DB::commit();
    }

    /**
     * Initialize seeder.
     *
     * @return void
     */
    private function init()
    {
        Location::truncate();
    }

    /**
     * Start seeding.
     *
     * @return void
     */
    private function seed()
    {
        $row = 1;
        $keys = [];

        if(file_exists($this->csv)) {
            if(($handle = fopen($this->csv, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, "|")) !== FALSE) {
                    
                    if($row == 1) {
                       
                        $keys = $data;

                    } else {
                       
                        echo "Row: $row\r";
                        $this->write(array_combine($keys, $data));
                    
                    }

                    $row++;
                }

                fclose($handle);
            }
        } else {
            $this->command->line("<fg=red;>Skipping " . $this->csv . ", file not found<fg=yellow;>");
        }
    }

    /**
     * Write record.
     *
     * @param array $data
     * @return void
     */
    private function write($data)
    {
    	Location::create($data);
    }
}
