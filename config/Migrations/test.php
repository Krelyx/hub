<?php
use Phinx\Migration\AbstractMigration;
class Initial extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('sensor_datas');
        $table
            ->addColumn('sender', 'tynint unsigned', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('type', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('value','float', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();
        $this->execute(
            "INSERT INTO `cocktails` VALUES " .
            "('1', '10', 'temperature', '19.5', '2015-04-10 15:56:23', null)," .
            "('2', '23', 'humidity', '40', '2015-04-10 15:59:39', null)," .
            "('3', '10', 'temperature', '20', '2015-04-11 09:52:01', null)," .

        );
    }
    public function down()
    {
        $this->dropTable('sensor_datas');
    }
}
