<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCredentialsTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER tr_User_Credentials AFTER INSERT ON user_details FOR EACH ROW
            BEGIN
                INSERT INTO user_credentials (username, password, user_detail_id, created_at, updated_at) VALUES(NEW.phone_number, NEW.password, NEW.user_detail_id, NOW(), NOW());
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
