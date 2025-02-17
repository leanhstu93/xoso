<?php

namespace frontend\models;

use app\models\ConfigWebsite;
use Yii;

/**
 * This is the model class for table "sessions".
 *
 * @property int $id
 * @property string $idSession
 * @property string|null $username
 * @property string $ipAddress
 * @property int|null $idloai
 * @property int $lastVisit
 * @property int $session_start
 * @property string|null $userAgent
 */
class Sessions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sessions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idSession', 'ipAddress', 'lastVisit', 'session_start'], 'required'],
            [['idloai', 'lastVisit', 'session_start'], 'integer'],
            [['idSession', 'username'], 'string', 'max' => 100],
            [['ipAddress'], 'string', 'max' => 20],
            [['userAgent'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idSession' => 'Id Session',
            'username' => 'Username',
            'ipAddress' => 'Ip Address',
            'idloai' => 'Idloai',
            'lastVisit' => 'Last Visit',
            'session_start' => 'Session Start',
            'userAgent' => 'User Agent',
        ];
    }

    public static function analyticsVisit(){

        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $session = Yii::$app->session;
        $idSession = $session->id;

        $model = Sessions::find()->where(['idSession'=>$idSession])->one();
        if ($model != false ){ // người này có rồi, giờ request lại
            $model->lastVisit = time();
            $model->save();
            // $this->db->query($sql) or die($this->db->error." : " . $sql);
        } else { //người này chưa có, mới vào lần đầu
            $model = new Sessions;
            $model->idSession = $idSession;
            $model->userAgent = $userAgent;
            $model->lastVisit = time();
            $model->session_start = time();
            $model->ipAddress = $ipAddress;

            $model->save();


            $model = Company::find()->where(['id'=>1])->one();

            $model->count_visit = $model->count_visit+1;
            $model->save();
        }
        $time8Day = strtotime("-8 day");

        $sessionTime = 15; //thời gian lưu thông tin
        Sessions::deleteAll("lastVisit  <= $time8Day");

    }//luuthongtin
}
