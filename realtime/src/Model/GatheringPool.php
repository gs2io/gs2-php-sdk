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

namespace Gs2\Realtime\Model;

/**
 * ギャザリングプール
 *
 * @author Game Server Services, Inc.
 *
 */
class GatheringPool {

	/** @var string ギャザリングプールGRN */
	private $gatheringPoolId;

	/** @var string オーナーID */
	private $ownerId;

	/** @var string ギャザリングプール名 */
	private $name;

	/** @var string 説明文 */
	private $description;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * ギャザリングプールGRNを取得
	 *
	 * @return string ギャザリングプールGRN
	 */
	public function getGatheringPoolId() {
		return $this->gatheringPoolId;
	}

	/**
	 * ギャザリングプールGRNを設定
	 *
	 * @param string $gatheringPoolId ギャザリングプールGRN
	 */
	public function setGatheringPoolId($gatheringPoolId) {
		$this->gatheringPoolId = $gatheringPoolId;
	}

	/**
	 * ギャザリングプールGRNを設定
	 *
	 * @param string $gatheringPoolId ギャザリングプールGRN
	 * @return self
	 */
	public function withGatheringPoolId($gatheringPoolId): self {
		$this->setGatheringPoolId($gatheringPoolId);
		return $this;
	}

	/**
	 * オーナーIDを取得
	 *
	 * @return string オーナーID
	 */
	public function getOwnerId() {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 */
	public function setOwnerId($ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 * @return self
	 */
	public function withOwnerId($ownerId): self {
		$this->setOwnerId($ownerId);
		return $this;
	}

	/**
	 * ギャザリングプール名を取得
	 *
	 * @return string ギャザリングプール名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * ギャザリングプール名を設定
	 *
	 * @param string $name ギャザリングプール名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * ギャザリングプール名を設定
	 *
	 * @param string $name ギャザリングプール名
	 * @return self
	 */
	public function withName($name): self {
		$this->setName($name);
		return $this;
	}

	/**
	 * 説明文を取得
	 *
	 * @return string 説明文
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string $description 説明文
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string $description 説明文
	 * @return self
	 */
	public function withDescription($description): self {
		$this->setDescription($description);
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
	 * @return GatheringPool
	 */
    static function build(array $array)
    {
        $item = new GatheringPool();
        $item->setGatheringPoolId(isset($array['gatheringPoolId']) ? $array['gatheringPoolId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setDescription(isset($array['description']) ? $array['description'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}