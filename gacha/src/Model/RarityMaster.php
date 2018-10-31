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

namespace Gs2\Gacha\Model;

/**
 * 景品レアリティ
 *
 * @author Game Server Services, Inc.
 *
 */
class RarityMaster {

	/** @var string 景品レアリティGRN */
	private $rarityId;

	/** @var string 景品レアリティ名 */
	private $name;

	/** @var int 排出重み */
	private $weight;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * 景品レアリティGRNを取得
	 *
	 * @return string 景品レアリティGRN
	 */
	public function getRarityId() {
		return $this->rarityId;
	}

	/**
	 * 景品レアリティGRNを設定
	 *
	 * @param string $rarityId 景品レアリティGRN
	 */
	public function setRarityId($rarityId) {
		$this->rarityId = $rarityId;
	}

	/**
	 * 景品レアリティGRNを設定
	 *
	 * @param string $rarityId 景品レアリティGRN
	 * @return self
	 */
	public function withRarityId($rarityId): self {
		$this->setRarityId($rarityId);
		return $this;
	}

	/**
	 * 景品レアリティ名を取得
	 *
	 * @return string 景品レアリティ名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * 景品レアリティ名を設定
	 *
	 * @param string $name 景品レアリティ名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * 景品レアリティ名を設定
	 *
	 * @param string $name 景品レアリティ名
	 * @return self
	 */
	public function withName($name): self {
		$this->setName($name);
		return $this;
	}

	/**
	 * 排出重みを取得
	 *
	 * @return int 排出重み
	 */
	public function getWeight() {
		return $this->weight;
	}

	/**
	 * 排出重みを設定
	 *
	 * @param int $weight 排出重み
	 */
	public function setWeight($weight) {
		$this->weight = $weight;
	}

	/**
	 * 排出重みを設定
	 *
	 * @param int $weight 排出重み
	 * @return self
	 */
	public function withWeight($weight): self {
		$this->setWeight($weight);
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
	 * @return RarityMaster
	 */
    static function build(array $array)
    {
        $item = new RarityMaster();
        $item->setRarityId(isset($array['rarityId']) ? $array['rarityId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setWeight(isset($array['weight']) ? $array['weight'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}