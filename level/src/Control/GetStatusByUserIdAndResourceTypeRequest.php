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
class GetStatusByUserIdAndResourceTypeRequest extends Gs2BasicRequest {

    const FUNCTION = "GetStatusByUserId";

	/** @var string リソースプール */
	private $resourcePoolName;

	/** @var string リソースタイプ */
	private $resourceTypeName;

	/** @var string ユーザID */
	private $userId;

	/** @var string リソースID */
	private $resourceId;


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
	 * @return GetStatusByUserIdAndResourceTypeRequest
	 */
	public function withResourcePoolName($resourcePoolName): GetStatusByUserIdAndResourceTypeRequest {
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
	 * @return GetStatusByUserIdAndResourceTypeRequest
	 */
	public function withResourceTypeName($resourceTypeName): GetStatusByUserIdAndResourceTypeRequest {
		$this->setResourceTypeName($resourceTypeName);
		return $this;
	}

	/**
	 * ユーザIDを取得
	 *
	 * @return string ユーザID
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * ユーザIDを設定
	 *
	 * @param string $userId ユーザID
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザIDを設定
	 *
	 * @param string $userId ユーザID
	 * @return GetStatusByUserIdAndResourceTypeRequest
	 */
	public function withUserId($userId): GetStatusByUserIdAndResourceTypeRequest {
		$this->setUserId($userId);
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
	 * @return GetStatusByUserIdAndResourceTypeRequest
	 */
	public function withResourceId($resourceId): GetStatusByUserIdAndResourceTypeRequest {
		$this->setResourceId($resourceId);
		return $this;
	}

}