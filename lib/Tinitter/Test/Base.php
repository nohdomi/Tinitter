<?php
namespace Tinitter\Test;
class Base extends \PHPUnit_Framework_TestCase
{
    #use \Uzulla\MockSlimClient; // traitを利用

    /**
     * \Uzulla\MockSlimClientで呼び出される
     * @param \Slim\Slim $app
     */
    static function registrationRoute(\Slim\Slim $app)
    {
        \Tinitter\Route::registration($app);
    }

    /**
     * \Uzulla\MockSlimClientで呼び出される
     * @return \Slim\Slim
     */
    static function createSlim()
    {
        return new \Slim\Slim(array(
            'templates.path' => TEMPLATES_DIR_PATH,
            'view' => new \Slim\Views\Twig()
        ));
    }

    /**
     * テストケース開始の度に呼び出される
     */
    protected function setUp()
    {
        // テスト用DBを初期化する
        $schema_sql = file_get_contents(TEST_SCHEMA_SQL);
        \Illuminate\Database\Capsule\Manager::connection()
            ->getPdo()->exec($schema_sql);
    }
}
