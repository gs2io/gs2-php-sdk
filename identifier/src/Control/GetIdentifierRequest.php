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

namespace Gs2\Identifier\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class GetIdentifierRequest extends Gs2BasicRequest {

    const FUNCTION = "GetIdentifier";

	/** @var string ユーザの名前 */
	private $userName;

	/** @var string GSIのGRN */
	private $identifierId;


	/**
	 * ユーザの名前を取得
	 *
	 * @return string ユーザの名前
	 */
	public function getUserName() {
		return $this->userName;
	}

	/**
	 * ユーザの名前を設定
	 *
	 * @param string $userName ユーザの名前
	 */
	public function setUserName($userName) {
		$this->userName = $userName;
	}

	/**
	 * ユーザの名前を設定
	 *
	 * @param string $userName ユーザの名前
	 * @return GetIdentifierRequest
	 */
	public function withUserName($userName): GetIdentifierRequest {
		$this->setUserName($userName);
		return $this;
	}

	/**
	 * GSIのGRNを取得
	 *
	 * @return string GSIのGRN
	 */
	public function getIdentifierId() {
		return $this->identifierId;
	}

	/**
	 * GSIのGRNを設定
	 *
	 * @param string $identifierId GSIのGRN
	 */
	public function setIdentifierId($identifierId) {
		$this->identifierId = $identifierId;
	}

	/**
	 * GSIのGRNを設定
	 *
	 * @param string $identifierId GSIのGRN
	 * @return GetIdentifierRequest
	 */
	public function withIdentifierId($identifierId): GetIdentifierRequest {
		$this->setIdentifierId($identifierId);
		return $this;
	}

}