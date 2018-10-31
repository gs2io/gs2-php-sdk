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

namespace Gs2\Level\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class ChangeLevelCapByUserIdRequest extends Gs2BasicRequest {

    const FUNCTION = "ChangeLevelCapByUserId";

	/** @var string リソースプール */
	private $resourcePoolName;

	/** @var string ステータスID */
	private $statusId;

	/** @var string ステータス */
	private $userId;

	/** @var int 新しいレベルキャップ */
	private $levelCap;


	/**
	 * リソースプールを取得
	 *
	 * @return string リソースプール
	 */
	public function getResourcePoolName() {
		return $this->resourcePoolName;
	}

	/**
	 * リソースプールを設定
	 *
	 * @param string $resourcePoolName リソースプール
	 */
	public function setResourcePoolName($resourcePoolName) {
		$this->resourcePoolName = $resourcePoolName;
	}

	/**
	 * リソースプールを設定
	 *
	 * @param string $resourcePoolName リソースプール
	 * @return ChangeLevelCapByUserIdRequest
	 */
	public function withResourcePoolName($resourcePoolName): ChangeLevelCapByUserIdRequest {
		$this->setResourcePoolName($resourcePoolName);
		return $this;
	}

	/**
	 * ステータスIDを取得
	 *
	 * @return string ステータスID
	 */
	public function getStatusId() {
		return $this->statusId;
	}

	/**
	 * ステータスIDを設定
	 *
	 * @param string $statusId ステータスID
	 */
	public function setStatusId($statusId) {
		$this->statusId = $statusId;
	}

	/**
	 * ステータスIDを設定
	 *
	 * @param string $statusId ステータスID
	 * @return ChangeLevelCapByUserIdRequest
	 */
	public function withStatusId($statusId): ChangeLevelCapByUserIdRequest {
		$this->setStatusId($statusId);
		return $this;
	}

	/**
	 * ステータスを取得
	 *
	 * @return string ステータス
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * ステータスを設定
	 *
	 * @param string $userId ステータス
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * ステータスを設定
	 *
	 * @param string $userId ステータス
	 * @return ChangeLevelCapByUserIdRequest
	 */
	public function withUserId($userId): ChangeLevelCapByUserIdRequest {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * 新しいレベルキャップを取得
	 *
	 * @return int 新しいレベルキャップ
	 */
	public function getLevelCap() {
		return $this->levelCap;
	}

	/**
	 * 新しいレベルキャップを設定
	 *
	 * @param int $levelCap 新しいレベルキャップ
	 */
	public function setLevelCap($levelCap) {
		$this->levelCap = $levelCap;
	}

	/**
	 * 新しいレベルキャップを設定
	 *
	 * @param int $levelCap 新しいレベルキャップ
	 * @return ChangeLevelCapByUserIdRequest
	 */
	public function withLevelCap($levelCap): ChangeLevelCapByUserIdRequest {
		$this->setLevelCap($levelCap);
		return $this;
	}

}