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

namespace Gs2\Stamina\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class GetStaminaPoolStatusRequest extends Gs2BasicRequest {

    const FUNCTION = "GetStaminaPoolStatus";

	/** @var string スタミナプールの名前を指定します。 */
	private $staminaPoolName;


	/**
	 * スタミナプールの名前を指定します。を取得
	 *
	 * @return string スタミナプールの名前を指定します。
	 */
	public function getStaminaPoolName() {
		return $this->staminaPoolName;
	}

	/**
	 * スタミナプールの名前を指定します。を設定
	 *
	 * @param string $staminaPoolName スタミナプールの名前を指定します。
	 */
	public function setStaminaPoolName($staminaPoolName) {
		$this->staminaPoolName = $staminaPoolName;
	}

	/**
	 * スタミナプールの名前を指定します。を設定
	 *
	 * @param string $staminaPoolName スタミナプールの名前を指定します。
	 * @return GetStaminaPoolStatusRequest
	 */
	public function withStaminaPoolName($staminaPoolName): GetStaminaPoolStatusRequest {
		$this->setStaminaPoolName($staminaPoolName);
		return $this;
	}

}