<?php

namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Chart cell
 */
class ChartCell extends Cell {

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display($id) {
        $this->loadModel('SensorDatas');
        $this->loadModel('Sensors');
        $sensor = $this->Sensors->get($id, [
            'contain' => ['Nodes', 'DataTypes']
        ]);

        $sensordatas = $this->SensorDatas->find()
                ->where(['sensor_id =' => $id])
                ->toArray();

        foreach ($sensordatas as $key => $sensordata) {
            $datachart[$key] = '{x : new Date (\''.$sensordata->created->format('c').'\'), y : '.$sensordata->value.'}';
            $tmp = $sensordata->value - 2 ;
            $datachart2[$key] = '{x : new Date (\''.$sensordata->created->format('c').'\'), y : '.$tmp.'}';
        }
       
        $dataChart = [
            [
                'data' => $datachart,
                'dataoptions' => [
                    'label' => 'Température',
                    'strokeColor' => '#A31515'
                ]
            ],
            [
                'data' => $datachart2,
                'dataoptions' => [
                    'label' => 'Température'
                ]
            ]
        ];
        $this->set('dataChart', $dataChart);

        $symbol = $this->Sensors->DataTypes->find()
                ->select('symbol')
                ->where(['id = ' => $sensor['data_type_id']])
                ->first();
        $symbol = $symbol['symbol'];
        $this->set('symbol', $symbol);
    }

}
