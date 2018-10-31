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
class IncreaseExperienceByUserIdAndResourceTypeRequest extends Gs2BasicRequest {

    const FUNCTION = "IncreaseExperienceByUserId";

	/** @var string リソースプール */
	private $resourcePoolName;

	/** @var string リソースタイプ */
	private $resourceTypeName;

	/** @var string リソースID */
	private $resourceId;

	/** @var string ステータス */
	private $userId;

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
	 * @return IncreaseExperienceByUserIdAndResourceTypeRequest
	 */
	public function withResourcePoolName($resourcePoolName): IncreaseExperienceByUserIdAndResourceTypeRequest {
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
	 * @return IncreaseExperienceByUserIdAndResourceTypeRequest
	 */
	public function withResourceTypeName($resourceTypeName): IncreaseExperienceByUserIdAndResourceTypeRequest {
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
	 * @return IncreaseExperienceByUserIdAndResourceTypeRequest
	 */
	public function withResourceId($resourceId): IncreaseExperienceByUserIdAndResourceTypeRequest {
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
	 * @return IncreaseExperienceByUserIdAndResourceTypeRequest
	 */
	public function withUserId($userId): IncreaseExperienceByUserIdAndResourceTypeRequest {
		$this->setUserId($userId);
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
	 * @return IncreaseExperienceByUserIdAndResourceTypeRequest
	 */
	public function withValue($value): IncreaseExperienceByUserIdAndResourceTypeRequest {
		$this->setValue($value);
		return $this;
	}

}