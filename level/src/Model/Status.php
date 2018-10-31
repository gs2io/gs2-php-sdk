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

namespace Gs2\Level\Model;

/**
 * ステータス
 *
 * @author Game Server Services, Inc.
 *
 */
class Status {

	/** @var string ステータスGRN */
	private $statusId;

	/** @var string リソースタイプ名 */
	private $resourceTypeName;

	/** @var string ユーザID */
	private $userId;

	/** @var string リソースID */
	private $resourceId;

	/** @var int レベル */
	private $level;

	/** @var int レベルキャップ */
	private $levelCap;

	/** @var long 累計獲得経験値 */
	private $experience;

	/** @var long 次のレベルに上がる累計獲得経験値 */
	private $nextLevelExperience;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * ステータスGRNを取得
	 *
	 * @return string ステータスGRN
	 */
	public function getStatusId() {
		return $this->statusId;
	}

	/**
	 * ステータスGRNを設定
	 *
	 * @param string $statusId ステータスGRN
	 */
	public function setStatusId($statusId) {
		$this->statusId = $statusId;
	}

	/**
	 * ステータスGRNを設定
	 *
	 * @param string $statusId ステータスGRN
	 * @return self
	 */
	public function withStatusId($statusId): self {
		$this->setStatusId($statusId);
		return $this;
	}

	/**
	 * リソースタイプ名を取得
	 *
	 * @return string リソースタイプ名
	 */
	public function getResourceTypeName() {
		return $this->resourceTypeName;
	}

	/**
	 * リソースタイプ名を設定
	 *
	 * @param string $resourceTypeName リソースタイプ名
	 */
	public function setResourceTypeName($resourceTypeName) {
		$this->resourceTypeName = $resourceTypeName;
	}

	/**
	 * リソースタイプ名を設定
	 *
	 * @param string $resourceTypeName リソースタイプ名
	 * @return self
	 */
	public function withResourceTypeName($resourceTypeName): self {
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
	 * @return self
	 */
	public function withUserId($userId): self {
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
	 * @return self
	 */
	public function withResourceId($resourceId): self {
		$this->setResourceId($resourceId);
		return $this;
	}

	/**
	 * レベルを取得
	 *
	 * @return int レベル
	 */
	public function getLevel() {
		return $this->level;
	}

	/**
	 * レベルを設定
	 *
	 * @param int $level レベル
	 */
	public function setLevel($level) {
		$this->level = $level;
	}

	/**
	 * レベルを設定
	 *
	 * @param int $level レベル
	 * @return self
	 */
	public function withLevel($level): self {
		$this->setLevel($level);
		return $this;
	}

	/**
	 * レベルキャップを取得
	 *
	 * @return int レベルキャップ
	 */
	public function getLevelCap() {
		return $this->levelCap;
	}

	/**
	 * レベルキャップを設定
	 *
	 * @param int $levelCap レベルキャップ
	 */
	public function setLevelCap($levelCap) {
		$this->levelCap = $levelCap;
	}

	/**
	 * レベルキャップを設定
	 *
	 * @param int $levelCap レベルキャップ
	 * @return self
	 */
	public function withLevelCap($levelCap): self {
		$this->setLevelCap($levelCap);
		return $this;
	}

	/**
	 * 累計獲得経験値を取得
	 *
	 * @return long 累計獲得経験値
	 */
	public function getExperience() {
		return $this->experience;
	}

	/**
	 * 累計獲得経験値を設定
	 *
	 * @param long $experience 累計獲得経験値
	 */
	public function setExperience($experience) {
		$this->experience = $experience;
	}

	/**
	 * 累計獲得経験値を設定
	 *
	 * @param long $experience 累計獲得経験値
	 * @return self
	 */
	public function withExperience($experience): self {
		$this->setExperience($experience);
		return $this;
	}

	/**
	 * 次のレベルに上がる累計獲得経験値を取得
	 *
	 * @return long 次のレベルに上がる累計獲得経験値
	 */
	public function getNextLevelExperience() {
		return $this->nextLevelExperience;
	}

	/**
	 * 次のレベルに上がる累計獲得経験値を設定
	 *
	 * @param long $nextLevelExperience 次のレベルに上がる累計獲得経験値
	 */
	public function setNextLevelExperience($nextLevelExperience) {
		$this->nextLevelExperience = $nextLevelExperience;
	}

	/**
	 * 次のレベルに上がる累計獲得経験値を設定
	 *
	 * @param long $nextLevelExperience 次のレベルに上がる累計獲得経験値
	 * @return self
	 */
	public function withNextLevelExperience($nextLevelExperience): self {
		$this->setNextLevelExperience($nextLevelExperience);
		return $this;
	}

	/**
	 * 作成日時(エポック秒)を取得
	 *
	 * @return int 作成日時(エポック秒)
	 */
	public function getCreateAt() {
		return $this->createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 */
	public function setCreateAt($createAt) {
		$this->createAt = $createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 * @return self
	 */
	public function withCreateAt($createAt): self {
		$this->setCreateAt($createAt);
		return $this;
	}

	/**
	 * 最終更新日時(エポック秒)を取得
	 *
	 * @return int 最終更新日時(エポック秒)
	 */
	public function getUpdateAt() {
		return $this->updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 */
	public function setUpdateAt($updateAt) {
		$this->updateAt = $updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 * @return self
	 */
	public function withUpdateAt($updateAt): self {
		$this->setUpdateAt($updateAt);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Status
	 */
    static function build(array $array)
    {
        $item = new Status();
        $item->setStatusId(isset($array['statusId']) ? $array['statusId'] : null);
        $item->setResourceTypeName(isset($array['resourceTypeName']) ? $array['resourceTypeName'] : null);
        $item->setUserId(isset($array['userId']) ? $array['userId'] : null);
        $item->setResourceId(isset($array['resourceId']) ? $array['resourceId'] : null);
        $item->setLevel(isset($array['level']) ? $array['level'] : null);
        $item->setLevelCap(isset($array['levelCap']) ? $array['levelCap'] : null);
        $item->setExperience(isset($array['experience']) ? $array['experience'] : null);
        $item->setNextLevelExperience(isset($array['nextLevelExperience']) ? $array['nextLevelExperience'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}