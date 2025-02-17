<?php
namespace common\components;

class MyHelpers
{
    public static function hello($name) {
        return "Hello $name";
    }

    public function getImageDecode()
    {
        $imageEx = explode('/',$this->image);
        $nameImage = array_pop($imageEx);
        $nameImage = urlencode($nameImage);
        $linkFolder =implode("/",$imageEx);

        return $linkFolder. '/'.$nameImage;
    }

    public static function buildDeepPrefix(&$data,$parent_id = 0,$level = 0,$prefix = '↵')
    {

        foreach ($data as $key => $item) {
            if ($item['parent_id'] == $parent_id) {
                $data[$key]['name'] = str_repeat($prefix,$level).' '.$item['name'];
                $level = $level + 1;
                self::buildDeepPrefix($data,$item['id'] ,$level,$prefix = '↵');
                $level = 0;
            }
        }
    }

    /**
     * @return array|false|string
     * Lấy địa chỉ ip
     */
    public static function getClientIp() {
        switch(true){
            case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            default : return $_SERVER['REMOTE_ADDR'];
        }
    }

    /**
     * @param $url
     * @return bool|mixed
     */
    public static function getYoutubeIdFromUrl($url) {
        $parts = parse_url($url);
        if(isset($parts['query'])){
            parse_str($parts['query'], $qs);
            if(isset($qs['v'])){
                return $qs['v'];
            }else if(isset($qs['vi'])){
                return $qs['vi'];
            }
        }
        if(isset($parts['path'])){
            $path = explode('/', trim($parts['path'], '/'));
            return $path[count($path)-1];
        }
        return false;
    }

    public static function getDayOfWeekInVietnamese($timestamp = 0) {
        // Lấy thứ trong tuần dưới dạng số (0: Chủ nhật, 1: Thứ hai, ..., 6: Thứ bảy)
        $timestamp = empty($timestamp) ? time() : $timestamp;
        $dayOfWeekNumber = date('w', $timestamp );
    
        // Mảng chứa thứ trong tuần bằng tiếng Việt
        $daysOfWeek = [
            0 => 'Chủ nhật',
            1 => 'Thứ 2',
            2 => 'Thứ 3',
            3 => 'Thứ 4',
            4 => 'Thứ 5',
            5 => 'Thứ 6',
            6 => 'Thứ 7'
        ];
    
        // Trả về thứ tương ứng
        return $daysOfWeek[$dayOfWeekNumber];
    }
}