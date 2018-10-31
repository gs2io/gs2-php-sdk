<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */
namespace Gs2\Core\Model;

use Gs2\Core\Util\SignUtil;

/**
 * ワンタイムトークンによる認証。
 * 
 * @author Game Server Services, Inc.
 *
 */
class OnetimeTokenGs2Credential implements IGs2Credential {

    /**
     * クライアントID
     * @var string
     */
    private $clientId;

    /**
     * クライアントシークレット
     * @var string
     */
    private $clientSecret;

    /**
     * ワンタイムトークン
     * @var string
     */
	private $token;
	
	/**
	 * コンストラクタ。
	 *
     * @param string $clientId クライアントID
     * @param string $clientSecret クライアントシークレット
	 * @param string $token ワンタイムトークン
	 */
	function __construct(string $clientId, string $clientSecret, string $token) {
		if($token == null) {
			throw new \InvalidArgumentException("invalid credential");
		}
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
		$this->token = $token;
	}

    /**
     * クライアントIDを取得。
     *
     * @return string クライアントID
     */
    function getClientId(): string {
        return $this->clientId;
    }

    /**
     * クライアントシークレットを取得。
     *
     * @return string クライアントシークレット
     */
    function getClientSecret(): string {
        return $this->clientSecret;
    }

	/**
	 * ワンタイムトークンを取得。
	 * 
	 * @return string ワンタイムトークン
	 */
	function getToken(): string {
		return $this->token;
	}

	function authorized(array& $header, string $service, string $module, string $function, int $timestamp): void {
        $sign = base64_encode(SignUtil::sign($this->getClientSecret(), $module, $function, $timestamp));
        $header["X-GS2-CLIENT-ID"] =  $this->getClientId();
        $header["X-GS2-REQUEST-TIMESTAMP"] = $timestamp;
        $header["X-GS2-REQUEST-SIGN"] = $sign;
        $header["X-GS2-ONETIME-TOKEN"] = $this->token;
	}
}
