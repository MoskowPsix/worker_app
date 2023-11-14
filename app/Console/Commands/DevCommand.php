<?php

namespace App\Console\Commands;

use App\Models\Deportment;
use App\Models\Position;
use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectWorker;
use App\Models\Worker;
use Illuminate\Console\Command;

class DevCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'develop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Some develops';

    /**
     * Execute the console command.
     */
    public function handle()
    {
    //    $this->prepareData();
    //    $this->prepareManyToMany();

    $worker = Worker::find(1);
    dd($worker->projects->toArray());
    return 0;
    }

    private function prepareData() {
        $deportments = Deportment::create([
            'title' => 'IT',
        ]);

        $deportments1 = Deportment::create([
            'title' => 'Analytics',
        ]);


        $positionData = Position::create(['title' => 'Developer', 'deportment_id' => $deportments->id]);
        $positionData1 = Position::create(['title' => 'Manager', 'deportment_id' => $deportments->id]);
        $positionData2 = Position::create(['title' => 'Desigher', 'deportment_id' => $deportments->id]);


        $workerData =[
            'name'=> 'Ivan',
            'surname' => 'Gladas',
            'email' => 'gl@gl.ru',
            'age' => '26',
            'position_id'=> $positionData->id,
            'descriptions' => 'HAHAHAHAHAHAH',
            'is_married' => false,
        ];
        $workerData1 =[
            'name'=> 'fad',
            'surname' => 'simonov',
            'email' => 'gl@gl.ru',
            'age' => '23',
            'position_id'=> $positionData1->id,
            'descriptions' => 'HAHAHAHAHAHAH',
            'is_married' => true,
        ];
        $workerData2 =[
            'name'=> 'Slava',
            'surname' => 'Sidorov',
            'email' => 'gl@gl.ru',
            'age' => '30',
            'position_id'=> $positionData->id,
            'descriptions' => 'HAHAHAHAHAHAH',
            'is_married' => false,
        ];
        $workerData3 =[
            'name'=> 'zhenya',
            'surname' => 'Sapolsk',
            'email' => 'zh@gl.ru',
            'age' => '30',
            'position_id'=> $positionData2->id,
            'descriptions' => 'HAHAHAHAHAHAH',
            'is_married' => false,
        ];
        $workerData4 =[
            'name'=> 'Vlad',
            'surname' => 'Tarec',
            'email' => 'tr@gl.ru',
            'age' => '29',
            'position_id'=> $positionData1->id,
            'descriptions' => 'HAHAHAHAHAHAH',
            'is_married' => false,
        ];
        $workerData5 =[
            'name'=> 'Semyon',
            'surname' => 'Kuzbas',
            'email' => 'sm@gl.ru',
            'age' => '43',
            'position_id'=> $positionData2->id,
            'descriptions' => 'HAHAHAHAHAHAH',
            'is_married' => false,
        ];
        $workerData6 =[
            'name'=> 'Grisha',
            'surname' => 'vasnicov',
            'email' => 'gr@gl.ru',
            'age' => '35',
            'position_id'=> $positionData1->id,
            'descriptions' => 'HAHAHAHAHAHAH',
            'is_married' => true,
        ];

        $worker = Worker::create($workerData);
        $worker1 = Worker::create($workerData1);
        $worker2 = Worker::create($workerData2);
        $worker3 = Worker::create($workerData3);
        $worker4 = Worker::create($workerData4);
        $worker5 = Worker::create($workerData5);
        $worker6 = Worker::create($workerData6);


        $profileData = [
            'city'=> 'Moscow',
            'skill'=> 'Coder',
            'experience'=> 5,
            'finish_study_at'=> '2020-06-01',
        ];
        $profileData1 = [
            'city'=> 'Ekb',
            'skill'=> 'Boss',
            'experience'=> 2,
            'finish_study_at'=> '2021-06-01',
        ];
        $profileData2 = [
            'city'=> 'Perm',
            'skill'=> 'Manager',
            'experience'=> 7,
            'finish_study_at'=> '2019-06-01',
        ];
        $profileData3 = [
            'city'=> 'Suzdal',
            'skill'=> 'backend',
            'experience'=> 3,
            'finish_study_at'=> '2015-06-01',
        ];
        $profileData4 = [
            'city'=> 'Spb',
            'skill'=> 'frontend',
            'experience'=> 8,
            'finish_study_at'=> '2017-06-01',
        ];
        $profileData5 = [
            'city'=> 'Chelyabinsk',
            'skill'=> 'Manager',
            'experience'=> 2,
            'finish_study_at'=> '2011-06-01',
        ];
        $profileData6 = [
            'city'=> 'Perm',
            'skill'=> 'Manager',
            'experience'=> 7,
            'finish_study_at'=> '2018-06-01',
        ];

        $worker->profile()->create($profileData);
        $worker1->profile()->create($profileData1);
        $worker2->profile()->create($profileData2);
        $worker3->profile()->create($profileData3);
        $worker4->profile()->create($profileData4);
        $worker5->profile()->create($profileData5);
        $worker6->profile()->create($profileData6);

    }

    private function prepareManyToMany() {
        $workerManager = Worker::find(2);
        $workerBackend = Worker::find(1);

        $workerDesigner1 = Worker::find(5);
        $workerDesigner2 = Worker::find(6);
        $workerFrontEnd1 = Worker::find(4);
        $workerFrontEnd2 = Worker::find(3);

        $project1 = Project::create([
            'title' => 'Shop'
        ]);

        $project2 = Project::create([
            'title' => 'Blog'
        ]);

        $project1->workers()->attach([
            $workerDesigner1->id,
            $workerDesigner2->id,
            $workerFrontEnd1->id,
            $workerBackend->id,
        ]);

        $project2->workers()->attach([
            $workerManager->id,
            $workerDesigner2->id,
            $workerFrontEnd1->id,
            $workerFrontEnd2->id,
        ]);
    }
}
