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

namespace Gs2\Auth\Control;

/**
 * @author Game Server Services, Inc.
 */
class CreateTimeOnetimeTokenResult {

	/** @var string アクセストークン */
	private $token;

	/** @var int アクセストークンの有効期限 */
	private $expire;

    public function __construct(array $array)
    {
        if(isset($array['token'])) {
            $this->token = $array['token'];
        }
        if(isset($array['expire'])) {
            $this->expire = $array['expire'];
        }
    }

	/**
	 * アクセストークンを取得
	 *
	 * @return string アクセストークン
	 */
	public function getToken() {
		return $this->token;
	}

	/**
	 * アクセストークンを設定
	 *
	 * @param string $token アクセストークン
	 */
	public function setToken($token) {
		$this->token = $token;
	}

	/**
	 * アクセストークンの有効期限を取得
	 *
	 * @return int アクセストークンの有効期限
	 */
	public function getExpire() {
		return $this->expire;
	}

	/**
	 * アクセストークンの有効期限を設定
	 *
	 * @param int $expire アクセストークンの有効期限
	 */
	public function setExpire($expire) {
		$this->expire = $expire;
	}
}