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

use InvalidArgumentException;

/**
 * アクセスキーによる認証。
 * 
 * @author Game Server Services, Inc.
 *
 */
class BasicGs2Credential implements IGs2Credential {
	
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
     * クライアントシークレット
     * @var string
     */
    private $projectToken;

    /**
	 * コンストラクタ。
	 * 
	 * @param string $clientId クライアントID
	 * @param string $clientSecret クライアントシークレット
	 */
	public function __construct(string $clientId, string $clientSecret) {
		if($clientId == null || $clientSecret == null) {
			throw new InvalidArgumentException("invalid credential");
		}
		$this->clientId = $clientId;
		$this->clientSecret = $clientSecret;
	}

	/**
	 * クライアントIDを取得。
	 * 
	 * @return string クライアントID
	 */
	public function getClientId(): string {
		return $this->clientId;
	}
	
	/**
	 * クライアントシークレットを取得。
	 * 
	 * @return string クライアントシークレット
	 */
	public function getClientSecret(): string {
		return $this->clientSecret;
	}

    /**
     * プロジェクトトークンを取得。
     *
     * @return string プロジェクトトークン
     */
    public function getProjectToken() {
		return $this->projectToken;
	}

    /**
     * プロジェクトトークンを設定。
     * @param string $projectToken プロジェクトトークン
     */
    public function setProjectToken(string $projectToken) {
		$this->projectToken = $projectToken;
	}
}
