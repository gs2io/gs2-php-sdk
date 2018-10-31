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
class SetExperienceByUserIdRequest extends Gs2BasicRequest {

    const FUNCTION = "SetExperienceByUserId";

	/** @var string リソースプール */
	private $resourcePoolName;

	/** @var string ステータスID */
	private $statusId;

	/** @var string ステータス */
	private $userId;

	/** @var long 新しい累計獲得経験値 */
	private $experience;


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
	 * @return SetExperienceByUserIdRequest
	 */
	public function withResourcePoolName($resourcePoolName): SetExperienceByUserIdRequest {
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
	 * @return SetExperienceByUserIdRequest
	 */
	public function withStatusId($statusId): SetExperienceByUserIdRequest {
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
	 * @return SetExperienceByUserIdRequest
	 */
	public function withUserId($userId): SetExperienceByUserIdRequest {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * 新しい累計獲得経験値を取得
	 *
	 * @return long 新しい累計獲得経験値
	 */
	public function getExperience() {
		return $this->experience;
	}

	/**
	 * 新しい累計獲得経験値を設定
	 *
	 * @param long $experience 新しい累計獲得経験値
	 */
	public function setExperience($experience) {
		$this->experience = $experience;
	}

	/**
	 * 新しい累計獲得経験値を設定
	 *
	 * @param long $experience 新しい累計獲得経験値
	 * @return SetExperienceByUserIdRequest
	 */
	public function withExperience($experience): SetExperienceByUserIdRequest {
		$this->setExperience($experience);
		return $this;
	}

}