<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{

  protected Str $str;
    protected int $campaignId;
    protected string $channelId;
    protected string $channelSecret;

    public function __construct(Str $str)
    {
        $this->str = $str;
        $this->channelId = 1660792496;//チャネルID
        // $this->channelSecret = env_cp_config('channel_secret');
    }


  public function lineLogin(Request $request)
    {
        return $this->redirectToLineAuthorizationUrl();
    }

    private function redirectToLineAuthorizationUrl()
    {
        // $authorizationUrl = Line::getAuthorizationUrl($this->scope);//  protected string $scope = 'openid';
        // Log::info('LINE Login authorization request', [$authorizationUrl]);

        $state = $this->str::random(40);
        session(['state' => $state]);

        $params = [
            'response_type' => 'code',
            'client_id' => $this->channelId,
            'redirect_uri' => route('auth.line_callback'),
            'state' => $state,
            'scope' => 'openid',
        ];
        $query = http_build_query($params, null, '&', PHP_QUERY_RFC3986);
        $authorizationUrl = config('const.line_login_url') . $query;

        return redirect()->to(route('messages.create'));
    }
  

}
