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

namespace Gs2\Realtime\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class UpdateGatheringPoolRequest extends Gs2BasicRequest {

    const FUNCTION = "UpdateGatheringPool";

	/** @var string ギャザリングプールの名前を指定します。 */
	private $gatheringPoolName;

	/** @var string ギャザリングプールの説明 */
	private $description;


	/**
	 * ギャザリングプールの名前を指定します。を取得
	 *
	 * @return string ギャザリングプールの名前を指定します。
	 */
	public function getGatheringPoolName() {
		return $this->gatheringPoolName;
	}

	/**
	 * ギャザリングプールの名前を指定します。を設定
	 *
	 * @param string $gatheringPoolName ギャザリングプールの名前を指定します。
	 */
	public function setGatheringPoolName($gatheringPoolName) {
		$this->gatheringPoolName = $gatheringPoolName;
	}

	/**
	 * ギャザリングプールの名前を指定します。を設定
	 *
	 * @param string $gatheringPoolName ギャザリングプールの名前を指定します。
	 * @return UpdateGatheringPoolRequest
	 */
	public function withGatheringPoolName($gatheringPoolName): UpdateGatheringPoolRequest {
		$this->setGatheringPoolName($gatheringPoolName);
		return $this;
	}

	/**
	 * ギャザリングプールの説明を取得
	 *
	 * @return string ギャザリングプールの説明
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * ギャザリングプールの説明を設定
	 *
	 * @param string $description ギャザリングプールの説明
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * ギャザリングプールの説明を設定
	 *
	 * @param string $description ギャザリングプールの説明
	 * @return UpdateGatheringPoolRequest
	 */
	public function withDescription($description): UpdateGatheringPoolRequest {
		$this->setDescription($description);
		return $this;
	}

}