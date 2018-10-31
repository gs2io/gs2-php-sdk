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
class GetGatheringRequest extends Gs2BasicRequest {

    const FUNCTION = "GetGathering";

	/** @var string ギャザリングプールの名前を指定します。 */
	private $gatheringPoolName;

	/** @var string ギャザリングの名前を指定します。 */
	private $gatheringName;


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
	 * @return GetGatheringRequest
	 */
	public function withGatheringPoolName($gatheringPoolName): GetGatheringRequest {
		$this->setGatheringPoolName($gatheringPoolName);
		return $this;
	}

	/**
	 * ギャザリングの名前を指定します。を取得
	 *
	 * @return string ギャザリングの名前を指定します。
	 */
	public function getGatheringName() {
		return $this->gatheringName;
	}

	/**
	 * ギャザリングの名前を指定します。を設定
	 *
	 * @param string $gatheringName ギャザリングの名前を指定します。
	 */
	public function setGatheringName($gatheringName) {
		$this->gatheringName = $gatheringName;
	}

	/**
	 * ギャザリングの名前を指定します。を設定
	 *
	 * @param string $gatheringName ギャザリングの名前を指定します。
	 * @return GetGatheringRequest
	 */
	public function withGatheringName($gatheringName): GetGatheringRequest {
		$this->setGatheringName($gatheringName);
		return $this;
	}

}