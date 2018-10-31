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

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class CreateOnceOnetimeTokenRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateOnceOnetimeToken";

	/** @var string 認可処理に実行するスクリプト */
	private $scriptName;

	/** @var string 認可するアクション */
	private $grant;

	/** @var string grant で指定したアクションに引数として渡すことを許可する内容 */
	private $args;


	/**
	 * 認可処理に実行するスクリプトを取得
	 *
	 * @return string 認可処理に実行するスクリプト
	 */
	public function getScriptName() {
		return $this->scriptName;
	}

	/**
	 * 認可処理に実行するスクリプトを設定
	 *
	 * @param string $scriptName 認可処理に実行するスクリプト
	 */
	public function setScriptName($scriptName) {
		$this->scriptName = $scriptName;
	}

	/**
	 * 認可処理に実行するスクリプトを設定
	 *
	 * @param string $scriptName 認可処理に実行するスクリプト
	 * @return CreateOnceOnetimeTokenRequest
	 */
	public function withScriptName($scriptName): CreateOnceOnetimeTokenRequest {
		$this->setScriptName($scriptName);
		return $this;
	}

	/**
	 * 認可するアクションを取得
	 *
	 * @return string 認可するアクション
	 */
	public function getGrant() {
		return $this->grant;
	}

	/**
	 * 認可するアクションを設定
	 *
	 * @param string $grant 認可するアクション
	 */
	public function setGrant($grant) {
		$this->grant = $grant;
	}

	/**
	 * 認可するアクションを設定
	 *
	 * @param string $grant 認可するアクション
	 * @return CreateOnceOnetimeTokenRequest
	 */
	public function withGrant($grant): CreateOnceOnetimeTokenRequest {
		$this->setGrant($grant);
		return $this;
	}

	/**
	 * grant で指定したアクションに引数として渡すことを許可する内容を取得
	 *
	 * @return string grant で指定したアクションに引数として渡すことを許可する内容
	 */
	public function getArgs() {
		return $this->args;
	}

	/**
	 * grant で指定したアクションに引数として渡すことを許可する内容を設定
	 *
	 * @param string $args grant で指定したアクションに引数として渡すことを許可する内容
	 */
	public function setArgs($args) {
		$this->args = $args;
	}

	/**
	 * grant で指定したアクションに引数として渡すことを許可する内容を設定
	 *
	 * @param string $args grant で指定したアクションに引数として渡すことを許可する内容
	 * @return CreateOnceOnetimeTokenRequest
	 */
	public function withArgs($args): CreateOnceOnetimeTokenRequest {
		$this->setArgs($args);
		return $this;
	}

}