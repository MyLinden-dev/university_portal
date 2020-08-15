<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 08.01.2019
 * Time: 20:28
 */

namespace frontend\models;

use Yii;
use yii\base\Model;

class News extends Model
{

    public function getCategories(){
        $sql = "SELECT * FROM n_category";
        $command = Yii::$app->db->createCommand($sql);

        return $command->queryAll();
    }

    public function getCategory($category_id){
        $params = [ ':id_category' => (int)$category_id];
        $sql = "SELECT DISTINCT * FROM n_category WHERE id_category = :id_category";
        $command = Yii::$app->db->createCommand($sql)
            ->bindValues($params);

        return $command->queryOne();
    }

    public function getNewsByCategoryId($category_id){
        $params = [ ':id_category' => (int)$category_id];
        $sql = "SELECT * FROM view_n_news_actual  WHERE id_category = :id_category";
        $command = Yii::$app->db->createCommand($sql)
            ->bindValues($params);

        return $command->queryAll();
    }

    public function getNews($data = array()){
        //$sql = "SELECT n.*, c.id_category, s.text, i.* FROM view_n_news_actual AS n LEFT JOIN n_category AS c ON (n.id_category = c.id_category) LEFT JOIN n_section AS s ON(n.id_news = s.id_news) LEFT JOIN n_section_image AS si ON (s.id_section = si.id_section) LEFT JOIN n_image AS i ON (si.id_image = i.id_image) WHERE n.actual = true AND s.is_hidden = false ";

        $newsSQL = "SELECT n.* FROM view_n_news_actual AS n  WHERE n.actual = true";
        $sectionSQL = "SELECT s.* FROM  n_section AS s WHERE s.id_news = :id_news AND s.is_hidden = false";
        $imagesSQL = "SELECT si.*, i.* FROM  n_section_image AS si LEFT JOIN n_image as i ON (si.id_image = i.id_image) WHERE si.id_section = :id_section";

        $params = array();
        if (!empty($data['filter_category_id'])) {
            $params[':id_category'] = (int)$data['filter_category_id'];
            $newsSQL .= " AND n.id_category = :id_category";
        }

        $command = Yii::$app->db->createCommand($newsSQL);
        if(!empty($params)){
            $command->bindValues($params);
        }

        $news = $command->queryAll();

        foreach ($news as &$item){
            $item['sections'] = Yii::$app->db->createCommand( $sectionSQL)
                             ->bindValue(":id_news" , (int)$item['id_news'])->queryAll();
        } unset($item);

        foreach ($news as &$item){
            foreach ($item['sections'] as &$section){
                $section['images'] =  Yii::$app->db->createCommand( $imagesSQL)
                            ->bindValue(":id_section" , (int)$section['id_section'])->queryAll();
            } unset($section);
        } unset($item);

        return $news;
    }

    public function getNewsById($id){
        $sql = "SELECT n.* FROM view_n_news_actual AS n  WHERE n.actual = true AND id_news = :id";
        $sectionSQL = "SELECT s.* FROM  n_section AS s WHERE s.id_news = :id_news";

        $command = Yii::$app->db->createCommand($sql)->bindValue('id', (int)$id);

        $newsItem = $command->queryOne();

        if($newsItem){
            $newsItem['sections'] = Yii::$app->db->createCommand( $sectionSQL)->bindValue(":id_news" , (int)$newsItem['id_news'])->queryAll();
            return $newsItem;
        }
        return false;
    }

    public function getNewsForSlider(){
        $sql = "SELECT n.* FROM n_news AS n WHERE is_on_slider = true";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }
}