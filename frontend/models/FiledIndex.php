<?php

namespace frontend\models;


use yii;
use yii\base\Model;
use common\models\User;

/**
 * This is the model class for table "filed_index".
 *
 * @property integer $filed_id
 * @property string $filed_name
 * @property string $filed-default

 * @property string $filed_where
 * @property string $filed_rule
 * @property string $filed_small
 * @property string $filed_big
 */
class FiledIndex  extends Model
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filedindex';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filed_name', 'filed-default', 'filed-type', 'filed_where', 'filed_rule', 'filed_small', 'filed_big'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */

    public function attributeLabels()
    {
        return [
            'filed_id' => 'Filed ID',
            'filed_name' => 'Filed Name',
            'filed-default' => 'Filed Default',
            'filed-type' => 'Filed Type',
            'filed_where' => 'Filed Where',
            'filed_rule' => 'Filed Rule',
            'filed_small' => 'Filed Small',
            'filed_big' => 'Filed Big',
        ];
    }
    //添加
    public function test($inut)
    {
               $data['filed_name'] = $inut['filed-name'];
               $data['filed_default'] = $inut['filed-default'];
               $data['filed_type'] = $inut['filed-type'];
               $data['filed_rule'] = $inut['filed_rule'];
               $data['filed_small'] = $inut['filed_small'];
               $data['filed_big'] = $inut['filed_big'];
                 return  Yii::$app->db->createCommand()->insert(self::tableName(),$data)->execute();

    }
    //展示
    public   function  show(){
        $sql = "select * from filedindex";
        return  Yii::$app->db->createCommand($sql)->queryAll();

    }
    //删除
    public  function dell($id){
       return  Yii::$app->db->createCommand()->delete(self::tableName(),'filed_id='.$id)->execute();
    }
    //修改
    public  function update($id){
        $sql = "select * from filedindex where filed_id=".$id;
        return  Yii::$app->db->createCommand($sql)->queryAll();
    }
    //修改
    public  function updates($inut){
         $filed_name= $inut['filed-name'];
         $filed_default= $inut['filed-default'];
         $filed_type= $inut['filed-type'];
         $filed_rule= $inut['filed_rule'];
         $filed_small= $inut['filed_small'];
         $filed_big= $inut['filed_big'];
         $filed_id= $inut['filed_id'];
        return  Yii::$app->db->createCommand()->update('filedindex',['filed_name'=>$filed_name,'filed_default'=>$filed_default,'filed_type'=>$filed_type,'filed_rule'=> $filed_rule,'filed_small'=>$filed_small,'filed_big'=> $filed_big],'filed_id='.$filed_id)->execute();
    }
}