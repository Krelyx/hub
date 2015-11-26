<?php $this->ScatterChartjs->createChart([
                    'Chart' => [
                        'id' => 'myScatterChart'
                    ],
                    'Data' => $dataChart,
                    'Options' => [
                        'scaleShowGridLines' => true,
                        'bezierCurve' => true,
                        'showTooltips' => true,
                        'scaleShowHorizontalLines' => true,
                        'scaleShowLabels' => true,
                        'scaleType' => "date",
                        'scaleLabel' => '<%=value%>'.$symbol,
                        'scaleDateTimeFormat' => " d mmm , yyyy, hh:MM",
                        'responsive' => false
                    ]
                ]);
                