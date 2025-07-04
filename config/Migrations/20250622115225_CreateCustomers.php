<?php
declare(strict_types=1);

use  Phinx\Migration\AbstractMigration;

class CreateCustomers extends AbstractMigration
{
    protected $config;
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     * @return void
     */
    public function up(): void
    {
        $table = $this->table('customers', [
            'id' => false,
            'primary_key' => 'customer_id',
            'collation' => 'utf8mb4_general_ci',
            'engine' => 'InnoDB',
            'comment' => '顧客ID',
        ]);
        $table->addColumn('customer_id', 'string', [
            'default' => null,
            'limit' => 5,
            'null' => false,
            'comment' => '店舗名'
        ]);
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false,
            'comment' => '顧客名'
        ]);
        $table->addColumn('bookstore_name', 'string', [
            'default' => null,
            'null' => false,
            'comment' => '店舗名'

        ]);
        $table->addColumn('phone_number', 'string', [
            'default' => null,
            'limit' => 14,
            'null' => false,
            'comment'=> '電話番号'
        ]);
        $table->addColumn('contact_person', 'string', [
            'default' => null,
            'limit' => 15,
            'null' => true,
            'comment'=> '担当者名'
        ]);
        $table->addColumn('remark', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
            'comment' => '備考'
        ]);
        $table->addIndex(['customer_id'], ['unique' => true]);
        $table->create();
        //テストデータの追加
        //テストデータの追加
        $rows = [
            ['customer_id' => '00001', 'Name' => '田中太郎', 'bookstore_name' => 'A店', 'Phone_Number' => '09012345678', 'Contact_Person' => '田中次郎'],
            ['customer_id' => '00002', 'Name' => '佐藤花子', 'bookstore_name' => 'B店', 'Phone_Number' => '08023456789', 'Contact_Person' => '佐藤一郎'],
            ['customer_id' => '00003', 'Name' => '鈴木一郎', 'bookstore_name' => 'A店', 'Phone_Number' => '07034567890', 'Contact_Person' => '鈴木花子'],
            ['customer_id' => '00004', 'Name' => '高橋健', 'bookstore_name' => 'C店', 'Phone_Number' => '09045678901', 'Contact_Person' => '高橋美咲'],
            ['customer_id' => '00005', 'Name' => '伊藤真', 'bookstore_name' => 'B店', 'Phone_Number' => '08056789012', 'Contact_Person' => '伊藤優子'],
            ['customer_id' => '00006', 'Name' => '渡辺彩', 'bookstore_name' => 'A店', 'Phone_Number' => '07067890123', 'Contact_Person' => '渡辺健'],
            ['customer_id' => '00007', 'Name' => '山本翔', 'bookstore_name' => 'C店', 'Phone_Number' => '09078901234', 'Contact_Person' => '山本花' ],
            ['customer_id' => '00008', 'Name' => '中村優', 'bookstore_name' => 'A店', 'Phone_Number' => '08089012345', 'Contact_Person' => '中村誠'],
            ['customer_id' => '00009', 'Name' => '小林誠', 'bookstore_name' => 'C店', 'Phone_Number' => '07090123456', 'Contact_Person' => '小林美香'],
            ['customer_id' => '00010', 'Name' => '加藤美咲', 'bookstore_name' => 'B店', 'Phone_Number' => '09001234567', 'Contact_Person' => '加藤健'],
            ['customer_id' => '00011', 'Name' => '吉田直樹', 'bookstore_name' => 'A店', 'Phone_Number' => '08012345670', 'Contact_Person' => '吉田花子'],
            ['customer_id' => '00012', 'Name' => '山田涼', 'bookstore_name' => 'C店', 'Phone_Number' => '07023456781', 'Contact_Person' => '山田誠'],
            ['customer_id' => '00013', 'Name' => '松本光', 'bookstore_name' => 'B店', 'Phone_Number' => '09034567892', 'Contact_Person' => '松本花'],
            ['customer_id' => '00014', 'Name' => '井上舞', 'bookstore_name' => 'B店', 'Phone_Number' => '08045678903', 'Contact_Person' => '井上健'],
            ['customer_id' => '00015', 'Name' => '木村拓', 'bookstore_name' => 'B店', 'Phone_Number' => '07056789014', 'Contact_Person' => '木村花子'],
            ['customer_id' => '00016', 'Name' => '林優子', 'bookstore_name' => 'A店', 'Phone_Number' => '09067890125', 'Contact_Person' => '林誠' ],
            ['customer_id' => '00017', 'Name' => '清水健', 'bookstore_name' => 'C店', 'Phone_Number' => '08078901236', 'Contact_Person' => '清水花'],
            ['customer_id' => '00018', 'Name' => '斎藤光', 'bookstore_name' => 'A店', 'Phone_Number' => '07089012347', 'Contact_Person' => '斎藤健'],
            ['customer_id' => '00019', 'Name' => '森田花子', 'bookstore_name' => 'C店', 'Phone_Number' => '09090123458', 'Contact_Person' => '森田誠'],
        ];
        $this->table('customers')->insert($rows)->saveData();
    }

    public function down(): void
    {
        $this->table('customers')->drop()->save();
    }
}
