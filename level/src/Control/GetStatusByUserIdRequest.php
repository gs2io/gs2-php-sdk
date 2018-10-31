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
class GetStatusByUserIdRequest extends Gs2BasicRequest {

    const FUNCTION = "GetStatusByUserId";

	/** @var string リソースプール */
	private $resourcePoolName;

	/** @var string ユーザID */
	private $userId;

	/** @var string ステータスID */
	private $statusId;


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
	 * @return GetStatusByUserIdRequest
	 */
	public function withResourcePoolName($resourcePoolName): GetStatusByUserIdRequest {
		$this->setResourcePoolName($resourcePoolName);
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
	 * @return GetStatusByUserIdRequest
	 */
	public function withUserId($userId): GetStatusByUserIdRequest {
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
	 * @return GetStatusByUserIdRequest
	 */
	public function withStatusId($statusId): GetStatusByUserIdRequest {
		$this->setStatusId($statusId);
		return $this;
	}

}