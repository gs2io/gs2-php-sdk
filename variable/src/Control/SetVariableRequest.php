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

namespace Gs2\Variable\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class SetVariableRequest extends Gs2BasicRequest {

    const FUNCTION = "SetVariable";

	/** @var string 変数のスコープとなるユーザID */
	private $userId;

	/** @var string 変数名 */
	private $variableName;

	/** @var string 値 */
	private $value;

	/** @var int 変数の有効期間(秒) */
	private $ttl;


	/**
	 * 変数のスコープとなるユーザIDを取得
	 *
	 * @return string 変数のスコープとなるユーザID
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * 変数のスコープとなるユーザIDを設定
	 *
	 * @param string $userId 変数のスコープとなるユーザID
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * 変数のスコープとなるユーザIDを設定
	 *
	 * @param string $userId 変数のスコープとなるユーザID
	 * @return SetVariableRequest
	 */
	public function withUserId($userId): SetVariableRequest {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * 変数名を取得
	 *
	 * @return string 変数名
	 */
	public function getVariableName() {
		return $this->variableName;
	}

	/**
	 * 変数名を設定
	 *
	 * @param string $variableName 変数名
	 */
	public function setVariableName($variableName) {
		$this->variableName = $variableName;
	}

	/**
	 * 変数名を設定
	 *
	 * @param string $variableName 変数名
	 * @return SetVariableRequest
	 */
	public function withVariableName($variableName): SetVariableRequest {
		$this->setVariableName($variableName);
		return $this;
	}

	/**
	 * 値を取得
	 *
	 * @return string 値
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * 値を設定
	 *
	 * @param string $value 値
	 */
	public function setValue($value) {
		$this->value = $value;
	}

	/**
	 * 値を設定
	 *
	 * @param string $value 値
	 * @return SetVariableRequest
	 */
	public function withValue($value): SetVariableRequest {
		$this->setValue($value);
		return $this;
	}

	/**
	 * 変数の有効期間(秒)を取得
	 *
	 * @return int 変数の有効期間(秒)
	 */
	public function getTtl() {
		return $this->ttl;
	}

	/**
	 * 変数の有効期間(秒)を設定
	 *
	 * @param int $ttl 変数の有効期間(秒)
	 */
	public function setTtl($ttl) {
		$this->ttl = $ttl;
	}

	/**
	 * 変数の有効期間(秒)を設定
	 *
	 * @param int $ttl 変数の有効期間(秒)
	 * @return SetVariableRequest
	 */
	public function withTtl($ttl): SetVariableRequest {
		$this->setTtl($ttl);
		return $this;
	}

}