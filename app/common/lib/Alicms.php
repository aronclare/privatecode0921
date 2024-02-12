<?php
declare(strict_types = 1);
namespace app\common\lib;
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use think\facade\Cache;
class Alicms{
    public function index(string $phone):bool{
        if(empty($phone)){
            return false;
        }

        $code=rand(1000,9999);
        Cache::store('redis')->set($phone,$code,90);

        AlibabaCloud::accessKeyClient('LTAIU69S3KAZ2Tb2', 'S1GnOtEP4EGlcCFE3nVZ6TiT1b0l8t')
                        ->regionId('cn-hangzhou')
                        ->asDefaultClient();

        try {
            $result = AlibabaCloud::rpc()
                                ->product('Dysmsapi')
                                // ->scheme('https') // https | http
                                ->version('2017-05-25')
                                ->action('SendSms')
                                ->method('POST')
                                ->host('dysmsapi.aliyuncs.com')
                                ->options([
                                                'query' => [
                                                'RegionId' => "cn-hangzhou",
                                                'PhoneNumbers' => $phone,
                                                'SignName' => "点点商城",
                                                'TemplateCode' => "SMS_195720139",
                                                'TemplateParam' => "{\"code\":$code}",
                                                ],
                                            ])
                                ->request();
            //print_r($result->toArray());
            return true;
        } catch (ClientException $e) {
            //echo $e->getErrorMessage() . PHP_EOL;
            return false;
        } catch (ServerException $e) {
            //echo $e->getErrorMessage() . PHP_EOL;
            return false;
        }
    }
}