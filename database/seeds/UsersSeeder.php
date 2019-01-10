<?php


use Phinx\Seed\AbstractSeed;

class UsersSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = [
            [
                'username' => 'Hengly Siev',
                'email' => 'henglysiev@gmail.com',
                'password' => password_hash('123456789', PASSWORD_BCRYPT),
                'position' => 'Developer',
                'phone' => '081976999',
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'Steven Rich',
                'email' => 'stevenrich@gmail.com',
                'password' => password_hash('123456789', PASSWORD_BCRYPT),
                'position' => 'System Engineering',
                'phone' => '081897999',
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];  

        $users = $this->table('users');
        $users->insert($data)->save();
    }
}
