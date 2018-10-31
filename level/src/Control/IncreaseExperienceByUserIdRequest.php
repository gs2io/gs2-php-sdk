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
class IncreaseExperienceByUserIdRequest extends Gs2BasicRequest {

    const FUNCTION = "IncreaseExperienceByUserId";

	/** @var string リソースプール */
	private $resourcePoolName;

	/** @var string ステータス */
	private $userId;

	/** @var string ステータスID */
	private $statusId;

	/** @var long 経験値の加算量 */
	private $value;


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
	 * @return IncreaseExperienceByUserIdRequest
	 */
	public function withResourcePoolName($resourcePoolName): IncreaseExperienceByUserIdRequest {
		$this->setResourcePoolName($resourcePoolName);
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
	 * @return IncreaseExperienceByUserIdRequest
	 */
	public function withUserId($userId): IncreaseExperienceByUserIdRequest {
		$this->setUserId($userId);
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
	 * @return IncreaseExperienceByUserIdRequest
	 */
	public function withStatusId($statusId): IncreaseExperienceByUserIdRequest {
		$this->setStatusId($statusId);
		return $this;
	}

	/**
	 * 経験値の加算量を取得
	 *
	 * @return long 経験値の加算量
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * 経験値の加算量を設定
	 *
	 * @param long $value 経験値の加算量
	 */
	public function setValue($value) {
		$this->value = $value;
	}

	/**
	 * 経験値の加算量を設定
	 *
	 * @param long $value 経験値の加算量
	 * @return IncreaseExperienceByUserIdRequest
	 */
	public function withValue($value): IncreaseExperienceByUserIdRequest {
		$this->setValue($value);
		return $this;
	}

}