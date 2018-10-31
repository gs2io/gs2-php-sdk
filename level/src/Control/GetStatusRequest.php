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

use Gs2\Core\Control\Gs2UserRequest;

/**
 * @author Game Server Services, Inc.
 */
class GetStatusRequest extends Gs2UserRequest {

    const FUNCTION = "GetStatus";

	/** @var string リソースプール */
	private $resourcePoolName;

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
	 * @return GetStatusRequest
	 */
	public function withResourcePoolName($resourcePoolName): GetStatusRequest {
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
	 * @return GetStatusRequest
	 */
	public function withStatusId($statusId): GetStatusRequest {
		$this->setStatusId($statusId);
		return $this;
	}

}