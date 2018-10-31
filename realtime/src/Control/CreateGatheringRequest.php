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
class CreateGatheringRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateGathering";

	/** @var string ギャザリングプールの名前を指定します。 */
	private $gatheringPoolName;

	/** @var string ギャザリング名 */
	private $name;

	/** @var string[] ギャザリングへの参加を許可するユーザIDリスト */
	private $userIds;


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
	 * @return CreateGatheringRequest
	 */
	public function withGatheringPoolName($gatheringPoolName): CreateGatheringRequest {
		$this->setGatheringPoolName($gatheringPoolName);
		return $this;
	}

	/**
	 * ギャザリング名を取得
	 *
	 * @return string ギャザリング名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * ギャザリング名を設定
	 *
	 * @param string $name ギャザリング名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * ギャザリング名を設定
	 *
	 * @param string $name ギャザリング名
	 * @return CreateGatheringRequest
	 */
	public function withName($name): CreateGatheringRequest {
		$this->setName($name);
		return $this;
	}

	/**
	 * ギャザリングへの参加を許可するユーザIDリストを取得
	 *
	 * @return string[] ギャザリングへの参加を許可するユーザIDリスト
	 */
	public function getUserIds() {
		return $this->userIds;
	}

	/**
	 * ギャザリングへの参加を許可するユーザIDリストを設定
	 *
	 * @param string[] $userIds ギャザリングへの参加を許可するユーザIDリスト
	 */
	public function setUserIds($userIds) {
		$this->userIds = $userIds;
	}

	/**
	 * ギャザリングへの参加を許可するユーザIDリストを設定
	 *
	 * @param string[] $userIds ギャザリングへの参加を許可するユーザIDリスト
	 * @return CreateGatheringRequest
	 */
	public function withUserIds($userIds): CreateGatheringRequest {
		$this->setUserIds($userIds);
		return $this;
	}

}