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
class ChangeLevelCapByUserIdAndResourceTypeRequest extends Gs2BasicRequest {

    const FUNCTION = "ChangeLevelCapByUserId";

	/** @var string リソースプール */
	private $resourcePoolName;

	/** @var string リソースタイプ */
	private $resourceTypeName;

	/** @var string リソースID */
	private $resourceId;

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
	 * @return ChangeLevelCapByUserIdAndResourceTypeRequest
	 */
	public function withResourcePoolName($resourcePoolName): ChangeLevelCapByUserIdAndResourceTypeRequest {
		$this->setResourcePoolName($resourcePoolName);
		return $this;
	}

	/**
	 * リソースタイプを取得
	 *
	 * @return string リソースタイプ
	 */
	public function getResourceTypeName() {
		return $this->resourceTypeName;
	}

	/**
	 * リソースタイプを設定
	 *
	 * @param string $resourceTypeName リソースタイプ
	 */
	public function setResourceTypeName($resourceTypeName) {
		$this->resourceTypeName = $resourceTypeName;
	}

	/**
	 * リソースタイプを設定
	 *
	 * @param string $resourceTypeName リソースタイプ
	 * @return ChangeLevelCapByUserIdAndResourceTypeRequest
	 */
	public function withResourceTypeName($resourceTypeName): ChangeLevelCapByUserIdAndResourceTypeRequest {
		$this->setResourceTypeName($resourceTypeName);
		return $this;
	}

	/**
	 * リソースIDを取得
	 *
	 * @return string リソースID
	 */
	public function getResourceId() {
		return $this->resourceId;
	}

	/**
	 * リソースIDを設定
	 *
	 * @param string $resourceId リソースID
	 */
	public function setResourceId($resourceId) {
		$this->resourceId = $resourceId;
	}

	/**
	 * リソースIDを設定
	 *
	 * @param string $resourceId リソースID
	 * @return ChangeLevelCapByUserIdAndResourceTypeRequest
	 */
	public function withResourceId($resourceId): ChangeLevelCapByUserIdAndResourceTypeRequest {
		$this->setResourceId($resourceId);
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
	 * @return ChangeLevelCapByUserIdAndResourceTypeRequest
	 */
	public function withUserId($userId): ChangeLevelCapByUserIdAndResourceTypeRequest {
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
	 * @return ChangeLevelCapByUserIdAndResourceTypeRequest
	 */
	public function withLevelCap($levelCap): ChangeLevelCapByUserIdAndResourceTypeRequest {
		$this->setLevelCap($levelCap);
		return $this;
	}

}